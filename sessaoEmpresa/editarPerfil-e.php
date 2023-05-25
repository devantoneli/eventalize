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

    $sql = "SELECT * FROM tb_empresa WHERE cd_empresa = 1"; 
    $result = $conn->query($sql);
    $row = $result -> fetch_assoc();
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
    <!-- <link rel="stylesheet" href="css/menu-e.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/index/logo.png">
    <title>Início Empresa - Eventalize</title>
</head>
<body>

<!--INICIO MENU EMPRESA -->
    <div class="bg-gradPrincipal menuEmpresa">
        <header class="alinhaElementos">
            <div id="logoImagem"><a href="../sessaoEmpresa/index-e.php"></a></div>
            
            <ul class="opcoesMenu">
                <li class=""><a href="index-e.php" class="opcaoMenu" aria-current="page">Início</a></li>
                <li class="nav-item"><a href="pedidos-e.php" class="opcaoMenu">Pedidos</a></li>
                <li class="nav-item"><a href="#" class="opcaoMenu">Suas postagens</a></li>
                <li class="nav-item"><a href="chatEmpresa.php" class="opcaoMenu">Mensagens</a></li>
            </ul>
        
            <div class="alinhaLogo">
                <button class="botaoSeta" id="iconSeta">
                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                </button>

                <section id="menu">
                <a href="criacaoServico-e.php"><h5>Criar Serviço ou Pacote</h5></a>
                <a href="selecaoPedido-e.php"><h5>Criar Postagens</h5></a>
                </section>

                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-bell-fill opcaoMenu" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>

                <div id="inserirPerfil">
                    <img src="<?php echo $_SESSION['url_fotoperfil'];?>">
                </div>

                <section id="menuPerfil">
                <a href="perfilEmpresa.php"><h5>Perfil</h5></a>
                <a href=""><h5>Pontuações</h5></a>
                <a href=""><h5>Postagens</h5></a>
                <a href=""><h5>Estatísticas de venda</h5></a>
                <a href=""><h5>Configurações</h5></a>
                <a href="../logout.php"><h5>Sair</h5></a>
            </section>
            </div>
        </header>
    </div>
<!--FIM MENU EMPRESA -->
<form class="estiloForm">
    <div class="grid-item">
        <h1>Editar Perfil</h1>
    </div>
    <div class="grid-item row2-col1">
        <img src="https://img.freepik.com/fotos-gratis/mulher-interessada-com-cabelo-ondulado-tirando-selfie_197531-16717.jpg?w=1380&t=st=1685027872~exp=1685028472~hmac=5a7e7c455945fbfb46766e4efe959eb1f2aa20323e859235929f8c98f60d70af" alt="imagem">
        <h3>Edite sua foto de perfil</h3>
    </div>
    <div class="grid-item row2-col2">
        <h3>Editar Nome Fantasia:</h3>
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