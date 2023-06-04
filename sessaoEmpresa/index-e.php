<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

    $cd_empresa = $_SESSION['cd_empresa'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "db_eventalize";

    $conn = new mysqli($servername, $username, $password, $db_name);

    if($conn->connect_error){
        die("Falha na conexão: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM vwpedidos WHERE cd_empresa = $cd_empresa AND nm_status<>'finalizado'";
    $result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));
    $row = mysqli_fetch_assoc($result_query);

    
    $result_query2 = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));
    $row2 = mysqli_fetch_assoc($result_query2);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- FRONT-END tela incial da empresa, redirecionada após passar pela validação de cadastro ou login -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo-e.css">
    <link rel="stylesheet" href="css/menu-e.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/index/logo.png">
    <title>Início Empresa - Eventalize</title>
</head>
<body>

<!--INICIO MENU EMPRESA -->
    <div class="bg-gradPrincipal menuEmpresa">
        <header class="alinhaElementos">
        <a href="index-e.php"><div id="logoImagem"></div></a>
            
            <ul class="opcoesMenu">
                <li class=""><a href="index-e.php" class="opcaoMenu" aria-current="page">Início</a></li>
                <li class="nav-item"><a href="pedidos-e.php" class="opcaoMenu">Pedidos</a></li>
                <li class="nav-item"><a href="perfilEmpresa.php" class="opcaoMenu">Suas postagens</a></li>
                <li class="nav-item"><a href="chatEmpresa.php" class="opcaoMenu">Mensagens</a></li>
            </ul>
        
            <div class="alinhaLogo">
                <button class="botaoSeta" id="iconSeta">
                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                </button>

                <section id="menu">
                <a href="criacaoServico-e.php"><h5>Criar Serviço</h5></a>
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
                <!-- <a href=""><h5>Pontuações</h5></a>
                <a href=""><h5>Postagens</h5></a>
                <a href=""><h5>Estatísticas de venda</h5></a> -->
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
                <p>O que deseja fazer? </p>
                <div class="grid-RelatRapid">
                    <div class="relatRapid">
                        
                    </div>
                    <div class="relatRapid">
                        <div class="relatRapid" style="background-color: #968EC7 !important;">
                            
                        </div>
                    </div>
                    <div class="relatRapid">
                        <div class="relatRapid" style="background-color: #FF3E83 !important;">
                            
                        </div>
                    </div>
                    <div class="relatRapid">
                        <div class="relatRapid" style="background-color: #FFA856 !important;">
                            
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
                <?php
                    if(mysqli_num_rows($result_query2) > 0){
                        while($row2 = mysqli_fetch_assoc($result_query2)){
                
                            ?>
                        <div class="novoPedido">
                            <div class="imgServico" style="<?php if($row['url_imgcapa']="NULL"){echo("background: blue;");} else{?>background-image: url('<?php echo($row["url_imgcapa"]);} ?>'); <?php ?>"></div>
                            <!-- echo($row['url_fotoperfil']) -->
                            <div class="imgCliente" style="background-image: url('')"></div>
                        </div>
                        <?php
                        }
                    }else{
                        echo "<h1 style='font-weight: 100;width: 150%;'>Nenhum pedido novo</h1>";
                    }    
                ?>           
                    </div>
                </div>
            </div>

            

            <div class="card-pedidsAndament">
                <h2>Pedidos em andamento <div id="icon-pedidsAndament"></div></h2>

                <div class="blocoLaranja">
                    <?php 
                    if(mysqli_num_rows($result_query) > 0){
                        while($row = mysqli_fetch_assoc($result_query)){

                            ?>
                            <div class="pedidAndament" style="background-image: url('<?php echo($row['url_imgcapa']); ?>')">

                        <?php
                            echo 
                            '
                            <a>'.$row['nm_servico'].'</a>
                            <p>'.$row['nm_cliente'].'</p>';
                            if($row['url_fotoperfil']==''){
                            ?>
                            <div class="img-cliPedAndamnt" style="background-image: url('https://as1.ftcdn.net/v2/jpg/05/60/26/08/1000_F_560260880_O1V3Qm2cNO5HWjN66mBh2NrlPHNHOUxW.jpg');"></div>
                            <?php
                            }else {
                            ?>
                            <div class="img-cliPedAndamnt" style="background-image: url('<?php echo($row['url_fotoperfil']); ?>');"></div>
                            <?php 
                            }

                            if($row['nm_status'] == 'Elaboração do serviço em processo' || $row['nm_status'] == 'Execução do serviço em processo' || $row['nm_status'] == 'Aguardando data agendada'){
                                ?>
                                <svg style="transform: translate(-0.5em, -9.2em);" class="acaoEmpresa" id="Camada_1" data-name="Camada 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 361.55 116.79" width="24vw" height="20vw">
                                <path class="cls-1" d="M361.55,116.79H71.95s46.53-56.56,144.48-56.56,145.13,56.56,145.13,56.56Z"/>
                                </svg>
                                <?php
                            }else{
                                ?>
                                <svg class="acaoEmpresa" id="Camada_1" data-name="Camada 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 361.55 116.79" width="24vw" height="20vw">
                                <path class="cls-1" d="M361.55,116.79H71.95s46.53-56.56,144.48-56.56,145.13,56.56,145.13,56.56Z"/>
                                </svg>
                                <?php
                            }
                            
                            
                            
    
                            echo'<div class="font-acaoPendent"><a>'.$row['nm_status'].'</a></div>
    
                            <div class="andamento"><div class="barraProgresso"></div>
                            </div>
                        </div>';
                    
                        }
                    }else{
                        echo "Nenhum pedido em andamento";
                    }
                    
                    
                    ?>

                    


            
                </div>

        </div>
    </div>
    <script src="js/menu-e.js"></script>
</body>
</html>