<?php


if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');


$cd_cliente = $_SESSION['cd_cliente'];

if(!isset($_POST['nm_tiposervico'])){
    $nm_tiposervico = $_GET['nm_tiposervico'];
}else{
    $nm_tiposervico = $_POST['nm_tiposervico'];
}



$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_servico as s
JOIN tb_tiposervico as tp ON tp.cd_tiposervico = s.cd_tiposervico
JOIN tb_empresa as e on e.cd_empresa = s.cd_empresa
WHERE (tp.nm_tiposervico LIKE '%$nm_tiposervico%' OR nm_servico LIKE '%$nm_tiposervico%' OR nm_fantasia LIKE '%$nm_tiposervico%')";

$result_query3 = mysqli_query($conn, $sql);
// or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/index/logo.png">
    <link rel="stylesheet" href="css/buscaServico-c.css">
    <link rel="stylesheet" href="css/menu-c.css">
    <title>Busca - Eventalize</title>
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
                <form action="buscaServico-c.php" method="get" id="searchForm">
                    <input type="text" style="padding: 2.5%;" placeholder="Procure Serviços" name="nm_tiposervico">
                    <div class="imgLupa">
                    <img src="../img/icones/icon-lupa.svg" alt="" width="30px" onclick="submitForm(si)">
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

<?php

if(mysqli_num_rows($result_query3) > 0){
    echo'<div class="gridBusca">
    <div class="tituloResultados">
        <h2>Resultados para "'.$nm_tiposervico.'"</h2>
    </div>

    <div class="gridCards">';
    while($row = mysqli_fetch_assoc($result_query3)){
        echo'    
            <div class="cardServico" onclick="submitCard()">';
                if ($row['url_imgcapa']==''){
                    echo'<img src="https://img.freepik.com/icones-gratis/galeria_318-583145.jpg?size=626&ext=jpg&ga=GA1.2.1135653598.1681429464&semt=ais" alt="">';
                  }else{
                    echo'<img src="'.$row['url_imgcapa'].'" alt="">';
                  }
               echo '<div class="textoServico">
                <form action="detalheServico.php" method="get">
                <input type="hidden" value="'.$row["cd_servico"].'" name="cd_servico">
                <button class="selecionar" type="submit">
                    <h2>'.substr($row['nm_servico'], 0,50).'...</h2><br>
                    <h3>'.substr($row['ds_servico'], 0,40).'...</h3>
                    <div class="precoServico">
                    <h4>R$'. str_replace('.', ',', $row['vl_servico']) .'</h4>
                    </div>
                </button>
                </div>
                </form>
                <div class="iconCarrinho">
                <form action="carrinho.php" method="POST">
                    <input type="hidden" name="cd_servico" value="'. $row['cd_servico'].'">
                    <input type="hidden" name="cd_empresa" value="'. $row['cd_empresa'].'">
                        <button class="semEstilo">
                            <svg width="53" height="54" viewBox="0 0 53 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.41675 4.5H8.25925C10.6442 4.5 12.5213 6.5925 12.3226 9L10.4897 31.41C10.4181 32.2782 10.5243 33.1521 10.8016 33.9762C11.0788 34.8004 11.5211 35.5569 12.1003 36.1979C12.6795 36.8388 13.3831 37.3501 14.1664 37.6995C14.9498 38.0489 15.7958 38.2287 16.6509 38.2275H40.1697C43.3497 38.2275 46.1322 35.5725 46.3751 32.355L47.5676 15.48C47.8326 11.745 45.0501 8.7075 41.3622 8.7075H12.8526M19.8751 18H46.3751M35.8855 49.5C36.6176 49.5 37.3197 49.2037 37.8374 48.6762C38.3551 48.1488 38.6459 47.4334 38.6459 46.6875C38.6459 45.9416 38.3551 45.2262 37.8374 44.6988C37.3197 44.1713 36.6176 43.875 35.8855 43.875C35.1534 43.875 34.4513 44.1713 33.9336 44.6988C33.4159 45.2262 33.1251 45.9416 33.1251 46.6875C33.1251 47.4334 33.4159 48.1488 33.9336 48.6762C34.4513 49.2037 35.1534 49.5 35.8855 49.5ZM18.2188 49.5C18.9509 49.5 19.6531 49.2037 20.1707 48.6762C20.6884 48.1488 20.9792 47.4334 20.9792 46.6875C20.9792 45.9416 20.6884 45.2262 20.1707 44.6988C19.6531 44.1713 18.9509 43.875 18.2188 43.875C17.4867 43.875 16.7846 44.1713 16.2669 44.6988C15.7492 45.2262 15.4584 45.9416 15.4584 46.6875C15.4584 47.4334 15.7492 48.1488 16.2669 48.6762C16.7846 49.2037 17.4867 49.5 18.2188 49.5Z" stroke="#000000" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                </form>
                </div>
            </div>';
    }
    echo'
        </div>
    </div>';
}else{
    echo ' <div class="tituloResultados">
    <h2>Nenhum resultado encontrado para "'.$nm_tiposervico.'".</h2>
</div>';
}
?>

    
    <script src="js/menu-c.js"></script>
    <script src="js/lupa.js"></script>
    <script src="js/carrinho.js"></script>

    <script>
        function submitCard(){
            document.getElementById("searchCard").submit();
        }
    </script>
</body>
</html>