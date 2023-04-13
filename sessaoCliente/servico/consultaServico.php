<?php

// ESSA TELA SERÁ EXIBIDA QUANDO O CLIENTE, QUE PODE ESTAR TANTO NO PERFIL DE UMA EMPRESA QUANTO NA BUSCA DE SERVIÇOS, CLICAR EM UM SERVIÇO PARA VER SEUS DETALHES

//**corresponde a pág consultarservico.php no outro arquivo **//

$cd_servico = $_GET['cd_servico'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

// SELECIONANDO AS INFORMAÇÕES DA TB_SERVICO QUE QUERO EXIBIR NA TELA DETALHES
$query = "SELECT * FROM tb_servico WHERE cd_servico = '$cd_servico'";
//estou usando $cd_servico para selecionar um serviço específico da empresa, ou seja, o serviço em que o cliente vai clicar

$result_query = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));
$row = mysqli_fetch_assoc($result_query);

// SELECIONANDO AS INFORMAÇÕES DA TB_EMPRESA QUE QUERO EXIBIR NA TELA DETALHES

if(mysqli_num_rows($result_query) > 0){

  $query2 = "SELECT * FROM tb_empresa WHERE cd_empresa = '" . $row['cd_empresa'] . "'";
  //$row['cd_empresa'] -> está buscando, através da FK cd_empresa presente na tb_servico, as informações da empresa de acordo com o serviço selecionado (nesse caso, só estamos usando o nome da empresa 'nm_fantasia')

  $result_query2 = mysqli_query($conn, $query2) or die(' Erro na query:' . $query2 . ' ' . mysqli_error($conn));
  $row2 = mysqli_fetch_assoc($result_query2);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detalhesPacote.css">
    <title>Detalhes do Pacote - Eventalize</title>
    <link rel="icon" href="imgCriandoServico/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">

</head>

<body>
  <header>
    <div class="logo">
        <img src="imgCriandoServico/logo.svg" alt="logo">
    </div>
        <div class="headerInicioCliente">
            <a href="">Início</a>
            <a href="">Feed</a>
            <a href="">Pedidos</a>
            <a href="">Mensagens</a>
        </div>
        <div class="headerPesquisa">
          <input type="text" placeholder="Procure Serviços">
          <img src="imgCriandoServico/lupa.svg" alt="" width="30px">
        </div>
        <div  class="headerClientePerfil" >
            <div class="iconCliente">
                <a href="#"><img src="imgCriandoServico/icon-carrinho.svg" alt="Carrinho"></a>
                <a href="#"><img src="imgCriandoServico/icon-notificacao.svg" alt="Notificações"></a>
              </div>

        </div>
        <section class="menuPerfil">
          <a href="">Perfil</a>
          <a href="">Postagens</a>
          <a href="">Configurações</a>
          <a href="">Sair</a>
      </section>
      <button class="menuIcon2" onclick="menuOpenPerfil()"><img  src="imgCriandoServico/vector2.svg" style="height: 50px;" width="30px"></button>
      <div class="headerMenuCliente">
        <a href="">Início</a>
        <a href="">Feed</a>
        <a href="">Pedidos</a>
        <a href="">Perfil</a>
        <a href="">Postagens</a>
        <a href="">Configurações</a>
        <a href="">Sair</a>
    </div>
    <button class="menuIcon3" onclick="menuOpenCliente()"><img  src="imgCriandoServico/vector.svg" style="height: 50px;" width="30px"></button>
  </header>

    <div class="bordaPrincipal">
      <div class="grid-setaPacotes">
        <svg id="svg-setaEsquerda" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
          <h2 id="palavraPacote" class="corLilas">Serviços</h2>
      </div>
      <form action="detalhes.php">
    <div class="grid-detalhesPacote">
        <div class="grid-detalhePacCol1">
          <!-- Slideshow container -->
              <div class="slideshow-container">

              <!-- Full-width images with number and caption text -->
              <div class="mySlides fade">
                <img class="img-fotoPacote" src="imgDetalheServico/fotoPacoteServico.jpg" alt="" style="width: 100%">
              </div>

              <div class="mySlides fade">
                <img class="img-fotoPacote" src="imgDetalheServico/cao.png" alt="" style="width: 100%">
              </div>

              <div class="mySlides fade">
                <img class="img-fotoPacote" src="imgDetalheServico/fotoPacoteServico.jpg" alt="" style="width: 100%">
              </div>

              <!-- Next and previous buttons -->
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>
              </div>
              <br>

              <!-- The dots/circles -->
              <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span>
              <span class="dot" onclick="currentSlide(2)"></span>
              <span class="dot" onclick="currentSlide(3)"></span>
              </div>

              <div>
                <!-- <button class="btn-Rosa" id="btn-personalizaPacote">Personalizar Serviço</button> -->
              </div>
        </div>

        <div class="grid-detalhePacCol2">

            <input type="hidden" value=<?php echo($cd_servico);?> name="cd_servico">
            <h3 id="nomePacote" name="nm_servico"><?php echo($row['nm_servico']) ?></h3>
            <div class="grid-alinhaAvalia">
                <svg id="svg-Estrela" class="corRosa" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                  </svg>
                  <h5 id="txtAvalia">4,5</h5>
            </div>

              <div class="grid-alinhaPerfil">
                <img class="img-fotoPerfil" src="imgDetalheServico/fotoPerfil.jpg" alt="">
                <h6><?php echo($row2['nm_fantasia'])?></h6>
                <!-- <div class="alinha-text-perfil">
                      <img src="imagens/fotografia.svg" alt="">
                    <h6>Fotógrafo</h6>
                  </div> -->
               </div>

                  <div class="descPacote">
                    <h3><?php echo($row['ds_servico']) ?></h3>
                  </div>
                  <!-- <div class="infoPacote">
                      <ul class="listaStyle">
                        <li id="infoDetalhePacote" class="corRosa">Informações:</li>
                        <li>50 fotos;</li>
                        <li>Tamanho: 21x21;</li>
                        <li>Capa dura.</li>
                      </ul>
                  </div> -->
    
        </div>
        <div class="grid-detalhePacCol3">
            <div class="align-pagamento">
              <div class="grid-infoPag">
                <h2 id="precoPacote" class="corLilas"><?php echo($row["vl_servico"]) ?></h2>
              </div>
                <div class="parcelas">
                <h5>em até 3x sem juros</h5>
              </div>
              
              <div class="FormasdePag">
                <h4>Formas de pagamento</h4>
                <img src="imgDetalheServico/formasPagamento.png" alt="">
              </div>
                
            </div>
            <div class="align-formasPag">
                <svg class="svg-pagamento svg-pagamentoCol1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                    <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                  </svg> 
                  <h5 class="nomeTipoPag">Cartão de crédito</h5>
                  <svg class="svg-Pagamento svg-pagamentoCol2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                    <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                  </svg>
                  <h5 class="nomeTipoPag">Cartão de débito</h5>
                  <svg class="svg-pagamento svg-pagamentoCol3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                    <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                  </svg>
                  <h5 class="nomeTipoPag">Pix</h5>
            </div>
              <button class="btn-Rosa" id="btn-compraDetalhe">Comprar</button>
        </div>
    </div>
    </div>
    </form>
    <script src="js/menucliente.js"></script>
    <script src="js/detalhesPacote.js"></script>
</body>
</html>


