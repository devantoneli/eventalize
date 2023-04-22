<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/postagem.css">
    <link rel="icon" href="../img/icones/logo.png">
    <title>Postagem Empresa</title>
</head>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Não foi possível conectar ao banco de dados: " . $conn->connect_error);
}

//SELECT PARA PEGAR AS INFORMAÇÕES DE PUBLICAÇÃO

if (isset($_GET['cd_postagem'])) {
    $cd_postagem = $_GET['cd_postagem'];

    // SELECT PARA PEGAR AS INFORMAÇÕES DE PUBLICAÇÃO
    $sql = "SELECT nm_postagem, ds_postagem, url_imgcapa, url_img2, url_img3 FROM tb_postagem WHERE cd_postagem = $cd_postagem";
    $result = $conn->query($sql);

    $result_query = mysqli_query($conn, $sql) or die('Erro na query: ' . $sql . ' ' . mysqli_error($conn));

    // SELECT PARA PEGAR AS INFORMAÇÕES DE EMPRESA
    $sql2 = "SELECT p.nm_postagem, p.ds_postagem, p.url_imgcapa, p.url_img2, p.url_img3, e.nm_fantasia, e.cd_empresa FROM tb_postagem AS p INNER JOIN tb_empresa AS e ON p.cd_empresa = e.cd_empresa WHERE p.cd_postagem = $cd_postagem";
    $result2 = $conn->query($sql2);

    // SELECT PARA RODAR A VIEW DE SERVIÇOS/PACOTES NA POSTAGEM DO PEDIDO
    $sql3 = "SELECT vwcodigospostagem WHERE cd_postagem = $cd_postagem";
    $result3 = $conn->query($sql3);

    if ($result->num_rows > 0) {
        // aqui vem todo o código antes de inserir as informações que você precisa do banco de dados
    }

    while ($row = $result2->fetch_assoc()) {
        // aqui vai todo o código onde você precisa pegar as informações do banco de dados 
        // utiliza o echo para mostrar e o .$row['atributo'] para colocar as infos que você quer pegar
        
    }
}

?>




<body>
    <div class="grid-container"> <!--DIV QUE CARREGA O LAYOUT GRID DA PÁGINA TODA-->
    <!-- MENU -->
        <div class="header">
          <div class="logo">
              <img src="../img/icones/logoBranca.svg" alt="">
          </div>
          <div class="menu">
              <a href="">Início</a>
              <a href="">Inspira-se</a>
              <a href="">Sobre Nós</a>
              <a href="">Contato</a>
          </div>
      
          <div class="headerPesquisa">
                <input type="text" placeholder="Procure Serviços">
                <img src="../img/icones/icon-lupa.svg" alt="" width="30px">
              </div>
              <div class="headerClientePerfil" >
                  <!-- <div class="iconCliente"> -->
                      <a href="#" class="carrinho"><img src="../img/icones/icon-carrinho.svg" alt="Carrinho"></a>
                      <a href="#" class ="notificacao"><img src="../img/icones/icon-notificacao.svg" alt="Notificações"></a>
                    <!-- </div> -->
              <button class="menuIcon" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
              </div>
              <section class="menuPerfil">
                <a href="">Perfil</a>
                <a href="">Postagens</a>
                <a href="" style="margin-bottom: 20%">Histórico de Compras</a>
                <a href="">Configurações</a>
                <a href="">Sair</a>
            </section>
      </div>


      <!-- INICIO POSTAGENS -->
      <div class="inicioPostagens">
        <div class="fotoDestaque">
            <div class="curtidasPostagem">
                <img src="../img/icones/icon-palmas-detalhes.png" alt="">
                <h3>1548</h3>
            </div>
            <div class="salvarPostagem">
                <img src="../img/icones/icon-salvar-detalhes.png" alt="">
            </div>
            <img src="../bancoImagens/postagens/fotodestaque.jpg" alt="">
        </div>
        <div class="fotoLateral">
            <img src="../bancoImagens/postagens/fotolateral.jpg" alt="">
            <img src="../bancoImagens/postagens/fotolateral2.jpg" alt="">
        </div>
        <div class="dataPostagem">
            <h3>postado em 14 de fevereiro de 2023, às 11h20</h3>
        </div>

        <div class="tituloPostagem">
            <h3><?php echo($row["nm_postagem"])?></h3>
        </div>

        <div class="descricaoTituloPostagem">
            <h3><?php echo($row["ds_postagem"])?></h3>
        </div>



        <div class="iconEmpresa">
            <img src="../bancoImagens/empresas/fotoempresa.jpg" alt="">
            <div class="nomeEmpresa">
            <h3>Max Lyp Decorações</h3>
            <div class="iconsCategorias">
                <img style="width: 30px; margin: 2%;" src="../img/icones/icon-decoracao-detalhes.png" alt="">
                <img src="../img/icones/icon-auxiliar-detalhes.png" alt="">
                <img src="../img/icones/icon-espaco-detalhes.png" alt="">
            </div>
        </div>
        </div>
    </div>

    <!-- INICIO EXIBIÇÕES DE PACOTES -->
    <div class="infoDescricao">
        <h3>Esta postagem contém o pacote</h3>
    </div>
