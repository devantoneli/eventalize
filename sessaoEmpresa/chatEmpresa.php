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

    $sql = "SELECT c.cd_cliente, c.nm_cliente, c.url_fotoperfil FROM tb_chat ch
    join tb_cliente c on c.cd_cliente = ch.cd_cliente
    WHERE ch.cd_empresa=$cd_empresa group by ch.cd_cliente"; 
    $result = $conn->query($sql);
    $result_query = mysqli_query($conn,  $sql) or die(' Erro na query:' .  $sql . ' ' . mysqli_error($conn));
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
                    <a href="criacaoServico-e.php"><h5>Criar Serviço</h5></a>
                    <!-- <a href="selecaoPedido-e.php"><h5>Criar Postagens</h5></a> -->
                </section>
    
       
    
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
<?php
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

    echo'<div class="alinha">
            <h3>'.$row['nm_cliente'].'</h3><br>
            <img class="imgEmpresa" src="'.$row['url_fotoperfil'].'" value="'.$row['cd_cliente'].'" alt="imagem">
        </div>';

    }
}
?>           
        </div>
    </div>

    <div class="linhaDivisao"></div>


    <div class="mensagensPerfil">
            <br>
            <div class="infoCliente">
                <img id="fotoMeio" src="../img/icones/selecione.png"  alt="imagem" value="" empresa="">
                <h2 id="nomeMeio">Selecione um chat</h2>
            </div>

            <div class="chat">

            </div>

            <div class="carregaChat">
                <input type="text" name="ds_mensagem" id="mensagem">
                <button id="enviar" onclick="enviar()">Enviar</button>
            </div>
        </div>
     </div>
     <!--FIM CONVERSAS CHAT -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../sessaoCliente/js/menu-c.js"></script>
<script src="js/chat-e.js"></script>
 
</body>
<script src="../sessaoEmpresa/js/menu-e.js"></script>
</html>