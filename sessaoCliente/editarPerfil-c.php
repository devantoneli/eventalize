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
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu-c.css">
    <link rel="stylesheet" href="css/editarPerfil-c.css">
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
                <a href="">Perfil</a>
                <a href="">Postagens</a>
                <!-- <a href="" style="margin-bottom: 20%">Histórico de Compras</a> -->
                <a href="">Configurações</a>
                <a href="../logout.php">Sair</a>
            </section>
        </div>
    </div>
<!-- FIM MENU -->
<form class="estiloForm">
    <div class="grid-item">
        <h1>Editar Perfil</h1>
    </div>
    <div class="grid-item row2-col1">
        <img src="https://img.freepik.com/fotos-gratis/conceito-de-felicidade-bem-estar-e-confianca-mulher-afro-americana-atraente-alegre-corte-de-cabelo-encaracolado-peito-de-bracos-cruzados-em-pose-poderosa-e-segura-sorrindo-determinado-usar-sueter-amarelo_176420-35063.jpg?w=1380&t=st=1685022961~exp=1685023561~hmac=4f081a0f9390ea957df9be7baab8fcfd304aac1cd90f8fee7a8e76666af5077b" alt="imagem">
        <h3>Edite sua foto de perfil</h3>
    </div>
    <div class="grid-item row2-col2">
        <h3>Editar Nome:</h3>
        <input type="text" name="nm_cliente">
        <h3>Editar Biografia:</h3>
        <input type="text">
        <h3>Editar Usuário:</h3>
        <input type="text" name="nm_usuariocliente">
        <div class="botoes">
        <div class="salvarInfo">
            <input type="submit" value="Cancelar" class="corLaranja">
            <input type="submit" value="Salvar" class="corRosa">
            </div>
    </div>
    </div>
    </div>
</form>