<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- FRONT-END tela incial da empresa, redirecionada após passar pela validação de cadastro ou login -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo-e.css">
    <!-- <link rel="stylesheet" href="css/menu-e.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/index/logo.png">
    <title>Início Empresa - Eventalize</title>
</head>
<body>

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


<!-- CORPO  -->

        <div class="grid-BoasVindasEmp">
            <div id="perfilEmpresa">
                <img src="<?php echo $_SESSION['url_fotoperfil'];?>" alt="">
            </div>

            <div class="grid-LinhaTripla">
                <h1>Olá, <?php echo $_SESSION['nm_fantasia'];?></h1>
                <p>Aqui está o relatório da última semana: </p>
                <div class="grid-RelatRapid">
                    <div class="relatRapid">
                        <p>Segunda</p>
                        <p>03/04/23</p>

                        <p><a>+5</a> Serviços</p>
                        <p><a>+5</a> Clientes</p>
                        <p><a>+5</a> Serviço/cliente</p>
                    </div>
                    <div class="relatRapid">
                        <div class="relatRapid">
                            <p>Segunda</p>
                            <p>03/04/23</p>
    
                            <p><a>+5</a> Serviços</p>
                            <p><a>+5</a> Clientes</p>
                            <p><a>+5</a> Serviço/cliente</p>
                        </div>
                    </div>
                    <div class="relatRapid">
                        <div class="relatRapid">
                            <p>Segunda</p>
                            <p>03/04/23</p>
    
                            <p><a>+5</a> Serviços</p>
                            <p><a>+5</a> Clientes</p>
                            <p><a>+5</a> Serviço/cliente</p>
                        </div>
                    </div>
                    <div class="relatRapid">
                        <div class="relatRapid">
                            <p>Segunda</p>
                            <p>03/04/23</p>
    
                            <p><a>+5</a> Serviços</p>
                            <p><a>+5</a> Clientes</p>
                            <p><a>+5</a> Serviço/cliente</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        
        <div class="grid-CardsInicio">
            <div class="grid-LinhaDupla">
                <div class="card-novosPedidos">
                    <h2>Novos pedidos <div id="icon-novsPedids"></div></h2>

                    <div class="blocoRoxo">
                        <div class="novoPedido">
                            <div class="imgServico"></div>

                            <div class="imgCliente"></div>
                        </div>

                        <div class="novoPedido">
                            <div class="imgServico"></div>
                            
                            <div class="imgCliente"></div>
                        </div>
                        
                        <div class="novoPedido">
                            <div class="imgServico"></div>
                            
                            <div class="imgCliente"></div>
                        </div>
                        
                        <div class="novoPedido">
                            <div class="imgServico"></div>
                            
                            <div class="imgCliente"></div>
                        </div>
                    </div>
                </div>

                <div class="card-solicsOrcament">
                    <h2>Solicitações de orçamento <div id="icon-pedidsAndament"></div></h2>

                    <div class="blocoAzul">
                        <div class="card-orcamntSolic cidadMeio">
                            <p>Santos, SP</p>
                            
                            <div class="font-descSolic">
                            <li>• 200 fotos</li>
                            <li>• Ensaio plus</li>
                            <li>• 2 álbuns personalizados</li>
                            </div>
                            
                            <a href=""><button class="btn-abrirSolic"><a class="font-abrirSolic">...</a></button></a>
                        </div>

                        <div class="card-orcamntSolic cidadMeio">
                            <p>Santos, SP</p>
                            
                            <div class="font-descSolic">
                            <li>• 200 fotos</li>
                            <li>• Ensaio plus</li>
                            <li>• 2 álbuns personalizados</li>
                            </div>

                            <a href=""><button class="btn-abrirSolic"><a class="font-abrirSolic">...</a></button></a>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="card-pedidsAndament">
                <h2>Pedidos em andamento <div id="icon-pedidsAndament"></div></h2>

                <div class="blocoLaranja">
                    <div class="pedidAndament">
                        <a>Festa na Piscina</a>
                        <p>Marcos F.</p>

                        <div class="img-cliPedAndamnt"></div>

                        <svg class="acaoEmpresa" id="Camada_1" data-name="Camada 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 361.55 116.79" width="24vw" height="20vw">
                            <path class="cls-1" d="M361.55,116.79H71.95s46.53-56.56,144.48-56.56,145.13,56.56,145.13,56.56Z"/>
                        </svg>

                        <div class="font-acaoPendent"><a>Ação pendente</a></div>

                        <div class="andamento"><div class="barraProgresso"></div>
                        </div>
                    </div>

                    <div class="pedidAndament">
                        <a>Festa na Piscina</a>
                        <p>Marcos F.</p>

                        <div class="img-cliPedAndamnt"></div>

                        <svg class="acaoEmpresa" id="Camada_1" data-name="Camada 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 361.55 116.79" width="24vw" height="20vw">
                            <path class="cls-1" d="M361.55,116.79H71.95s46.53-56.56,144.48-56.56,145.13,56.56,145.13,56.56Z"/>
                        </svg>

                        <div class="font-acaoPendent"><a>Ação pendente</a></div>

                        <div class="andamento"><div class="barraProgresso"></div>
                        </div>
                    </div>

                    <div class="pedidAndament">
                        <a>Festa na Piscina</a>
                        <p>Marcos F.</p>

                        <div class="img-cliPedAndamnt"></div>

                        <svg class="acaoEmpresa" id="Camada_1" data-name="Camada 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 361.55 116.79" width="24vw" height="20vw">
                            <path class="cls-1" d="M361.55,116.79H71.95s46.53-56.56,144.48-56.56,145.13,56.56,145.13,56.56Z"/>
                        </svg>

                        <div class="font-acaoPendent"><a>Ação pendente</a></div>

                        <div class="andamento"><div class="barraProgresso"></div>
                        </div>
                    </div>

                    <div class="pedidAndament">
                        <a>Festa na Piscina</a>
                        <p>Marcos F.</p>

                        <div class="img-cliPedAndamnt"></div>

                        <svg class="acaoEmpresa" id="Camada_1" data-name="Camada 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 361.55 116.79" width="24vw" height="20vw">
                            <path class="cls-1" d="M361.55,116.79H71.95s46.53-56.56,144.48-56.56,145.13,56.56,145.13,56.56Z"/>
                        </svg>

                        <div class="font-acaoPendent"><a>Ação pendente</a></div>

                        <div class="andamento"><div class="barraProgresso"></div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <script src="js/menu-e.js"></script>
</body>
</html>