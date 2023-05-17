<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/menu-e.css"/>
    <link rel="stylesheet" href="css/pedidos-e.css"/>
    <link rel="icon" href="../img/index/logo.png">
    <title>Pedidos - Eventalize</title>
</head>
    <!--INICIO MENU EMPRESA -->
    <div class="bg-gradPrincipal menuEmpresa">
        <header class="alinhaElementos">
            <div id="logoImagem"><a href="../sessaoEmpresa/index-e.php"></a></div>
            
            <ul class="opcoesMenu">
                <li class=""><a href="index-e.php" class="opcaoMenu" aria-current="page">Início</a></li>
                <li class="nav-item"><a href="#" class="opcaoMenu">Pedidos</a></li>
                <li class="nav-item"><a href="#" class="opcaoMenu">Suas postagens</a></li>
                <li class="nav-item"><a href="#" class="opcaoMenu">Mensagens</a></li>
            </ul>
        
            <div class="alinhaLogo">
                <button class="botaoSeta" id="iconSeta">
                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                </button>

                <section id="menu">
                <a href="criacaoServico-e.php"><h5>Criar Serviço ou Pacote</h5></a>
                <a href="selecaoPedido-e.php"><h5>Criar Postagens</h5></a>
                </section>

                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-bell-fill opcaoMenu" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>

                <div id="inserirPerfil">
                    <img src="<?php echo $_SESSION['url_fotoperfil'];?>" alt="">
                </div>

                <section id="menuPerfil">
                <a href="perfilEmpresa.php"><h5>Perfil</h5></a>
                <a href=""><h5>Pontuações</h5></a>
                <a href=""><h5>Postagens</h5></a>
                <a href=""><h5>Estatísticas de venda</h5></a>
                <a href=""><h5>Configurações</h5></a>
                <a href="../logout.php"><h5>Sair</h5></a>
            </section>
            </div>
        </header>
    </div>
<!--FIM MENU EMPRESA -->
<body>
    <section class="novosPedidos">
        <div class="blocoPedidos">
            <h2 id="txtNovosPedidos">Novos pedidos</h2>
            <div class="gridNovosPedidos">
                <h3>Cod.</h3>
                <h3>Cliente e local</h3>
                <h3>Pedido</h3>
                <h3>Valor</h3>
                <h3>Datado para</h3>
                <h3>Requerido em</h3>

                <div class="cardNvPedidos">
                <h3>548</h3>
                <h3>Larissa Silva <br> Rua Tal, nº 4 - Bairro São Vicente, SP</h3>
                <h3>Pacote Festa de Aniversário e serviços avulsos</h3>
                <h3>R$ 450,00</h3>
                <h3>15/02/2023 <br>10h</h3>
                <h3>20/01/2023 <br>13h24</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="pedidosAndamento">
        <div class="blocoPedidos">
        <h1 id="txtPedidosAndamento">Pedidos em andamento</h1>
        <div class="gridPedidosAndamento">
            <div id="cardPedido">
                <h2>Festa na piscina</h2>
                <ul>
                    <li>100 fotos</li>
                    <li>1 álbum</li>
                    <li>1 banner</li>
                </ul>
            </div>
            
            <div id="statusPedido">
                <h2>Ação pendente - Confirmar alteração de endereço</h2>
                <div class="gridPedidoInfo">
                <img src="../bancoImagens/postagens/fotodestaque.jpg" alt="">
                <div class="infoPedido">
                <h2>Marcos F.</h2>
                <h3>Rua Tal nº 6 - Bairro</h3>
                <h4>São Vicente - SP</h4>
                </div>
                <div class="dataPedido">
                    <h1>20/04/2023</h1>
                    <h3>Domingo, 15h</h3>
                </div>

                <div class="gridIcons">
                <!-- <div class="testePreco"> -->
                <h1>R$220,00</h1>
                <h2>dfdfd</h2>
                </div>
                <!-- </div> -->
            
            </div>

        </div>
        </div>
    </section>
</body>
</html>