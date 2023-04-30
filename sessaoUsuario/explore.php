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
    <link rel="stylesheet" href="../css/estilo.css">
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
                <button class="estiloVazio" id="entrarHome" onclick="novaSection(1)"><a href="../entrar.html">Entrar</a></button>
                <button class="estiloVazio" id="entrarHome" onclick="novaSection(0)"><a href="../cadastrar.html">Cadastrar</a></button>
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
        
            // Div que contém a imagem e informações de uma postagem
            echo '<div class="tipoServico">';
            // Procura o codigo para inserir o icone correspondente
            $sql2 = "SELECT * FROM vwtiposervicopost where cd_postagem = ".$row['cd_postagem']."";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            //associa o código do autor da tabela postagem a variáveis
            $cliente = $row['cd_cliente'];
            $empresa = $row['cd_empresa'];
            // Pega informações do autora partir do atributo cd_tipoautor da tabela postagem
            if ($row['cd_tipoautor'] == 2){
                $sql4 = "SELECT * FROM tb_empresa where cd_empresa = $empresa";
                $result4 = $conn->query($sql4);
                $row4 = $result4->fetch_assoc();
                $nome = $row4['nm_fantasia'];
                $biografia = substr($row4['ds_biografia'], 0, 25) . '...';
                
            }else {
                $sql3 = "SELECT * FROM tb_cliente where cd_cliente = $cliente";
                $result3 = $conn->query($sql3);
                echo (mysqli_error($conn));
                $row3 = $result3->fetch_assoc();
                $nome = $row3['nm_cliente'];
                $biografia = 'Cliente';
            }
           
            
            //Carrega cada informação de cada postagem
            echo '<img class="iconTipo" src="../img/icones/'.$row2['cd_tiposervico'].'.svg">';
            echo '<div class="sombraCapa"></div>';
            echo '<img src="'.$row['url_imgcapa'].'">';
            echo '<form class="infoPostagem" action="postagem.php" method="get">
                        <input type="hidden" name="cd_postagem" value="'.$row['cd_postagem'].'">
                        <div>
                        <h3>'. $row['nm_postagem'] .'</h3>
                        </div>

                        <div class="autor">
                        <img class="perfil" src="">
                        
                        <div class="infoAutor">
                        <h3>'.$nome.'</h3>
                        <p>'.$biografia.'</p>
                        </div>
                        </div>
                  
                        <button class="verMais" type="submit">Ver mais</button>
                  </form>
            ';
            echo '</div>';
            
            // Incrementa o contador para separar as postagem com suas respectitivas colunas e posições
            $contador++;
        
            // Verifica se é a última imagem da coluna
            if ($contador % 7 === 0) {
                // Fecha a coluna quando é a última imagem
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

    <script src="js/scriptExplore.js"></script>
</body>
</html>