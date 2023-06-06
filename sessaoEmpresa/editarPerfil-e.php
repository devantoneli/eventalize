<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

$cd_empresa = $_SESSION["cd_empresa"];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

   $query = "SELECT * FROM tb_empresa WHERE cd_empresa = '$cd_empresa'"; 
    $result_query = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));
    $row = mysqli_fetch_assoc($result_query);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- FRONT-END tela incial da empresa, redirecionada após passar pela validação de cadastro ou login -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo-e.css">
    <link rel="stylesheet" href="css/editarPerfil-e.css">
    <link rel="stylesheet" href="css/menu-e.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/index/logo.png">
    <title>Editar Perfil - Eventalize</title>
</head>
<body>

<!--INICIO MENU EMPRESA -->
    <div class="bg-gradPrincipal menuEmpresa">
        <header class="alinhaElementos">
        <a href="index-e.php"><div id="logoImagem"></div></a>
            
            <ul class="opcoesMenu">
                <li class=""><a href="index-e.php" class="opcaoMenu" aria-current="page">Início</a></li>
                <li class="nav-item"><a href="pedidos-e.php" class="opcaoMenu">Pedidos</a></li>
                <li class="nav-item"><a href="perfilEmpresa.php" class="opcaoMenu">Suas postagens</a></li>
                <li class="nav-item"><a href="chatEmpresa.php" class="opcaoMenu">Mensagens</a></li>
            </ul>
        
            <div class="alinhaLogo">
                <button class="botaoSeta" id="iconSeta">
                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                </button>

                <section id="menu">
                <a href="criacaoServico-e.php"><h5>Criar Serviço</h5></a>
                <!-- <a href="selecaoPedido-e.php"><h5>Criar Postagens</h5></a> -->
                </section>

                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-bell-fill opcaoMenu" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>

                <div id="inserirPerfil">
                    <img src="<?php echo $_SESSION['url_fotoperfil'];?>">
                </div>

                <section id="menuPerfil">
                <a href="perfilEmpresa.php"><h5>Perfil</h5></a>
                <!-- <a href=""><h5>Pontuações</h5></a>
                <a href=""><h5>Postagens</h5></a>
                <a href=""><h5>Estatísticas de venda</h5></a> -->
                <a href="editarPerfil-e.php"><h5>Configurações</h5></a>
                <a href="../logout.php"><h5>Sair</h5></a>
            </section>
            </div>
        </header>
    </div>
<!--FIM MENU EMPRESA -->
<form class="estiloForm" action="editandoPerfil-e.php" method="post">
    <div class="grid-item">
        <h1>Editar Perfil</h1>
    </div>

    <div class="grid-item row2-col1">
        <img id="preview-capa" src="<?php echo $_SESSION['url_fotoperfil'];?>" alt="imagem">
        <h3>Editar foto</h3>
        <label for="cardCarregarFoto" for="img-inputFotoPerfil" id="imgPerfil">
            <input class="linkPerfil" id="img-inputFotoPerfil" value="" type="file" name="imgPerfil">
            <input id="linkimgPerfil" value="mudara" type="hidden" name="url_fotoperfil">
        </label>
    </div>

    <div class="grid-item row2-col2">
        <h3>Editar Nome Fantasia:</h3>
        <input type="text" name="nm_fantasia" value="<?php echo($row["nm_fantasia"])?>">
        <h3>Editar Biografia:</h3>
        <input type="text" name="ds_biografia" value="<?php echo($row["ds_biografia"])?>">
        <h3>Editar Usuário:</h3>
        <input type="text" name="nm_usuarioempresa" value="<?php echo($row["nm_usuarioempresa"])?>">
        <div class="botoes">
        <div class="salvarInfo">
            <input type="button" value="Cancelar" class="corLaranja">
            <input type="submit" value="Salvar" class="corRosa">
            </div>
    </div>
    </div>
    </div>
</form>

    <script src="js/scriptEditarPerfil-e.js"></script>
    <script src="js/menu-e.js"></script>

</body>
</html>