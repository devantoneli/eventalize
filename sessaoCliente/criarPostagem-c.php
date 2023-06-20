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
    <link rel="stylesheet" href="css/criarPostagem-c.css">
    <link rel="stylesheet" href="css/menu-c.css">
    <title>Criar Postagem - Eventalize</title>
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
    
    <!-- CARD criar postagem -->
    <form action="criacaoPostagem-c.php" method="post">
    <div class="grid-Principal">
        <div class="cardCriarPostagem">
            <!-- UPLOAD imagens -->
                <h1>Adicionar Imagens</h1>
                <!-- <input type="hidden" name="cd_postagem" value=""> -->
                <label class="uploadImgPedido" for="img-inputCapa" id="img2">
                    <input required class="linkCapa" id="img-inputCapa" value="" type="file" name="imgCapa">
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
                    <h2><?php echo $_SESSION['nm_cliente'];?></h2>
                    </div>
                </div>

                <!-- INFORMAÇÕES PARA A POSTAGEM-->

                <form action="criarPostagem.php" method="post">
                <div class="linhasInput">
                    <input type="text" placeholder="Pedido" name="cd_pedido" value=<?php echo($cd_pedido); ?>>
                    <input required type="text" placeholder="Título" name="nm_postagem">
                    <div>
                    <img style="margin-bottom: -7px;" src="../img/icones/estrel.png" alt="">
                    <select required class="avaliacao" name="cd_avaliacao">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    </div>
                    <textarea required id="legendaInput"  type="text" placeholder="Legenda" name="ds_postagem"></textarea>
                </div>
                </form>

                <!-- BOTÃO CRIAR POSTAGEM -->
                <div class="botaoPostagem">
                    <button type="submit">Criar Postagem</button>
                </div>

        </div>
    </div>
</form>


    <script src="js/menu-c.js"></script>
    <script src="js/criarPostagem-c.js"></script>
</body>
</html>