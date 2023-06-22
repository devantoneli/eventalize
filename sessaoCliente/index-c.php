<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}
    //LÓGICA PARA POSTAGENS DA SEMANA
    $sql = "SELECT url_imgcapa 
    FROM tb_postagem 
    WHERE MONTH(dt_postagem) = 05 
    AND YEAR(dt_postagem) = YEAR(CURRENT_DATE) 
    ORDER BY dt_postagem 
    DESC LIMIT 7";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // WHERE MONTH(dt_postagem) = MONTH(CURRENT_DATE) 

    //LÓGICA PARA EMPRESAS COM MAIOR AVALIAÇÃO
    $sql2 = "SELECT e.nm_fantasia, e.url_fotoperfil, ROUND(AVG(po.cd_avaliacao), 1) AS media_avaliacao
    FROM tb_postagem po
    JOIN tb_servicopedido sp ON sp.cd_pedido = po.cd_pedido
    JOIN tb_pedido pe ON pe.cd_pedido = sp.cd_pedido
    JOIN tb_servico s ON s.cd_servico = sp.cd_servico
    JOIN tb_empresa e ON e.cd_empresa = pe.cd_empresa
    GROUP BY e.nm_fantasia, e.url_fotoperfil
    ORDER BY media_avaliacao DESC LIMIT 7";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

    //LÓGICA PARA servicoS QUE ESTÃO BOMBANDO
    $sql3 = "SELECT sp.cd_servico, COUNT(sp.cd_pedido) AS total_compras, s.nm_servico, s.ds_servico, s.vl_servico, s.url_imgcapa
              FROM tb_servicopedido sp
              JOIN tb_servico s ON sp.cd_servico = s.cd_servico
              GROUP BY sp.cd_servico, s.nm_servico, s.ds_servico, s.vl_servico
              ORDER BY total_compras DESC
              LIMIT 5";
    $result3 = $conn->query($sql3);
    $row3=$result3->fetch_assoc();

    //LÓGICA PARA CARROSEL
    $sql4 = 'SELECT e.cd_empresa, e.nm_fantasia, e.url_fotoperfil, e.ds_biografia, e.nm_usuarioempresa,s.url_imgcapa, ROUND(AVG(po.cd_avaliacao), 1) AS media_avaliacao
    FROM tb_postagem po
    JOIN tb_servicopedido sp ON sp.cd_pedido = po.cd_pedido
    JOIN tb_pedido pe ON pe.cd_pedido = sp.cd_pedido
    JOIN tb_servico s ON s.cd_servico = sp.cd_servico
    JOIN tb_empresa e ON e.cd_empresa = pe.cd_empresa
    GROUP BY e.nm_fantasia, e.url_fotoperfil
    ORDER BY media_avaliacao DESC LIMIT 4
';
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_assoc();
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/iniciocliente.css">
    <link rel="stylesheet" href="css/menu-c.css">
    <link rel="icon" href="../img/index/logo.png">
    <title>Início - Eventalize</title>
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
            <button class="menuIcon3" onclick="menuOpenCliente()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
            </div>
            <section class="menuPerfil">
                <a href="perfil-c.php">Perfil</a>
                <!-- <a href="">Postagens</a> -->
                <!-- <a href="" style="margin-bottom: 20%">Histórico de Compras</a> -->
                <!-- <a href="historicopedido-c.php">Histórico de Pedidos</a> -->
                <a href="">Configurações</a>
                <a href="../logout.php">Sair</a>
            </section>
            <div class="headerMenuCliente">
                <a href="">Início</a>
                <a href="">Feed</a>
                <a href="">Mensagens</a>
                <a href="">Meus Pedidos</a>
                <a href="">Perfil</a>
                <a href="">Configurações</a>
                <a href="">Sair</a>
            </div>
        </div>
    </div>
<!-- FIM MENU -->

<div class="carousel">
    <div class="carousel-slides">
        
<?php
    if(mysqli_num_rows($result4) > 0){
        while($row4 = mysqli_fetch_assoc($result4)){
            $nm_fantasia = $row4['nm_fantasia'];
            $ds_biografia= $row4['ds_biografia'];
            $nm_usuarioempresa = $row4['nm_usuarioempresa'];
            $url_fotoperfil = $row4['url_fotoperfil'];
            $url_imgcapa = $row4['url_imgcapa'];
            $cd_empresa = $row4['cd_empresa'];
            
          echo ' <div class="slide">
          <form action="perfilEmpresa-c.php" method="GET" class="divInicio">
                <div class="divInicioSombra" style="background-image:linear-gradient(30deg, #000000 5%, transparent 70%), url('.$url_imgcapa.');"></div>
              <div class="textoInicio">
                  <h1>'. $nm_fantasia.'</h1>
                  <p>@'.$nm_usuarioempresa .'</p>
                  <img src="../bancoImagens/clientes/decoracaoouro.svg" alt="">
                  <h4>'. $ds_biografia.'</h4>
              </div>
              <img src="'.$url_fotoperfil.'" alt="">
              
              <input type="hidden" value="'.$cd_empresa.'" name="cd_empresa">
              <button type="submit">Visitar Perfil</button>
             
          </form>
      </div>';
          
        }
    }
    ?>

    </div>
</div>

<div class="categorias">
    <h1>Navegue por categorias</h1>
</div>

