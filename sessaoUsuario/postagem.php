<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/postagem.css">
    <link rel="icon" href="../img/icones/logo.png">
    <title>Postagem Empresa</title>
</head> -->

<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_eventalize";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Não foi possível conectar ao banco de dados: " . $conn->connect_error);
    }

    // $cd_postagem = $_GET ['cd_postagem'];
    //SELECT nm_postagem, ds_postagem, url_imgcapa, url_img2, url_img3 FROM tb_postagem WHERE cd_postagem = $cd_postagem; (pra quando o da raiza estiver pronto)
    $sql = 'SELECT nm_postagem, ds_postagem, url_imgcapa, url_img2, url_img3 FROM tb_postagem WHERE cd_postagem = 4';
    //SELECT PARA PEGAR AS INFORMAÇÕES DE EMPRESA
    $sql2 = 'SELECT e.nm_fantasia FROM tb_empresa as e JOIN tb_postagem as p ON e.cd_empresa = p.cd_empresa WHERE p.cd_postagem = 4';
    $result2 = $conn->query($sql2);
    $row2 = $result2 -> fetch_assoc();
    // $empresa = $result2->fetch(PDO::FETCH_ASSOC);
    //SELECT vwcodigospostagem WHERE cd_postagem = $cd_postagem; (pra quando o da raiza estiver pronto)
    $sql3 = 'SELECT * FROM vwcodigospostagem WHERE cd_postagem = 4';
    $result = $conn->query($sql);

    // $sql4= "SELECT * FROM tb_pacote WHERE cd_pacote = ".$row3['cd_pacote'] ." ";
    // $result4 = $coon->query($sql3);
    // $row3 = $result3 -> fetch_assoc(); trecho pra dar inicio a logica dos detalhes do pacote
 
        if ($result -> num_rows > 0){
                while ($row = $result -> fetch_assoc()){
            echo '
            <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/postagem.css">
    <link rel="icon" href="../img/icones/logo.png">
    <title>Postagem Empresa</title>
    </head>
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
                        <img src='.$row["url_imgcapa"].' alt="">
                    </div>
                    <div class="fotoLateral">
                        <img src='.$row["url_img2"].' alt="">
                        <img src='.$row["url_img3"].' alt="">
                    </div>
                    <div class="dataPostagem">
                        <h3>postado em 14 de fevereiro de 2023, às 11h20</h3>
                    </div>
            
                    <div class="tituloPostagem">
                        <h3>'.$row["nm_postagem"].'</h3>
                    </div>
            
                    <div class="descricaoTituloPostagem">
                        <h3>'.$row["ds_postagem"].'</h3>
                    </div>
            
            
            
                    <div class="iconEmpresa">
                        <img src="../bancoImagens/empresas/fotoempresa.jpg" alt="">
                        <div class="nomeEmpresa">
                        <h3>'.$row2["nm_fantasia"].'</h3>
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
                    
            
                <div class="slides-container">
                    <!-- slides -->
                    <div class="slide" data-slide>
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
            
                    
                </div>
                    <div class="slide" data-slide>
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
            
                    
                </div>
                    <div class="slide" data-slide>
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
            
                   
                </div>
                    <div class="slide" data-slide>
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
            
                   
                </div>
                 </div>   
                <button class="seta-esquerda" data-button="previous">&#8249;</button>
                <button class="seta-direita" data-button="next">&#8250;</button>

                <button class="botaoDetalhes">Mais detalhes</button>
            
                    <div class="identificaPersonalizacao">
                        <h3><img src="../img/icones/icon-personaliza-detalhes.png" alt=""> Personalizado pelo Cliente</h3>
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
            <script src="../sessaoUsuario/js/carousel.js"></script>
            
            </body>';
            }
        }
    

?>




<!-- </html> -->