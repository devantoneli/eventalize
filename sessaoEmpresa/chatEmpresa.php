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

    $sql = "SELECT * FROM tb_cliente WHERE cd_cliente = 1"; 
    $result = $conn->query($sql);
    $row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="icon" href="../img/index/logo.png">
    <link rel="stylesheet" href="../sessaoEmpresa/css/menu-e.css">
    <link rel="stylesheet" href="../sessaoEmpresa/css/chatEmpresa-e.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
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
                    <!-- <a href=""><h5>Pedidos</h5></a> -->
                    <a href="criacaoServico-e.php"><h5>Criar Serviço ou Pacote</h5></a>
                    <a href="selecaoPedido-e.php"><h5>Criar Postagens</h5></a>
                </section>
    
                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-bell-fill opcaoMenu" viewBox="0 0 16 16" style="cursor:pointer;">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>
    
                <div id="inserirPerfil">
                  <img src="<?php echo $_SESSION['url_fotoperfil'];?>" alt="">
                </div>
    
                <section id="menuPerfil">
                    <a href="perfilEmpresa.php"><h5>Perfil</h5></a>
                    <!-- <a href=""><h5>Pontuações</h5></a>
                    <a href=""><h5>Postagens</h5></a>
                    <a href=""><h5>Estatísticas de venda</h5></a> -->
                    <a href=""><h5>Configurações</h5></a>
                    <a href="../logout.php"><h5>Sair</h5></a>
                </section>
            </div>
        </header>
    </div>
    <!--FIM MENU EMPRESA -->

     <!--INICIO CONVERSAS CHAT -->
     <div class="divisaoArea">
     <h2>Conversas</h2>
    <div class="conversasPerfil">
        <div class="scroll">
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $_SESSION['url_fotoperfil'];?>"  alt="imagem">
            </div>
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $_SESSION['url_fotoperfil'];?>"  alt="imagem">
            </div>
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $_SESSION['url_fotoperfil'];?>"  alt="imagem">
            </div>
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $_SESSION['url_fotoperfil'];?>"  alt="imagem">
            </div>
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $_SESSION['url_fotoperfil'];?>"  alt="imagem">
            </div>
            <div class="alinha">
                <h3>Smash Party</h3>
                <img src="<?php echo $_SESSION['url_fotoperfil'];?>"  alt="imagem">
            </div>
        </div>
    </div>

    <div class="linhaDivisao"></div>


    <div class="mensagensPerfil">
            <br>
            <div class="infoCliente">
                <img src="<?php echo $_SESSION['url_fotoperfil'];?>"  alt="imagem">
                <h2><?php echo $row['nm_cliente'];?> <?php echo $row['nm_sobrenome'];?></h2>
            </div>
            <div class="carregaChat">
                <!--Aqui deve carregar a lógica de chat que ainda está sendo desenvolvida-->
            </div>
        </div>
     </div>
     <!--FIM CONVERSAS CHAT -->
</body>
<script src="../sessaoEmpresa/js/menu-e.js"></script>
</html>