<div class="inicioInfoPostagem">
    <div class="quadroPacote">
        <div class="seta-direita">&#8250;</div>
        <div class="seta-esquerda">&#8249;</div>
        <div class="carrosselPacote">
            <div class="slide">
        <div class="tituloInfoPacote">
            <img src="../img/icones/icon-decoracao-detalhes-pacote.png" alt="">
            <h3>Decoração florida para casamentos elegantes</h3>
        </div>
        <div class="fotoDestaquePacote">
            <img src="../bancoImagens/postagens/fotodestaque.jpg" class="active" alt="">
        </div>

        <div class="fotoLateralPacote">
            <img src="../bancoImagens/postagens/fotolateral.jpg" alt="">
            <img src="../bancoImagens/postagens/fotolateral2.jpg" alt="">
        </div>

        <div class="descricaoInfoPacote">
            <h3>Decoração repleta de flores, das mais delicadas às mais sofisticadas, com móveis e talheres em tons pastéis e funcionários dedicados...</h3>
        </div>

        <button class="botaoDetalhes">Mais detalhes</button>

        <div class="identificaPersonalizacao">
            <h3><img src="../img/icones/icon-personaliza-detalhes.png" alt=""> Personalizado pelo Cliente</h3>
        </div>
    </div>
            <!-- <div class="slide">
        <div class="tituloInfoPacote">
            <img src="imagens/icon-decoracao-detalhes-pacote.png" alt="">
            <h3>Decoração florida para casamentos elegantes</h3>
        </div>
        <div class="fotoDestaquePacote">
            <img src="imagens/fotodestaque.jpg" class="active" alt="">
        </div>

        <div class="fotoLateralPacote">
            <img src="imagens/fotolateral.jpg" alt="">
            <img src="imagens/fotolateral2.jpg" alt="">
        </div>

        <div class="descricaoInfoPacote">
            <h3>Decoração repleta de flores, das mais delicadas às mais sofisticadas, com móveis e talheres em tons pastéis e funcionários dedicados...</h3>
        </div>

        <button class="botaoDetalhes">Mais detalhes</button>

        <div class="identificaPersonalizacao">
            <h3><img src="imagens/icon-personaliza-detalhes.png" alt=""> Personalizado pelo Cliente</h3>
        </div>
    </div> -->
</div>
</div>
</div>

    <!-- MAIS SOBRE A EMPRESA -->
    <div class="maisSobre">
        <h3>Mais sobre a empresa</h3>
        <div class="gridMaisSobre">
            <div class="prestacaoMes">
                <h1>100</h1>
                <h3>Prestações de serviços no último mês</h3>
            </div>
            <div class="classificacaoEmpresa">
                <img src="../bancoImagens/empresas/balaoouro.png" alt="">
                <h3>Esta é uma empresa</h3> <h2>balão ouro</h2>
            </div>
            <div class="prestacaoFinalizada">
                <h1>+2000</h1>
                <h3>Prestacões de serviços finalizadas</h3>
            </div>
        </div>
    </div>
</div>

<script src="../js/menu.js"></script>
</body>
</html>