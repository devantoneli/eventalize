<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/iniciocliente.css">
    <link rel="icon" href="../img/index/logo.png">
    <title>Início - Eventalize</title>
</head>
<body>

<!-- INICIO MENU -->
    <div class="grid-container">
        <div class="header">
            <div class="logo">
            <img src="../img/icones/logoBranca.svg" alt="">
            </div>
            <div class="menu">
                <a href="">Início</a>
                <a href="../sessaoUsuario/explore.php">Feed</a>
                <a href="chatCliente.php">Mensagens</a>
                <a href="">Seus Pedidos</a>
            </div>

            <div class="headerPesquisa">
                <form action="index-c.php" method="get">
                <input type="text" style="padding: 2.5%;" placeholder="Procure Serviços" name="nm_tiposervico">
                <button>
                    <img src="../img/icones/icon-lupa.svg" alt="" width="30px">
                </button>
                </form>
            </div>
            <div class="headerClientePerfil" >
                <!-- <div class="iconCliente"> -->
                <a href="#" class="carrinho"><img src="../img/icones/icon-carrinho.svg" alt="Carrinho"></a>
                <a href="#" class ="notificacao"><img src="../img/icones/icon-notificacao.svg" alt="Notificações"></a>
                <!-- </div> -->
                <button class="menuIcon2" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
            </div>
            <section class="menuPerfil">
                <a href="">Perfil</a>
                <a href="">Postagens</a>
                <!-- <a href="" style="margin-bottom: 20%">Histórico de Compras</a> -->
                <a href="">Configurações</a>
                <a href="../logout.php">Sair</a>
            </section>
        </div>
    </div>
<!-- FIM MENU -->


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
    <h1>Empresas com Melhor Avaliação</h1>
</div>

<div class="gridAvaliacao">
    <div class="empresasAvaliacao">
        <!-- <div class="perfilFoto"> -->
        <img src="../bancoImagens/clientes/logoEmpresaAvaliacao.jpg" alt="">
            <!-- <div class="cardTexto"> -->
            <div class="textoEmpresa">
                <h1>Casa Noturna •</h1>
            </div>
            <div class="infoAvaliacao">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
                <!-- <img src="../bancoImagens/clientes/estrelaAvaliacao.svg" alt=""> -->
                <p class="tamAvaliacao">4,8</p>
            </div>
            <button class="botaoSeguir">Seguir</button>
            <!-- </div> -->
        <!-- </div> -->
    </div>

    <div class="empresasAvaliacao">
        <img src="../bancoImagens/clientes/logoEmpresaAvaliacao.jpg" alt="">
            <div class="textoEmpresa">
                <h1>Casa Noturna •</h1>
            </div>
            <div class="infoAvaliacao">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
                <!-- <img src="../bancoImagens/clientes/estrelaAvaliacao.svg" alt=""> -->
                <p class="tamAvaliacao">4,8</p>
            </div>
        <button class="botaoSeguir">Seguir</button>
    </div>
</div>

<div class="gridAvaliacao">
    <div class="empresasAvaliacao">
        <img src="../bancoImagens/clientes/logoEmpresaAvaliacao.jpg" alt="">
            <div class="textoEmpresa">
                <h1>Casa Noturna •</h1>
            </div>
            <div class="infoAvaliacao">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
                <!-- <img src="../bancoImagens/clientes/estrelaAvaliacao.svg" alt=""> -->
                <p class="tamAvaliacao">4,8</p>
            </div>
        <button class="botaoSeguir">Seguir</button>
    </div>

    <div class="empresasAvaliacao">
        <img src="../bancoImagens/clientes/logoEmpresaAvaliacao.jpg" alt="">
            <div class="textoEmpresa">
                <h1>Casa Noturna •</h1>
            </div>
            <div class="infoAvaliacao">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
                <!-- <img src="../bancoImagens/clientes/estrelaAvaliacao.svg" alt=""> -->
                <p class="tamAvaliacao">4,8</p>
            </div>
        <button class="botaoSeguir">Seguir</button>
    </div>
</div>
<!-- 
<div class="gridAvaliacao">
    <div class="empresasAvaliacao">
        <img src="../bancoImagens/clientes/logoEmpresaAvaliacao.jpg" alt="">
            <div class="textoEmpresa">
                <h1>Casa Noturna •</h1>
            </div>
            <div class="infoAvaliacao">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
                <img src="../bancoImagens/clientes/estrelaAvaliacao.svg" alt="">
                <p class="tamAvaliacao">4,8</p>
            </div>
        <button class="botaoSeguir">Seguir</button>
    </div>

    <div class="empresasAvaliacao">
        <img src="../bancoImagens/clientes/logoEmpresaAvaliacao.jpg" alt="">
            <div class="textoEmpresa">
                <h1>Casa Noturna •</h1>
            </div>
            <div class="infoAvaliacao">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
                <img src="../bancoImagens/clientes/estrelaAvaliacao.svg" alt="">
                <p class="tamAvaliacao">4,8</p>
            </div>
        <button class="botaoSeguir">Seguir</button>
    </div>
</div> -->

<div class="categorias">
    <h1>Esses pacotes estão bombando!</h1>
</div>

<div class="gridPacote">
    <div class="cardPacotes">
        <div class="imagemPacote">
            <img src="" alt="">
        </div>
        
        <div class="textoPacote">
            <h2>Casa de Festa</h2>
            <div class="descPacote">
                <h4>Espaço para alugar</h4>
            </div>
            <div class="percoPacote">
                <h5>R$ 1500,00</h5>
            </div>
            <button class="botaoPacote">Ver mais</button>
        </div>
    </div>

    <div class="cardPacotes">
        <div class="imagemPacote">
            <img src="" alt="">
        </div>
        
        <div class="textoPacote">
            <h2>Casa de Festa</h2>
            <div class="descPacote">
                <h4>Espaço para alugar</h4>
            </div>
            <div class="percoPacote">
                <h5>R$ 1500,00</h5>
            </div>
            <button class="botaoPacote">Ver mais</button>
        </div>
    </div>

    <div class="cardPacotes">
        <div class="imagemPacote">
            <img src="" alt="">
        </div>
        
        <div class="textoPacote">
            <h2>Casa de Festa</h2>
            <div class="descPacote">
                <h4>Espaço para alugar</h4>
            </div>
            <div class="percoPacote">
                <h5>R$ 1500,00</h5>
            </div>
            <button class="botaoPacote">Ver mais</button>
        </div>
    </div>

    <div class="cardPacotes">
        <div class="imagemPacote">
            <img src="" alt="">
        </div>
        
        <div class="textoPacote">
            <h2>Casa de Festa</h2>
            <div class="descPacote">
                <h4>Espaço para alugar</h4>
            </div>
            <div class="percoPacote">
                <h5>R$ 1500,00</h5>
            </div>
            <button class="botaoPacote">Ver mais</button>
        </div>
    </div>
</div>
    <!-- <div class="empresasAvaliacao"></div>
    <div class="empresasAvaliacao"></div> -->


 <!-- <img class="imgEmpresa"></img> -->
        <!-- <img src="../bancoImagens/clientes/logoEmpresa.jpg" alt=""> -->

<!-- <div class="cardServico">
    <div class="imgServico">
        <img src="bolo.svg" alt="">
    </div>
    
    <p>lalala</p>
</div> -->










    <script src="js/menu-c.js"></script>
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