<div class="iconesBusca">
    <form action="buscaServico-c.php" method="POST" id="SearchA">
    <input type="hidden" value="Auxiliar" name="nm_tiposervico">
    <button type="submit" class="noEstilo">
        <img src="../img/index/auxiliar.svg" alt="auxiliar" title="Auxiliar">
    </button>
    </form>
    <form class="" action="buscaServico-c.php" method="POST">
            <input type="hidden" value="Atração" name="nm_tiposervico">
    <button type="submit" class="noEstilo">
        <img src="../img/index/atracao.svg" alt="atracao" title="Atração">
</button>
    </form>
    <form class="" action="buscaServico-c.php" method="POST">
            <input type="hidden" value="Comida" name="nm_tiposervico">
    <button type="submit" class="noEstilo">
        <img src="../img/index/comida.svg" alt="comida" title="Comida">
</button>
    </form>
    <form class="" action="buscaServico-c.php" method="POST">
            <input type="hidden" value="Decoração" name="nm_tiposervico">
    <button type="submit" class="noEstilo">
        <img src="../img/index/decoracao.svg" alt="decoracao" title="Decoração">
</button>
    </form>
    <form class="" action="buscaServico-c.php" method="POST">
            <input type="hidden" value="Equipamento" name="nm_tiposervico">
    <button type="submit" class="noEstilo">
        <img src="../img/index/equipamento.svg" alt="equipamento" title="Equipamento">
</button>
    </form>
    <form class="" action="buscaServico-c.php" method="POST">
            <input type="hidden" value="Espaço" name="nm_tiposervico">
    <button type="submit" class="noEstilo">
        <img src="../img/index/espaco.svg" alt="espaco" title="Espaço">
</button>
    </form>
    <form class="" action="buscaServico-c.php" method="POST">
            <input type="hidden" value="Fotografia" name="nm_tiposervico">
    <button type="submit" class="noEstilo">
        <img src="../img/index/fotografia.svg" alt="fotografia" title="Fotografia">
</button>
    </form>
    <form class="" action="buscaServico-c.php" method="POST">
            <input type="hidden" value="Música" name="nm_tiposervico">
    <button type="submit" class="noEstilo">
        <img src="../img/index/musica.svg" alt="musica" title="Música">
</button>
    </form>
</div>

<div class="categorias">
    <h1>Postagens da semana</h1>
</div>

<div class="grid">
    <div class="gridPostagens">
    <?php
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $url_imgcapa = $row['url_imgcapa'];
            // echo $url_imgcapa;
           echo '<div class="imgPostagens">
           <img src= '.$url_imgcapa.' alt="">
       </div>';
        }
    }else {
        echo "<h2>Sem destaques nessa semana!</h2>";
    }
    ?>
       
    </div>
</div>

<div class="categorias">
    <h1>Empresas com Melhor Avaliação</h1>
</div>

<div class="gridAvaliacao">
    <?php
    if(mysqli_num_rows($result2) > 0){
        while($row2 = mysqli_fetch_assoc($result2)){
            $nomeFantasia = $row2['nm_fantasia'];
            $urlFotoPerfil = $row2['url_fotoperfil'];
            $mediaAvaliacao = $row2['media_avaliacao'];
            // echo $nomeFantasia;
            // echo $urlFotoPerfil;
            // echo $mediaAvaliacao;
            echo '<div class="empresasAvaliacao">
            <img src="'.$urlFotoPerfil .'" alt="">
                <div class="textoEmpresa">
                    <h1>'.$nomeFantasia.'•</h1>
                </div>
                <div class="infoAvaliacao">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                    <p class="tamAvaliacao">'.$mediaAvaliacao .'</p>
                </div>

                
        </div>';
        }
    }
    ?>
    
</div>

<div class="categorias">
    <h1>Esses serviços estão bombando!</h1>
</div>
<div class="gridPacote">
    <?php
    if (mysqli_num_rows($result3) > 0) {
        while ($row3 = mysqli_fetch_assoc($result3)) {
            $nomeServico = $row3['nm_servico'];
            $descricaoServico = $row3['ds_servico'];
            $valorServico = $row3['vl_servico'];
            $imgCapa = $row3['url_imgcapa'];
            
            echo '<form class="cardPacotes" action="detalheServico.php" method="GET">
                    <div class="imagemPacote">
                        <img src="'.$row3['url_imgcapa'].'" alt="">
                        <div class="sombra"></div>
                    </div>
                    <div class="textoPacote">
                        <h2>'.substr($nomeServico, 0,35).'...</h2>
                        <div class="descPacote">
                            <h4>'.substr($descricaoServico, 0,60).'...</h4>
                        </div>
                        
                    </div>
                    <div class="precoPacote">
                            <h5>R$'.$valorServico.'</h5>
                        </div>
                        <input type="hidden" value="'.$row3['cd_servico'].'" name="cd_servico">
                        <button type="submit" class="botaoPacote">Ver mais</button>
                </form>';
        }
    } else {
        echo "Nenhum serviço encontrado.";
    }

?>

</div>


   




    <script src="js/menu-c.js"></script>
    <script src="js/lupa.js"></script>
    <script src="js/carrinho.js"></script>
    <script>
        // Função para pausar a animação do carrossel quando o cursor estiver sobre ele
function pauseCarousel() {
  var carousel = document.querySelector('.carousel');
  carousel.style.animationPlayState = 'paused';
}

// Função para retomar a animação do carrossel quando o cursor sair dele
function resumeCarousel() {
  var carousel = document.querySelector('.carousel');
  carousel.style.animationPlayState = 'running';
}

// Event listeners para pausar e retomar a animação do carrossel
var carousel = document.querySelector('.carousel');
carousel.addEventListener('mouseenter', pauseCarousel);
carousel.addEventListener('mouseleave', resumeCarousel);
    </script>
</body>
</html>