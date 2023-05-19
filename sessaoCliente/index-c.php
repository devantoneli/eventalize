<?php

if(!isset($_SESSION)){
    session_start();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/iniciocliente.css">
    <title>Início - Eventalize</title>
</head>
<body>
    <div class="grid-container">
  <div class="header">
    <div class="logo">
        <img src="logoBranca.png" alt="">
    </div>
    <div class="menu">
        <a href="">Início</a>
        <a href="">Feed</a>
        <a href="">Mensagens</a>
        <a href="">Seus Pedidos</a>
    </div>

    <div class="headerPesquisa">
          <input type="text" placeholder="Procure Serviços">
          <img src="lupa.svg" alt="" width="30px">
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
          <!-- <a href="" style="margin-bottom: 20%">Histórico de Compras</a> -->
          <a href="">Configurações</a>
          <a href="">Sair</a>
      </section>
</div>
</div>

<div class="carousel">
    <div class="carousel-slides">
        <div class="slide">
            <div class="divInicio">
                <div class="textoInicio">
                    <h1>Ayla Decorações</h1>
                    <p>@decoration</p>
                    <img src="../bancoImagens/clientes/decoracaoouro.svg" alt="">
                    <h4>Decorações para o seu casamento, festa infantil e muito mais!</h4>
                </div>
                <img src="../bancoImagens/clientes/logoEmpresa.jpg" alt="">
                <button>Visitar Perfil</button>
            </div>
        </div>
        <div class="slide">
            <div class="divInicio">
                <div class="textoInicio">
                    <h1>Ayla Decorações</h1>
                    <p>@decoration</p>
                    <img src="../bancoImagens/clientes/decoracaoouro.svg" alt="">
                    <h4>Decorações para o seu casamento, festa infantil e muito mais!</h4>
                </div>
                <img src="../bancoImagens/clientes/logoEmpresa.jpg" alt="">
                <button>Visitar Perfil</button>
            </div>
        </div>
        <div class="slide">
            <div class="divInicio">
                <div class="textoInicio">
                    <h1>Ayla Decorações</h1>
                    <p>@decoration</p>
                    <img src="../bancoImagens/clientes/decoracaoouro.svg" alt="">
                    <h4>Decorações para o seu casamento, festa infantil e muito mais!</h4>
                </div>
                <img src="../bancoImagens/clientes/logoEmpresa.jpg" alt="">
                <button>Visitar Perfil</button>
            </div>
        </div>
    </div>
</div>

  <!-- <div class="carousel">
    <div class="carousel-slides">
      <div class="slide">
        <div class="divInicio">
          <div class="textoInicio">
            <h1 class="slide-title">Ayla Decorações</h1>
            <p class="slide-description">@decoration</p>
            <img class="slide-image" src="decoracaoouro.svg" alt="Decoração Ouro">
            <h4 class="slide-caption">Decorações para o seu casamento, festa infantil e muito mais!</h4>
          </div>
          <img class="slide-logo" src="logoEmpresa.jpg" alt="Logo da Empresa">
          <button class="slide-button">Visitar Perfil</button>
        </div>
      </div>
      <div class="slide">
        <div class="divInicio">
            <div class="textoInicio">
              <h1 class="slide-title">Ayla Decorações</h1>
              <p class="slide-description">@decoration</p>
              <img class="slide-image" src="decoracaoouro.svg" alt="Decoração Ouro">
              <h4 class="slide-caption">Decorações para o seu casamento, festa infantil e muito mais!</h4>
            </div>
            <img class="slide-logo" src="logoEmpresa.jpg" alt="Logo da Empresa">
            <button class="slide-button">Visitar Perfil</button>
          </div>
      </div>
      <div class="slide"></div>
    </div>
  </div> -->
  
  

<!-- <div class="divInicio">
    <div class="textoInicio">
      <h1>Ayla Decorações</h1>
      <p>@decoration</p>
      <img src="decoracaoouro.svg" alt="">
      <h4>Decorações para o seu casamento, festa infantil e muito mais!</h4>
    </div>
    <img src="logoEmpresa.jpg" alt="">
    <button>Visitar Perfil</button>
</div> -->

<div class="categorias">
    <h1>Navegue por categorias</h1>
</div>

<div class="iconsCategorias">
    <img src="../img/index/auxiliar.svg" alt="auxiliar" title="auxiliar">
    <img src="../img/index/atracao.svg" alt="atracao" title="atração">
    <img src="../img/index/comida.svg" alt="comida" title="comida">
    <img src="../img/index/decoracao.svg" alt="decoracao" title="decoração">
    <img src="../img/index/equipamento.svg" alt="equipamento" title="equipamento">
    <img src="../img/index/espaco.svg" alt="espaco" title="espaço">
    <img src="../img/index/fotografia.svg" alt="fotografia" title="fotografia">
    <img src="../img/index/musica.svg" alt="musica" title="música">
</div>

<div class="categorias">
    <h1>Postagens da semana</h1>
</div>

<div class="grid">
    <div class="gridPostagens">
        <div class="imgPostagens">
            <!-- <img src="post2.jpg" alt=""> -->
            <img src="../bancoImagens/clientes/post1.jpg" alt="">
            <img src="../bancoImagens/clientes/post3.jpg" alt="">
            <img src="../bancoImagens/clientes/post4.jpg" alt="">
            <img src="../bancoImagens/clientes/post5.jpg" alt="">
            <img src="../bancoImagens/clientes/post6.jpg" alt="">
            <img src="../bancoImagens/clientes/post5.jpg" alt="">
        </div>
    </div>
</div>

<div class="categorias">
    <h1>Conheça a classificação de Empresas</h1>
</div>

<div class="classificacaoEmpresa">
    <img src="../bancoImagens/clientes/ouro.svg" alt="">
    <img src="../bancoImagens/clientes/prata.svg" alt="">
    <img src="../bancoImagens/clientes/bronze.svg" alt="">
</div>

<div class="textoClassificacao">
    <h1>Empresa Ouro</h1>
    <h1>Empresa Prata</h1>
    <h1>Empresa Bronze</h1>
</div>

<div class="descClassificacao">
    <ul>
        <li>Empresa ativa</li>
        <li>Avaliação a partir de 4,5</p></li>
        <li>+ 100 dias de tempo na Eventalize</li>
        <li>+ 30 prestações de serviços no mês</li>
        <li>+ 200 serviços vendidos</li>
    </ul>

    <ul>
        <li>Empresa ativa</li>
        <li>Avaliação a partir de 4,5</p></li>
        <li>+ 100 dias de tempo na Eventalize</li>
        <li>+ 30 prestações de serviços no mês</li>
        <li>+ 200 serviços vendidos</li>
    </ul>

    <ul>
        <li>Empresa ativa</li>
        <li>Avaliação a partir de 4,5</p></li>
        <li>+ 100 dias de tempo na Eventalize</li>
        <li>+ 30 prestações de serviços no mês</li>
        <li>+ 200 serviços vendidos</li>
    </ul>
</div>

<!-- <div class="cardServico">
    <div class="imgServico">
        <img src="bolo.svg" alt="">
    </div>
    
    <p>lalala</p>
</div> -->










    <script src="menuCliente.js"></script>
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