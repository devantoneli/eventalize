<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

$cd_cliente = $_SESSION["cd_cliente"];


$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

//LOGICA PARA CARREGAR AS INFORMAÇÕES DE PEDIDO E SERVICO DE PEDIDO
    $sql=" SELECT DISTINCT p.cd_pedido, c.nm_cliente, p.dt_pedido, p.nm_status, s.cd_personaliz,
    s.nm_servico, s.ds_servico, s.vl_servico, s.url_imgcapa, e.nm_fantasia, p.cd_infopagamento
    FROM tb_pedido p
    INNER JOIN tb_cliente c ON p.cd_cliente = c.cd_cliente
    INNER JOIN tb_empresa e ON p.cd_empresa = e.cd_empresa
    INNER JOIN tb_servicopedido sp ON p.cd_pedido = sp.cd_pedido
    INNER JOIN tb_servico s ON sp.cd_servico = s.cd_servico
    WHERE p.cd_cliente = $cd_cliente ORDER BY p.dt_pedido";
     $result=$conn->query($sql);
     $row=$result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/index/logo.png">
    <link rel="stylesheet" href="css/historicopedido-c.css">
    <link rel="stylesheet" href="css/menu-c.css">
    <title>Histórico de Pedidos - Eventalize</title>
</head>
<body>

<!-- INICIO MENU -->
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
                <!-- <a href="" style="margin-bottom: 20%">Histórico de Compras</a> -->
                <!-- <a href="historicopedido-c.php">Histórico de Pedidos</a> -->
                <a href="">Configurações</a>
                <a href="../logout.php">Sair</a>
            </section>
        </div>
    </div>
<!-- FIM MENU -->


<div class="titulo">
        <h2>Histórico de Pedidos</h2>
        </div>
    <?php
    if(mysqli_num_rows($result) > 0){
        // $nm_cliente = $row['nm_cliente'];
        // $dt_pedido = $row['dt_pedido'];
        // $nm_status = $row['nm_status'];
        $cd_personaliz = $row['cd_personaliz'];
        $personaliza = '';
        if($cd_personaliz == null){
            $personaliza = "Não definido";
        }else{
            if($cd_personaliz == 1){
                $personaliza = "Sim";
            }else{
                $personaliza = "Não";
            }
        }
        
        while($row = mysqli_fetch_assoc($result)){
          
            echo'
            <div class="gridHistorico">
            <div class="infoPedido">
            <div class="alinhaPedido">
                <li>Pedido nº</li>
                <li>Pedido realizado em</li>
                
                <li>Servico Personalizado</li>
                <li>Status</li>
                <li>Status Pagamento</li>
            </div>

            <div class="alinhaInfoPedido">
                <li>'.$row['cd_pedido'].'</li>
                <li>'.date('d/m/Y', strtotime($row['dt_pedido'])).'</li>
                
                <li id="pacotePersonalizado">'.$personaliza.'</li>
                <li class="status">'.$row['nm_status'].'</li>';
                $cd_pedido = $row['cd_pedido'];
                if ($row['cd_infopagamento']==0){
                    echo "<li><form action='pix/index.php' method='POST'><input type='hidden' value='$cd_pedido' name='cd_pedido'><input type='hidden' value='$cd_cliente' name='cd_cliente'><input type='submit' value='pagar' class='btn-Pagar'></form></li>";
                }else{
                    echo'<li class="status">Pago</li>';
                }
                
                echo'
            </div>
        </div>
        
        <div class="imgHistoricoPedido">
        <img src="'.$row['url_imgcapa'].'" alt="">
    </div>

    <div class="textoHistorico">
            <h2 class="estiloEmpresa">'.$row['nm_fantasia'].'</h2><br>
            <h3>'.$row['ds_servico'].'</h3>
    </div>

    <div class="textoValor">
        <h2>Valor</h2><br>
        <h3>R$'. str_replace('.', ',', $row['vl_servico']) .'</h3>
    </div>

    <hr>
</div>';   
        }
    }

?>
 
    <script src="js/menu-c.js"></script>
    <script src="js/lupa.js"></script>
    <script src="js/carrinho.js"></script>

</body>
</html>