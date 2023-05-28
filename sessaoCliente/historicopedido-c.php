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

//LOGICA PARA CARREGAR AS INFORMAÇÕES DE PEDIDO
    $sql=" SELECT p.cd_pedido, c.nm_cliente, p.dt_pedido, p.nm_status, s.cd_personaliz
    FROM tb_pedido p
    INNER JOIN tb_infopagamento ip ON p.cd_infopagamento = ip.cd_infopagamento
    INNER JOIN tb_cliente c ON ip.cd_cliente = c.cd_cliente
    INNER JOIN tb_empresa e ON p.cd_empresa = e.cd_empresa
    INNER JOIN tb_servico s ON e.cd_empresa = s.cd_empresa
    WHERE c.cd_cliente = '$cd_cliente'";
     $result=$conn->query($sql);
     $row=$result->fetch_assoc();

//LOGICA PARA CARREGAR AS INFORMAÇÕES DE PACOTE DE PEDIDO
    $sql2="SELECT p.cd_pedido, pac.nm_pacote, pac.ds_pacote, pac.vl_pacote, e.nm_fantasia
    FROM tb_pedido p
    INNER JOIN tb_pacotepedido pp ON p.cd_pedido = pp.cd_pedido
    INNER JOIN tb_pacote pac ON pp.cd_pacote = pac.cd_pacote
    INNER JOIN tb_infopagamento ip ON p.cd_infopagamento = ip.cd_infopagamento
    INNER JOIN tb_empresa e ON p.cd_empresa = e.cd_empresa
    WHERE ip.cd_cliente = '$cd_cliente'";
    $result2=$conn->query($sql2);
    $row2=$result2->fetch_assoc();

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
            <img src="../img/icones/logoBranca.svg" alt="">
            </div>
            <div class="menu">
                <a href="">Início</a>
                <a href="../sessaoUsuario/explore.php">Feed</a>
                <a href="chatCliente.php">Mensagens</a>
                <a href="">Seus Pedidos</a>
            </div>

            <div class="headerPesquisa">
                <form action="index-c.php" method="get">
                <input type="text" style="padding: 2.5%;" placeholder="Procure Serviços" name="nm_tiposervico">
                    <img src="../img/icones/icon-lupa.svg" alt="" width="30px">
                </form>
            </div>
            <div class="headerClientePerfil" >
                <!-- <div class="iconCliente"> -->
                <a href="#" class="carrinho"><img src="../img/icones/icon-carrinho.svg" alt="Carrinho"></a>
                <a href="#" class ="notificacao"><img src="../img/icones/icon-notificacao.svg" alt="Notificações"></a>
                <!-- </div> -->
                <button class="menuIcon2" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
            </div>
            <section class="menuPerfil">
                <a href="perfil-c.php">Perfil</a>
                <a href="">Postagens</a>
                <!-- <a href="" style="margin-bottom: 20%">Histórico de Compras</a> -->
                <a href="">Configurações</a>
                <a href="historicopedido-c.php">Histórico de Pedidos</a>
                <a href="../logout.php">Sair</a>
            </section>
        </div>
    </div>
<!-- FIM MENU -->

    <div class="gridHistorico">
        <div class="titulo">
            <h2>Histórico de Pedidos</h2>
        </div>
    <?php
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $nomeCliente = $row['nm_cliente'];
            $dtPedido = $row['dt_pedido'];
            $stPedido = $row['nm_status'];
            $persPedido = $row['cd_personaliz'];
            if($persPedido == null){
                // echo ('Não informado');
            }else{
                if($persPedido == 1){
                    // echo('Sim');
                }else{
                    // echo('Não');
                }
            }
            echo $nomeCliente;
            echo $dtPedido;
            echo $stPedido;
            
         
        }
    }
    ?>
        <div class="infoPedido">
            <div class="alinhaPedido">
                <li>Nº:0543255</li>
                <li>Pedido realizado em</li>
                <li>Este é um</li>
                <li>Pacote Personalizado</li>
                <li>Situação</li>
                <li>Status</li>
            </div>

            <div class="alinhaInfoPedido">
                <li>Aline Silva</li>
                <li>10/05/2023</li>
                <li>Pacote</li>
                <li id="pacotePersonalizado">Não</li>
                <li class="status">Aprovado</li>
                <li class="status">Pagamento realizado</li>
            </div>
        </div>
        <?php
          if(mysqli_num_rows($result2) > 0){
            while($row2 = mysqli_fetch_assoc($result2)){
                $nomePacote = $row2['nm_pacote'];
                $descPacote = $row2['ds_pacote'];
                $vlPacote = $row2['vl_pacote'];
                $nomeFantasia=$row2['nm_fantasia'];
                // echo $nomePacote;
                // echo $descPacote;
                // echo $vlPacote;
                // echo $nomeFantasia;
             
            }
        }
        ?>
        <div class="imgHistoricoPedido">
            <img src="../bancoImagens/clientes/casaEventos.jpg" alt="">
        </div>

        <div class="textoHistorico">
                <h2 class="estiloEmpresa">Empresa: Smash Party</h2><br>
                <h3>Aluguel: casa noturna de 10 horas, no dia 30 de Junho.</h3>
        </div>

        <div class="textoValor">
            <h2>Valor</h2><br>
            <h3>R$ 850,00</h3>
        </div>

        <hr>
    </div>


<script src="js/menu-c.js"></script>

</body>
</html>