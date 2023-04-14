<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

$sql = "SELECT * FROM tb_servico";
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
    <link rel="stylesheet" href="estiloExplore.css">
    <title>Explore</title>
</head>
<body>
    <!-- MENU -->
    <header>
        <div class="logoHome">
            <img src="img/index/logo.png" alt="logo">
        </div>
            <div class="headerHome">
                <a href="../../index.html">Início</a>
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

<?php
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    echo '<div class="col-4"><div class="card" style="width: 18rem;">
    <img src="'.$row["url_img"].'" class="card-img-top borrado-amarelo" alt="'. $row["nm_pokemon"] .'">
    <div class="card-body borrado-amarelo">
      <h5 class="card-title">'. $row["nm_pokemon"] .'</h5>
      <p class="card-text">'. $row["ds_tipo1"] . "/" .$row["ds_tipo2"] .'</p>
      <form action="deletar.php">
       <input type="hidden" name="cd_pokemon" value="'. $row["cd_pokemon"] .'">
       <input type="submit" class="btn btn-warning" value="Deletar">
      </form>
      <form action="alterarsele.php">
      <input type="hidden" name="cd_pokemon" value="'. $row["cd_pokemon"] .'">
      <input type="submit" class="btn btn-primary" value="Alterar">
     </form>
    </div>
  </div></div>';
}
}else {
    echo "0 results";
}
$conn->close();
?>
    <div class="row">
        <div class="column">
            <img src="">
            <img src="<?php echo $row['url_imgcapa'];?>">
            <img src="<?php echo $row['url_img2'];?>">
            <img src="<?php echo $row['url_img3'];?>">
            <img src="nature.jpg">
            <img src="mist.jpg">
            <img src="paris.jpg">
        </div>
        <div class="column">
            <img src="underwater.jpg">
            <img src="ocean.jpg">
            <img src="wedding.jpg">
            <img src="mountainskies.jpg">
            <img src="rocks.jpg">
            <img src="underwater.jpg">
        </div>
        <div class="column">
            <img src="wedding.jpg">
            <img src="rocks.jpg">
            <img src="falls2.jpg">
            <img src="paris.jpg">
            <img src="nature.jpg">
            <img src="mist.jpg">
            <img src="paris.jpg">
        </div>
        <div class="column">
            <img src="underwater.jpg">
            <img src="ocean.jpg">
            <img src="wedding.jpg">
            <img src="mountainskies.jpg">
            <img src="rocks.jpg">
            <img src="underwater.jpg">
        </div>
    </div>

    <!-- FIM CORPO -->
    
    <script src="/sistema/eventalize/js/menu.js"></script>
</body>
</html>