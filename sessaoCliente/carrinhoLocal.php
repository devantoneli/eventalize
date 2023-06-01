<?php

session_start();
include('../protect.php');

if (isset($_POST['opcao']) && !empty($_POST['opcao'])) {
    $opcoes = $_POST['opcao'];
    $ids = implode(",", $opcoes);
        $id = str_replace("id=", "", $ids);
    
    $valorTotal = 0;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_eventalize";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "SELECT p.nm_pacote, p.cd_pacote, p.vl_pacote, p.url_imgcapa, e.nm_fantasia, e.cd_empresa, e.url_fotoperfil, s.nm_servico, ts.nm_tiposervico
    FROM tb_pacote AS p 
    JOIN tb_pacoteservico ps ON ps.cd_pacote = p.cd_pacote 
    JOIN tb_servico s ON ps.cd_servico = s.cd_servico 
    JOIN tb_tiposervico ts ON s.cd_tiposervico = ts.cd_tiposervico
    JOIN tb_empresa e ON e.cd_empresa = s.cd_empresa 
    WHERE p.cd_pacote IN ($id)";

    $result = $conn->query($sql);

    
} else {
    echo "Nenhuma opção selecionada.";
}

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sessaoCliente/css/menu-c.css">
    <link rel="stylesheet" href="css/carrinhoLocal.css">
    <link rel="icon" href="../img/icones/logo.png">
    <title>Finalizando Compra</title>
    </head>
<body>

    <!-- INICIO MENU CLIENTE -->
<div class="grid-container">
    <div class="header">
      <div class="logo">
        <a href="index-c.php"><img src="../img/icones/logoBranca.svg" alt=""></a>
      </div>
      <div class="menu">
          <a href="index-c.php">Início</a>
          <a href="../sessaoUsuario/explore.php">Feed</a>
          <a href="chatCliente.php">Mensagens</a>
          <a href="historicopedido-c.php">Meus Pedidos</a>
      </div>
  
      <div class="headerPesquisa">
        <form action="buscaServico-c.php" method="post" id="searchForm">
            <input type="text" style="padding: 2.5%;" placeholder="Procure Serviços" name="nm_tiposervico">
            <div class="imgLupa">
            <img src="../img/icones/icon-lupa.svg" alt="" width="30px" onclick="submitForm()">
            </div>
        </form>
          </div>
          <div class="headerClientePerfil" >
              <!-- <div class="iconCliente"> -->
                <form action="carrinho.php" id="botaoCarrinho">
                    <a href="#" class="carrinho"><img src="../img/icones/icon-carrinho.svg" alt="Carrinho" onclick="submitButton()"></a>
                </form>
                  <a href="#" class ="notificacao"><img src="../img/icones/icon-notificacao.svg" alt="Notificações"></a>
                <!-- </div> -->
          <button class="menuIcon2" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
          </div>
          <section class="menuPerfil">
            <a href="perfil-c.php">Perfil</a>
            <!-- <a href="">Postagens</a> -->
            <!-- <a href="" style="margin-bottom: 20%">Histórico de Pedidos</a> -->
            <a href="">Configurações</a>
            <a href="">Sair</a>
        </section>
  </div>
  </div>

    <div class="inicioCarrinhoLocal">
            <form action="salvandoEndereco.php" method="POST">
                <div class="formEndereco">
                    <h3>Onde será realizado meu evento?</h3>
                    <div class="formdiv1">
                    <input type="text" placeholder="Rua" name="rua">
                    <input type="number" placeholder="Nº" style="padding-left: 8%;" name="numero">
                </div>
                <div class="formdiv2">
                    <input type="text" placeholder="CEP" name="cep">
                    <input type="text" placeholder="Bairro" name="bairro">
                </div>
                <div class="formdiv3">
                    <input type="text" placeholder="Cidade" name="cidade">
                    <input type="text" placeholder="Estado" name="uf">
                </div>
                <div class="formdiv4">
                    <input type="text" placeholder="Complemento" name="complemento">
                    <input type="text" placeholder="Referência" name="referencia">
                </div>

                <div class='formData'>
                    <h3>Qual a data e horário?</h3>
                    <div class="formdiv2">
                        <input type="date" placeholder="Data" name="dtAgendamento">
                        <input type="time" placeholder="Hora" name="hrAgendamento">
                    </div>
                </div>

                <div class="botoesEndereco">
                    <button id="voltar"> Voltar</button>
                    <button type="submit" id="continuar">Continuar</button>
                </div>
            </form>
        </div>

    <hr class="hrVertical">

    <div class="ladoCarrinho">
        <div class="tituloCarrinho">
            <h3>Carrinho</h3>
        </div>
                <?php
             if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $valorPacote = $row['vl_pacote'];
                    $cdEmpresa = $row['cd_empresa'];

                    // Verifica se a empresa já possui um valor total calculado e adiciona o valor do pacote atual
                    if (isset($valorTotalPorEmpresa[$cdEmpresa])) {
                        $valorTotalPorEmpresa[$cdEmpresa] += $valorPacote;
                    } else {
                        // Se a empresa ainda não possui um valor total, inicializa com o valor do pacote atual
                        $valorTotalPorEmpresa[$cdEmpresa] = $valorPacote;
                    }

                    // Resto do código...
                    echo '  
                        <div class="cardProduto">
                            <div class="cardInfo">
                                <img src="'. $row['url_imgcapa'] .'" alt="">
                                <div class="infoEmpresa">
                                    <h3>'. $row['nm_pacote'] .'</h3>
                                    <div class="perfilEmpresa">
                                        <img src="'. $row['url_fotoperfil'] .'" alt="">
                                        <h3>'. $row['nm_fantasia'] . '</h3>
                                        <h6>'. $row['nm_tiposervico'] . '</h6>
                                    </div>
                                </div>
                                <div class="precoProduto">
                                    <h3>R$ '.number_format($valorPacote, 2, ',', '.') . '</h3>
                                </div>
                                <div class="iconDeletar">
                                    <span>&#x2716;</span>
                                </div>
                            </div>
                        </div>';
                }

            // Exibe o valor total do pedido para cada empresa
            foreach ($valorTotalPorEmpresa as $cdEmpresa => $valorTotal) {
                echo 'Valor total do pedido para a empresa de ID '.$cdEmpresa.': R$ '.number_format($valorTotal, 2, ',', '.').'<br>';
            }

            // Calcula o valor total geral do pedido
            $valorTotalGeral = array_sum($valorTotalPorEmpresa);

            echo '<div class="precoTotal">
                    <h3>Total: R$ '. number_format($valorTotalGeral, 2, ',', '.').'</h3>
                </div>';
        } else {
            echo "Nenhum resultado encontrado.";
        }
?>
    </div>
  </div>


  <script src="../sessaoCliente/js/menu-c.js"></script>
  <script src="js/lupa.js"></script>
  <script src="js/carrinho.js"></script>

</body>
</html>
  