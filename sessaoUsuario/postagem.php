<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="css/postagem.css">
    <link rel="icon" href="../img/icones/logo.png">
    <title>Postagem Empresa</title>
</head>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";
// $cd_postagem = $_GET['cd_postagem'];
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Não foi possível conectar ao banco de dados: " . $conn->connect_error);
    }

    $cd_postagem = $_GET ['cd_postagem'];
    // $sql = 'SELECT nm_postagem, ds_postagem, url_imgcapa, url_img2, url_img3 FROM tb_postagem WHERE cd_postagem = '.$cd_postagem.''; //(pra quando o da raiza estiver pronto)
    $sql = 'SELECT nm_postagem, ds_postagem, url_imgcapa, url_img2, url_img3 FROM tb_postagem WHERE cd_postagem = 19';
    $result = $conn->query($sql);
    //SELECT PARA PEGAR AS INFORMAÇÕES DE EMPRESA
    // $sql2 = 'SELECT e.nm_fantasia FROM tb_empresa as e JOIN tb_postagem as p ON e.cd_empresa = p.cd_empresa WHERE p.cd_postagem = '.$cd_postagem.'';
    $sql2 = 'SELECT e.nm_fantasia FROM tb_empresa as e JOIN tb_postagem as p ON e.cd_empresa = p.cd_empresa WHERE p.cd_postagem = 19';
    $result2 = $conn->query($sql2);
    $row2 = $result2 -> fetch_assoc();
    // $empresa = $result2->fetch(PDO::FETCH_ASSOC);
    // $sql3 = 'SELECT vwcodigospostagem WHERE cd_postagem = '.$cd_postagem.''; //(pra quando o da raiza estiver pronto)
    $sql3 = 'SELECT * FROM vwcodigospostagem WHERE cd_postagem = 45';
    $result3 = $conn->query($sql3);

    // $sql4= "SELECT * FROM tb_pacote WHERE cd_pacote = ".$row3['cd_pacote'] ." ";
    // $result4 = $coon->query($sql3);
    // $row3 = $result3 -> fetch_assoc(); trecho pra dar inicio a logica dos detalhes do pacote

    
 
        if ($result -> num_rows > 0){
                while ($row = $result -> fetch_assoc()){
                    $capa_img = getimagesize($row["url_imgcapa"]);
                    $info_imagem = getimagesize($row["url_img2"]. $row["url_img3"] );
                    $largura = 100; 
                    $altura = 100;
                    $largura_capa = 100;
                    $altura_capa = 100;
                    


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
                <header>
                    <div class="logoHome">
                        <img src="../img/index/logo.png" alt="logo">
                    </div>
                        <div class="headerHome">
                            <a href="">Início</a>
                            <a href="../sessaoUsuario/explore.php">Explore</a>
                            <a href="">Sobre Nós</a>
                        </div>
                        <div class="headerHomePerfil">
                            <button class="estiloVazio" id="entrarHome" onclick="novaSection(1)"><a href="../login.php">Entrar</a></button>
                            <button class="estiloVazio" id="entrarHome" onclick="novaSection(0)"><a href="../login.php">Cadastrar</a></button>
                        </div>
                        <button class="menuIcon" onclick="menuOpen()"><img  src="../img/index/menuicon.svg" width="30px"></button>
                </header>

                <div class="grid-container"> <!--DIV QUE CARREGA O LAYOUT GRID DA PÁGINA TODA-->
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
                        <img src='.$row["url_imgcapa"].' " style="width:'.$largura_capa.'%;height:'.$altura_capa.'%;">
                    </div>
                    <div class="fotoLateral">
                    <img src="'.$row["url_img2"].'" style="width:'.$largura.'%;height:'.$altura.'%;">
                    <img src="'.$row["url_img3"].'" style="width:'.$largura.'%;height:'.$altura.'%;">
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
                </div>';
                
                if (mysqli_num_rows($result3) > 0){
                    while($row3 = $result3 -> fetch_assoc()){
                        $pacote = $row3['cd_pacote'];
                        $sql4 = "SELECT * FROM tb_pacote WHERE cd_pacote = $pacote";
                        $result4 = $conn->query($sql4);
                    }
                    if (mysqli_num_rows($result4) > 0){
                        while ($row4 = $result4 -> fetch_assoc()) {
                            $capa_img_pacote = getimagesize($row4["url_imgcapa"]);
                            $info_imagem_pacote = getimagesize($row4["url_img2"]. $row4["url_img3"] );
                            $largura_capa_pacote = 100;
                            $altura_capa_pacote = 100;
                            $largura_pacote = 100; 
                            $altura_pacote = 100;
                        // aqui vem o carrosel da pa 
                        echo' <!-- INICIO EXIBIÇÕES DE PACOTES -->
                <div class="infoDescricao">
                    <h3>Esta postagem contém o pacote</h3>
                </div>
                <div class="inicioInfoPostagem">
                <div class="quadroPacote">
                    
            
                <div class="slides-container">
                    <!-- slides -->
                    <div class="slide" data-slide>
                    <div class="tituloInfoPacote" >
                        <img src="../img/icones/icon-decoracao-detalhes-pacote.png" alt="">
                        <h3>'.$row4['nm_pacote'].'</h3>
                    </div>
                    <div class="fotoDestaquePacote">
                        <img src="'.$row4["url_imgcapa"].'" style="width:'.$largura_capa_pacote.'%;height:'.$altura_capa_pacote.'%;">
                    </div>
            
                    <div class="fotoLateralPacote">
                        <img src="'.$row4["url_img2"].'" style="width:'.$largura_pacote.'%;height:'.$altura_pacote.'%;">
                        <img src="'.$row4["url_img3"].'" style="width:'.$largura_pacote.'%;height:'.$altura_pacote.'%;">
                    </div>
            
                    <div class="descricaoInfoPacote">
                        <h3>'.$row4['ds_pacote'].'</h3>
                    </div>
                    
                    <div class="slide" data-slide>
                    <div class="tituloInfoPacote" >
                        <img src="../img/icones/icon-decoracao-detalhes-pacote.png" alt="">
                        <h3>'.$row4['nm_pacote'].'</h3>
                    </div>
                    <div class="fotoDestaquePacote">
                        <img src="'.$row4["url_imgcapa"].'" style="width:'.$largura_capa_pacote.'%;height:'.$altura_capa_pacote.'%;">
                    </div>
            
                    <div class="fotoLateralPacote">
                        <img src="'.$row4["url_img2"].'" style="width:'.$largura_pacote.'%;height:'.$altura_pacote.'%;">
                        <img src="'.$row4["url_img3"].'" style="width:'.$largura_pacote.'%;height:'.$altura_pacote.'%;">
                    </div>
            
                    <div class="descricaoInfoPacote">
                        <h3>'.$row4['ds_pacote'].'</h3>
                    </div>
                    
            
                    
                </div>
                   
            
                   
                </div>
                 </div>   
                <button class="seta-esquerda" data-button="previous">&#8249;</button>
                <button class="seta-direita" data-button="next">&#8250;</button>

                <button class="botaoDetalhes">Mais detalhes</button>
            
                    <div class="identificaPersonalizacao">
                        <h3><img src="../img/icones/icon-personaliza-detalhes.png" alt=""> Personalizado pelo Cliente</h3>
                    </div>
            
            
        </div>';
                    
                      }}
                }
            
               
            
                echo '<!-- MAIS SOBRE A EMPRESA -->
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
            
            
            
            </body>';
            }
        }
        
    

?>

        <script src="/js/menu.js"></script>
        <script src="../sessaoUsuario/js/carousel.js"></script>




<!-- </html> -->