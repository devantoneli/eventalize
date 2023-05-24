<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

    $sql = "SELECT * FROM tb_empresa WHERE cd_empresa = 44"; 
    $result = $conn->query($sql);
    $row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/iniciocliente.css">
    <link rel="stylesheet" href="css/chatCliente-c.css">
    <link rel="icon" href="../img/index/logo.png">
    <title>Início - Eventalize</title>
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
                <button>
                    <img src="../img/icones/icon-lupa.svg" alt="" width="30px">
                </button>
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
                <a href="">Perfil</a>
                <a href="">Postagens</a>
                <!-- <a href="" style="margin-bottom: 20%">Histórico de Compras</a> -->
                <a href="">Configurações</a>
                <a href="../logout.php">Sair</a>
            </section>
        </div>
    </div>
<!-- FIM MENU -->

<div class="divisaoArea">
     <h2>Conversas</h2>
    <div class="conversasPerfil">
        <div class="scroll">
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $row['url_fotoperfil'];?>"  alt="imagem">
            </div>
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $row['url_fotoperfil'];?>>"  alt="imagem">
            </div>
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $row['url_fotoperfil'];?>"  alt="imagem">
            </div>
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $row['url_fotoperfil'];?>"  alt="imagem">
            </div>
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $row['url_fotoperfil'];?>"  alt="imagem">
            </div>
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $row['url_fotoperfil'];?>"  alt="imagem">
            </div>
        </div>
    </div>

    <div class="linhaDivisao"></div>


    <div class="mensagensPerfil">
            <br>
            <div class="infoCliente">
                <img src="<?php echo $row['url_fotoperfil'];?>"  alt="imagem">
                <h2><?php echo $row['nm_fantasia'];?></h2>
            </div>
            <div class="carregaChat">
                <!--Aqui deve carregar a lógica de chat que ainda está sendo desenvolvida-->
            </div>
        </div>
     </div>
     <!--FIM CONVERSAS CHAT -->

</body>
<script src="../sessaoCliente/js/menu-c.js"></script>
</html>