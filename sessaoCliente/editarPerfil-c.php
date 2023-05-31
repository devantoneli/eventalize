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

$query = "SELECT * FROM tb_cliente WHERE cd_cliente = '$cd_cliente'";

$result_query = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));
$row = mysqli_fetch_assoc($result_query);

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
    <title>Editar Perfil - Eventalize</title>
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
                <!-- <a href="historicopedido.php">Histórico de Pedidos</a> -->
                <a href="">Configurações</a>
                <a href="../logout.php">Sair</a>
            </section>
        </div>
    </div>
<!-- FIM MENU -->

<form class="estiloForm" action="editandoPerfil-c.php" method="post">
    <div class="grid-item">
        <h1>Editar Perfil</h1>
    </div>
    <div class="grid-item row2-col1">
        <img id="preview-capa" src="<?php echo $_SESSION['url_fotoperfil'];?>" alt="">
        <h3>Editar foto</h3>
        <label for="cardCarregarFoto" for="img-inputFotoPerfil" id="imgPerfil">
            <input class="linkPerfil" id="img-inputFotoPerfil" value="" type="file" name="imgPerfil">
            <input id="linkimgPerfil" value="mudara" type="hidden" name="url_fotoperfil">
        </label>
    </div>
    <div class="grid-item row2-col2">
        <input type="hidden" name="cd_cliente" value="<?php echo($row["cd_cliente"])?>">
        <h3>Editar Nome:</h3>
        <input type="text" name="nm_cliente" value="<?php echo($row["nm_cliente"])?>">
        <h3>Editar Sobrenome:</h3>
        <input type="text" name="nm_sobrenome" value="<?php echo($row["nm_sobrenome"])?>">
        <h3>Editar Usuário:</h3>
        <input type="text" name="nm_usuariocliente" value="<?php echo($row["nm_usuariocliente"])?>">
        <div class="botoes">
        <div class="salvarInfo">
           <a href="perfil-c.php"><input type="button" value="Cancelar" class="corLaranja"></a>
            <input type="submit" value="Salvar" class="corRosa">
            </div>
    </div>
    </div>
    </div>
</form>

<script src="js/scriptEditarPerfil-c.js"></script>
<script src="js/menu-c.js"></script>
<script src="js/lupa.js"></script>
<script src="js/carrinho.js"></script>

</body>
</html>