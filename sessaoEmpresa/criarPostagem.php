<?php


if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');


$cd_pedido = $_GET['cd_pedido'];


$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$query = "SELECT * FROM tb_pedido WHERE cd_pedido = '$cd_pedido'"; 

$result = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("Nenhum resultado encontrado.");
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- FRONT-END tela de criação de postagem, redirecionada após passar pela seleção de pedidos -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="icon" href="/img/index/logo.png">
    <link rel="stylesheet" href="css/criarPostagem-e.css">
    <link rel="stylesheet" href="css/menu-e.css">
    <title>Criar Postagem - Eventalize</title>
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
    
    <!-- CARD criar postagem -->
    <form action="criacaoPostagem-e.php" method="post">
    <div class="grid-Principal">
        <div class="cardCriarPostagem">
            <!-- UPLOAD imagens -->
                <h1>Adicionar Imagens</h1>
                <!-- <input type="hidden" name="cd_postagem" value=""> -->
                <label class="uploadImgPedido" for="img-inputCapa" id="img2">
                    <input hidden class="linkCapa" id="img-inputCapa" value="" type="file" name="imgCapa">
                    <input id="linkimgCapa" value="mudara" type="hidden" name="url_imgcapa">
                    <img id="preview-capa" src="" width="100%">
                </label>
                
                    <div class="uploadImgPrincipal">
                        <label class="uploadImg" for="img-input2">
                            <input class="link2" id="img-input2" value="" hidden type="file" name="img2">
                                <input id="linkimg2" value="mudara" type="hidden" name="url_img2">
                                <img id="preview-2" src="" width="100%">
                        </label>

                        <label class="uploadImg2" for="img-input3">
                            <input hidden class="link3" id="img-input3" value="" type="file" name="img3">
                                <input id="linkimg3" value="mudara" type="hidden" name="url_img3">
                                <img id="preview-3" src="" width="100%">
                        </label>
                    </div>

                    <!-- LINHA DE DIVISÃO DAS COLUNAS-->
                    <div class="linhaDivisao"></div>

                <!-- PERFIL DA EMPRESA -->
                <div class="fotoPerfil">
                    <img src="<?php echo $_SESSION['url_fotoperfil'];?>" alt="">
                    <div> 
                    <h2><?php echo $_SESSION['nm_fantasia'];?></h2>
                    </div>
                </div>

                <!-- INFORMAÇÕES PARA A POSTAGEM-->

                <form action="criarPostagem.php" method="post">
                <div class="linhasInput">
                    <input type="text" placeholder="Pedido" name="cd_pedido" disabled value=<?php echo($row["cd_pedido"]) ?>>
                    <input type="text" placeholder="Título" name="nm_postagem">
                    <textarea id="legendaInput"  type="text" placeholder="Legenda" name="ds_postagem"></textarea>
                </div>
                </form>

                <!-- BOTÃO CRIAR POSTAGEM -->
                <div class="botaoPostagem">
                    <button type="submit">Criar Postagem</button>
                </div>

        </div>
    </div>
</form>


    <script src="js/menu-e.js"></script>
    <script src="js/criarPostagem-e.js"></script>
</body>
</html>