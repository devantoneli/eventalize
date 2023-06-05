<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');


$cd_empresa = $_GET['cd_empresa'];

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

<!-- ESSA TELA TEM COMO FUNÇÕES, POR ENQUANTO, EXCLUIR, EDITAR E VISUALIZAR OS SERVIÇOS DE UMA EMPRESA -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" href="imagens/logo.png"> -->
    <link rel="stylesheet" href="../sessaoEmpresa/css/perfil-empresa.css"/>
    <link rel="stylesheet" href="css/menu-c.css"/>
    <link rel="icon" href="../img/index/logo.png">
    <title>Perfil - Eventalize</title>
</head>
<body>
    <div class="inicioPerfil">
    <!--INICIO MENU EMPRESA -->
<!-- INICIO MENU -->
<div class="grid-container">
        <div class="header2">
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
                <!-- <a href="historicopedido-c.php">Histórico de Pedidos</a> -->
                <a href="">Configurações</a>
                <a href="../logout.php">Sair</a>
            </section>
        </div>
    </div>
<!-- FIM MENU -->
            <div class="infoPerfil">
                <div class="bioPerfil">
                    <div class="fotoPerfil">
                    <img src="<?php echo $row['url_fotoperfil'];?>" alt="">
                    </div>
                    <div class="infoEmpresa">
                        <div class="info">
                        <h3><?php echo $row['nm_fantasia'];?></h3>
                        <h5><?php echo $row['nm_usuarioempresa'];?></h5>
                        <h4><?php echo $row['ds_biografia'];?></h4>
                        </div>
                        <!-- <div class="loc">
                            <img src="../bancoImagens/empresas/imagens-perfil-empresa/loc.svg" alt="">
                            <h4>Santos - SP</h4>
                        </div> -->
                            <div class="avaliacaoPerfil">
                                <img src="../bancoImagens/empresas/imagens-perfil-empresa/star.svg" alt="">
                                <h4>4,8</h4>
                            </div>
                           
                    </div>
                    <div class="botaoEditarPerfil">
                        <form action="chatCliente.php" method="GET">
                            <input type="hidden" value="<?php echo$cd_empresa; ?>" name="cd_empresa">
                            <a href="editarPerfil-e.php"><button class="editarPerfil" type="submit"><img src="" alt=""style="margin-right: -12%"><img src="../img/icones/chat.png" alt="">
                            </svg>Enviar mensagem</button></a>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            
<?php
            
// SELECIONANDO AS INFORMAÇÕES QUE QUERO EXIBIR NA TELA DETALHES
$query2 = "SELECT cd_servico ,nm_servico, ds_servico, vl_servico, url_imgcapa FROM tb_servico WHERE cd_empresa = '$cd_empresa'";
            
$result_query2 = mysqli_query($conn, $query2) or die(' Erro na query:' . $query2 . ' ' . mysqli_error($conn));


if (mysqli_num_rows($result_query2) > 0) {
    echo '
    <div class="inicioPacotes">
    <div class="servicos">
    <h2>Serviços</h2>
    </div>
        <div class="gridPacotes">';

    // Lista de cores disponíveis para os cards
    $cores = array('#3ED1FF', '#FFA856', '#B974B1');

    // Corrente do índice de cores
    $indiceCor = 0;

    while ($row2 = mysqli_fetch_assoc($result_query2)) {
        // Obter a cor do índice atual
        $corCard = $cores[$indiceCor];

        // Incrementar o índice para a próxima cor
        $indiceCor = ($indiceCor + 1) % count($cores);

        echo '
        <div class="cardPacotes" style="background-color: '.$corCard.';">
            <div class="conteudoPacote">
                <form action="detalheServico.php">
                    <input type="hidden" value="'.$row2["cd_servico"].'" name="cd_servico">
                    <button type="submit" style="background: transparent; border: none; cursor: pointer;">';
                        if($row2["url_imgcapa"]==''){
                            echo'<img class="imgUrl" width="50%" src="https://img.freepik.com/icones-gratis/galeria_318-583145.jpg?size=626&ext=jpg&ga=GA1.2.1135653598.1681429464&semt=ais" alt="">';
                        }else{
                            echo'<img class="imgUrl" src="'.$row2["url_imgcapa"].'" alt="">';
                        }
                        echo'<h3>'.$row2["nm_servico"].'</h3>
                        <h4>'.$row2["ds_servico"].'</h4>
                        <h2>R$'. str_replace('.', ',', $row2['vl_servico']) .'</h2>
                    </button>
                    <div class="botoesPacote">
                    </form>
                    
                    <form action="carrinho.php" method="POST">
                        <input type="hidden" value="'.$row2["cd_servico"].'" name="cd_servico">
                        <button class="deletarPacote" type="submit"><svg width="40" height="40" viewBox="0 0 53 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.41675 4.5H8.25925C10.6442 4.5 12.5213 6.5925 12.3226 9L10.4897 31.41C10.4181 32.2782 10.5243 33.1521 10.8016 33.9762C11.0788 34.8004 11.5211 35.5569 12.1003 36.1979C12.6795 36.8388 13.3831 37.3501 14.1664 37.6995C14.9498 38.0489 15.7958 38.2287 16.6509 38.2275H40.1697C43.3497 38.2275 46.1322 35.5725 46.3751 32.355L47.5676 15.48C47.8326 11.745 45.0501 8.7075 41.3622 8.7075H12.8526M19.8751 18H46.3751M35.8855 49.5C36.6176 49.5 37.3197 49.2037 37.8374 48.6762C38.3551 48.1488 38.6459 47.4334 38.6459 46.6875C38.6459 45.9416 38.3551 45.2262 37.8374 44.6988C37.3197 44.1713 36.6176 43.875 35.8855 43.875C35.1534 43.875 34.4513 44.1713 33.9336 44.6988C33.4159 45.2262 33.1251 45.9416 33.1251 46.6875C33.1251 47.4334 33.4159 48.1488 33.9336 48.6762C34.4513 49.2037 35.1534 49.5 35.8855 49.5ZM18.2188 49.5C18.9509 49.5 19.6531 49.2037 20.1707 48.6762C20.6884 48.1488 20.9792 47.4334 20.9792 46.6875C20.9792 45.9416 20.6884 45.2262 20.1707 44.6988C19.6531 44.1713 18.9509 43.875 18.2188 43.875C17.4867 43.875 16.7846 44.1713 16.2669 44.6988C15.7492 45.2262 15.4584 45.9416 15.4584 46.6875C15.4584 47.4334 15.7492 48.1488 16.2669 48.6762C16.7846 49.2037 17.4867 49.5 18.2188 49.5Z" stroke="#000000" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></button>
                    </form>
                </div>
            </div>
        </div>';
    }

    echo '
        </div>
    </div>';
} else {
    echo "Nenhum registro encontrado";
}

mysqli_close($conn);

  
  ?>
        </div>
    </div>
  </div>
    <script src="js/carouseul.js"></script>
    <script src="js/menu-c.js"></script>
    <script src="js/lupa.js"></script>
    <script src="js/carrinho.js"></script>
</body>
</html>