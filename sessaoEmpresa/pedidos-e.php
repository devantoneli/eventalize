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
    <div class="acessoRapido">
        <a href="#novosPedidos"><h3 id="roxo">Novos Pedidos</h3></a>
        <a href="#emAndamento"><h3 id="rosa">Em andamento</h3></a>
        <a href="#Outros"><h3 id="azul">Outros</h3></a>
    </div>
    <section class="novosPedidos" id="novosPedidos">
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

    <section class="pedidosAndamento" id="emAndamento">
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
                    <div id="iconCalendario">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    </div>
                    <div>
                        <h1>20/04/2023</h1>
                        <h3>Domingo, 15h</h3>
                    </div>
                </div>

                <div class="gridIcons">
                <!-- <div class="testePreco"> -->
                <h1>R$220,00</h1>
                <div class="iconsFuncPedidos">
                    <!-- INICIO ICON CHAT -->
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                </svg>  
                    <!-- FINAL ICON CHAT -->
                    
                    <!-- INICIO ICON MAIS -->
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                    </svg>
                <!-- FINAL ICON MAIS -->

                <!-- INICIO ICON CONTRATO -->
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                </svg>
                <!-- FINAL ICON CONTRATO -->

                <h3>Chat</h3>
                <h3>Mais</h3>
                <h3>Contr.</h3>
                </div>
                </div>
                <!-- </div> -->
            </div>

        </div>
        </div>
    </section>

    <section class="outros" id="Outros">
        <div class="blocoPedidos">
            <h1 id="txtPedidosOutros">Outros</h1>
            <div class="gridOutros">
                <h3>Cod.</h3>
                <h3>Pedido</h3>
                <h3>Valor</h3>
                <h3>Status final</h3>

                <div class="cardOutrosPedidos">
                <h3>548</h3>
                <h3>Pacote Festa de Aniversário e serviços avulsos</h3>
                <h3>R$ 450,00</h3>
                <h3 id="txtArquivado">Arquivado</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                </svg>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="js/menu-e.js"></script>
</body>
</html>