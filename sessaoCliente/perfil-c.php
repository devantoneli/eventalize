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

$sql = "SELECT * FROM tb_postagem WHERE cd_cliente = '$cd_cliente'";


$result_query3 = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/index/logo.png">
    <link rel="stylesheet" href="css/perfil-c.css">
    <link rel="stylesheet" href="css/menu-c.css">
    <title>Perfil - Eventalize</title>
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


    <div class="gridPerfil">
        <div class="imgPerfil">
            <img src="<?php echo ($_SESSION["url_fotoperfil"])?>" alt="">
        </div>
        <div class="textoPerfil">
            <h2><?php echo($_SESSION['nm_cliente'])?></h2><br>
            <h3>@<?php echo($_SESSION['nm_usuariocliente'])?></h3><br>
            <div class="botaoEditarPerfil">
                <a href="editarPerfil-c.php"><button>Editar Perfil</button></a>
            </div>
            
        </div>

        <div class="textoPublicacoes">
            <h2>Postagens</h2>
        </div>

<?php

if(mysqli_num_rows($result_query3) > 0){
    echo'
        <!-- <div class="gridPublicações"> -->
            <div class="tituloPostagem">';
    while($row = mysqli_fetch_assoc($result_query3)){
            echo'
                <h2>'.$row['nm_postagem'].'</h2><br>';?>
                <form action="perfilEmpresa-c.php" method="GET">
                <button class="grid-alinhaPerfil noestil">
                <input type="hidden" value="<?php echo($row['cd_empresa']) ?>" name="cd_empresa">
                <img class="img-fotoPerfil" src="<?php echo $row['url_fotoperfil'];?>" alt="">
                <h6><?php echo($row['nm_fantasia'])?></h6>
                </button>
              </form>
            <?php echo'</div>

            <div class="postsPerfilCliente">
                <div class="imgPosts1">
                    <img src="'.$row['url_imgcapa'].'" alt="">
                </div>
                <div class="imgPosts2">
                    <img src="'.$row['url_img2'].'" alt="">
                    <img src="'.$row['url_img3'].'" alt="">
                </div>
            </div>
            <div class="linhaDivisao"></div>'
            ;
    }
     echo'   <!-- </div> -->
    </div>';
}
?>

<!-- <div class="linhaDivisao"></div>

            <div class="tituloPostagem2">
                <h2>Festa de 10 anos do meu sobrinho!!</h2><br>
                <h3>Colaboradores: @decorazoes @candybolo @lembrancinhas @coxinha_doce</h3>
            </div>

            <div class="postsPerfilCliente2">
                <div class="imgPosts-1">
                    <img src="../bancoImagens/postagens/festaInfantil.jpg" alt="">
                </div>
                <div class="imgPosts-2">
                    <img src="../bancoImagens/postagens/festaInfantil.jpg" alt="">
                    <img src="../bancoImagens/postagens/festaInfantil.jpg" alt="">
                </div>
            </div>' -->
<script src="js/menu-c.js"></script>
<script src="js/lupa.js"></script>
<script src="js/carrinho.js"></script>

</body>
</html>