<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

$sql = "SELECT * FROM tb_postagem";
$result = $conn->query($sql);

$result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}else{
    echo ('rolou algum erro');
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sistema/eventalize/css/estilo.css">
    <link rel="stylesheet" href="css/estiloExplore.css">
    <title>Explore</title>
</head>
<body>
    <!-- MENU -->
    <header>
        <div class="logoHome">
            <img src="../img/index/logo.png" alt="logo">
        </div>
            <div class="headerHome">
                <a href="../index.html">Início</a>
                <a href="">Explore</a>
                <a href="">Sobre Nós</a>
            </div>
            <div class="headerHomePerfil">
                <button class="estiloVazio" id="entrarHome" onclick="novaSection(1)"><a>Entrar</a></button>
                <button class="estiloVazio" id="entrarHome" onclick="novaSection(0)"><a>Cadastrar</a></button>
            </div>
            <button class="menuIcon" onclick="menuOpen()"><img  src="img/index/menuicon.svg" width="30px"></button>
    </header>
    <!-- FIM MENU -->

    <!-- CORPO - GRID DE POSTAGENS -->
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="column">
            <img width="20%" src="'.$row['url_imgcapa'].'">
                </div>';
        }
        }else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>

    <!-- FIM CORPO -->
    
    <script src="/sistema/eventalize/js/menu.js"></script>
</body>
</html>