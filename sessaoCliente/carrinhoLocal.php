<?php

session_start();
include('../protect.php');


if (isset($_POST['opcao'])) {
    $opcoes = $_POST['opcao'];
    $ids = implode(",", $opcoes);
        $id = str_replace("id=", "", $ids);
    } else {
        echo "Nenhuma opção selecionada.";
    }
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_eventalize";
    
    $empresas = array();
    $soma_valores = 0;
   
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "SELECT s.nm_servico, s.cd_servico, s.vl_servico, s.url_imgcapa, e.nm_fantasia, e.cd_empresa, e.url_fotoperfil, s.nm_servico, ts.nm_tiposervico
    FROM tb_servico AS s 
    JOIN tb_tiposervico ts ON s.cd_tiposervico = ts.cd_tiposervico
    JOIN tb_empresa e ON e.cd_empresa = s.cd_empresa 
    WHERE s.cd_servico IN ($id)";

    $result = $conn->query($sql);

    $empresas = array();
    $cards = array();

//WHILE QUE RODA OS DE CD_EMPRESA E VL_SERVICO DO SELECT E GUARDA NO ARRAY
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $valor_servico = $row['vl_servico'];
        $cd_empresa = $row['cd_empresa'];

        if (isset($empresas[$cd_empresa])) {
            $empresas[$cd_empresa]['vl_total'] += $valor_servico;
        } else {
            $empresas[$cd_empresa] = array(
                'cd_empresa' => $cd_empresa,
                'vl_total' => $valor_servico
            );
        }

//AQUI EU CRIO UM ARRAY PARA RECEBER TODAS AS INFORMAÇÕES RETORNADAS DO SELECT
        $cards[] = array(
            'url_imgcapa' => $row['url_imgcapa'],
            'nm_servico' => $row['nm_servico'],
            'url_fotoperfil' => $row['url_fotoperfil'],
            'nm_fantasia' => $row['nm_fantasia'],
            'nm_tiposervico' => $row['nm_tiposervico'],
            'valor_servico' => $valor_servico
        );
    }

    // ...
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
                <form action="carrinho.php" id="botaoCarrinho">
                    <a href="#" class="carrinho"><img src="../img/icones/icon-carrinho.svg" alt="Carrinho" onclick="submitButton()"></a>
                </form>
                  <a href="#" class ="notificacao"><img src="../img/icones/icon-notificacao.svg" alt="Notificações"></a>
          <button class="menuIcon2" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
          </div>
          <section class="menuPerfil">
            <a href="perfil-c.php">Perfil</a>
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
                    <input type="text" placeholder="Rua" name="rua" id="rua">
                    <input type="number" placeholder="Nº" style="padding-left: 8%;" name="numero">
                </div>
                <div class="formdiv2">
                    <input type="text" placeholder="CEP" name="cep" id="cep" >
                    <input type="text" placeholder="Bairro" name="bairro" id="bairro">
                </div>
                <div class="formdiv3">
                    <input type="text" placeholder="Cidade" name="cidade" id="cidade">
                    <input type="text" placeholder="Estado" name="uf" id="uf">
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
                <input type="hidden" name="empresas_serializadas" value="<?php echo htmlentities(serialize($empresas)); ?>">
                <div class="botoesEndereco">
                    <button id="voltar"> Voltar</button>
                    <button type="submit" id="continuar">Continuar</button>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#cep').on('blur', function() {
                    var cep = $(this).val();
                    $.ajax({
                    url: 'https://viacep.com.br/ws/' + cep + '/json/',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#rua').val(response.logradouro);
                        $('#bairro').val(response.bairro);
                        $('#cidade').val(response.localidade);
                        $('#uf').val(response.uf);
                    }
                    });
                });
                });

        </script>
    <hr class="hrVertical">

    <div class="ladoCarrinho">
        <div class="tituloCarrinho">
            <h3>Carrinho</h3>
        </div>
                <?php
//RODANDO UM LOOP PARA DEVOLVER AS INFORMAÇÕES QUE EU GUARDEI NO ARRAY LÁ EM CIMA
             foreach ($cards as $card) {
                    
                    echo '  
                        <div class="cardProduto">
                            <div class="cardInfo">
                                <img src="'. $card['url_imgcapa'] .'" alt="">
                                <div class="infoEmpresa">
                                    <h3>'. $card['nm_servico'] .'</h3>
                                    <div class="perfilEmpresa">
                                        <img src="'. $card['url_fotoperfil'] .'" alt="">
                                        <h3>'. $card['nm_fantasia'] . '</h3>
                                        <h6>'. $card['nm_tiposervico'] . '</h6>
                                    </div>
                                </div>
                                <div class="precoProduto">
                                    <h3>R$ '.number_format($card['valor_servico'], 2, ',', '.') . '</h3>
                                </div>
                                <div class="iconDeletar">
                                    <span>&#x2716;</span>
                                </div>
                            </div>
                        </div>';
                }
//LOOP PARA RODAR O VALOR TOTAL DA COMPRA 
                foreach ($empresas as $empresa) {
                    $valor_total = $empresa['vl_total'];
                    $soma_valores += $valor_total;
                }
                
            echo '<div class="precoTotal">
                    <h3>Total: R$ '.number_format($soma_valores, 2, ',', '.').'</h3>
                </div>';
    
?>
    </div>
  </div>


  <script src="../sessaoCliente/js/menu-c.js"></script>
  <script src="js/lupa.js"></script>
  <script src="js/carrinho.js"></script>

</body>
</html>
  