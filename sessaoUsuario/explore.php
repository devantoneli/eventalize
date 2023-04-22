<?php 

//TELA BACK E FRONT DE EXPLORAR, que carrega as imagens das capas de cada pedido ou pacote/serviço publicado tanto pela empresa, quanto pelo cliente

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
    echo ('Sem resultados.');
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
<div class="row">
    <!-- CORPO - GRID DE POSTAGENS -->
        <?php
        $contador = 0;
        while ($row = $result->fetch_assoc()) {
            // Verifica se é a primeira imagem da linha
        
            // Verifica se é a primeira imagem da coluna
            if ($contador % 7 === 0) {
                // Abre uma nova coluna
                echo '<div class="column">';
            }
        
            // Exibe a imagem
            echo '<div class="tipoServico">';
            // Procura o codigo para inserir o icone correspondente
            $sql2 = "SELECT * FROM vwtiposervicopost where cd_postagem = ".$row['cd_postagem']."";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            echo '<img class="iconTipo" src="../img/icones/'.$row2['cd_tiposervico'].'.svg">';
            echo '<div class="sombraCapa"></div>';
            echo '<img src="'.$row['url_imgcapa'].'">';
            echo '<form class="infoPostagem">
                        <div>
                        <h2>Album de fotos</h2>
                        <p>100 unidades</p>
                        </div>

                        <div class="autor">
                        <img class="perfil" src="">
                        
                        <div class="infoAutor">
                        <h2>Jessica Lima</h2>
                        <p>Fotografa Social</p>
                        </div>
                        </div>
                  
                        <button class="verMais" type="submit">Ver mais</button>
                  </form>
            ';
            echo '</div>';
            
            // Incrementa o contador
            $contador++;
        
            // Verifica se é a última imagem da coluna
            if ($contador % 7 === 0) {
                // Fecha a coluna
                echo '</div>';
            }
        

        }
        
        // Verifica se ainda há imagens não exibidas
        while ($contador % 28 !== 0) {
            // Verifica se é a última imagem da coluna
            if ($contador % 7 === 0) {
                // Fecha a coluna
                echo '</div>';
            }
        
            // Incrementa o contador
            $contador++;
        }
        
        $conn->close();
        ?>
</div>
    <!-- FIM CORPO -->

    <script src="/sistema/eventalize/js/menu.js"></script>
</body>
</html>