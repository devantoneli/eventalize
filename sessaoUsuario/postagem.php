<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
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
                            <a href="../index.html">Início</a>
                            <a href="../sessaoUsuario/explore.php">Explore</a>
                            <a href="">Sobre Nós</a>
                        </div>
                        <div class="headerHomePerfil">
                            <button class="estiloVazio" id="entrarHome" onclick="novaSection(1)"><a href="../entrar.html">Entrar</a></button>
                            <button class="estiloVazio" id="entrarHome" onclick="novaSection(0)"><a href="../cadastrar.html">Cadastrar</a></button>
                        </div>
                        <button class="menuIcon" onclick="menuOpen()"><img  src="../img/index/menuicon.svg" width="30px"></button>
                </header>
<?php

$cd_postagem = $_GET['cd_postagem'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Não foi possível conectar ao banco de dados: " . $conn->connect_error);
    }

    // $cd_postagem = $_GET ['cd_postagem'];
    $sql = "SELECT * FROM tb_postagem WHERE cd_postagem = $cd_postagem"; //(pra quando o da raiza estiver pronto)
    $result = $conn->query($sql);
    // $sql = 'SELECT nm_postagem, ds_postagem, url_imgcapa, url_img2, url_img3 FROM tb_postagem WHERE cd_postagem = 19';
    $resultS = $conn->query($sql);
    $rowS = $resultS -> fetch_assoc();
    //SELECT PARA PEGAR AS INFORMAÇÕES DE EMPRESA OU CLIENTE
    if ($rowS["cd_tipoautor"]==2){
        $sql2 = "SELECT e.nm_fantasia FROM tb_postagem as p JOIN tb_empresa as e ON e.cd_empresa = p.cd_empresa WHERE cd_postagem = $cd_postagem";
        $result2 = $conn->query($sql2);
        $row2 = $result2 -> fetch_assoc();
        $nm_autor = $row2['nm_fantasia'];
    }else {
        $sql2 = "SELECT c.nm_cliente FROM tb_postagem as p JOIN tb_cliente as c ON c.cd_cliente = p.cd_cliente WHERE cd_postagem = $cd_postagem";
        $result2 = $conn->query($sql2);
        $row2 = $result2 -> fetch_assoc();
        $nm_autor = $row2['nm_cliente'];
    }
    // $sql2 = 'SELECT e.nm_fantasia FROM tb_empresa as e JOIN tb_postagem as p ON e.cd_empresa = p.cd_empresa WHERE p.cd_postagem = 19';
    // $empresa = $result2->fetch(PDO::FETCH_ASSOC);
    $sql3 = "SELECT * FROM vwcodigospostagem WHERE cd_postagem = $cd_postagem"; //(pra quando o da raiza estiver pronto)
    // $sql3 = 'SELECT * FROM vwcodigospostagem WHERE cd_postagem = 45';
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
                    


            echo '<div class="grid-container"> <!--DIV QUE CARREGA O LAYOUT GRID DA PÁGINA TODA-->
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
                        <h2>'.$nm_autor.'</h2>
                        <div class="iconsCategorias">';
                        if($row["cd_tipoautor"] == 2){
                            echo'
                            <img style="width: 30px; margin: 2%;" src="../img/icones/icon-decoracao-detalhes.png" alt="">
                            <img src="../img/icones/icon-auxiliar-detalhes.png" alt="">
                            <img src="../img/icones/icon-espaco-detalhes.png" alt="">';
                        }else {
                            echo'<p style="font-size: 1.5em;">Cliente</p>';
                        }echo'
                        </div>

                    </div>
                    </div>
                </div>';
                
                if (mysqli_num_rows($result3) > 0){
                    while($row3 = $result3 -> fetch_assoc()){
                        $pacote = $row3['cd_pacote'];
                        // $sql4 = "SELECT * FROM tb_servico WHERE cd_empresa = $pacote";
                        // $sql4 = "SELECT * FROM tb_servico WHERE cd_empresa = 342";
                        $sql4 = "SELECT * FROM tb_servico WHERE cd_servico = 0";
                        $result4 = $conn->query($sql4);
                    }
                    if (mysqli_num_rows($result4) > 0){
                        echo'
                        <!-- INICIO EXIBIÇÕES DE PACOTES -->
                        <div class="infoDescricao">
                            <h3>Esta postagem contém o pacote</h3>
                        </div>
                        <div class="inicioInfoPostagem">
                        <div class="quadroPacote">
                            
                    ';

                        while ($row4 = $result4 -> fetch_assoc()) {
                            $capa_img_pacote = getimagesize($row4["url_imgcapa"]);
                            // $info_imagem_pacote = getimagesize($row4["url_img2"]. $row4["url_img3"] );
                            $largura_capa_pacote = 90;
                            $altura_capa_pacote = 90;
                            $largura_pacote = 80; 
                            $altura_pacote = 80;
                        // aqui vem o carrosel da pa 
                        echo'
                        
                        <div class="slides-container">
                            <!-- slides -->
                            <div class="slide" data-slide>
                    <div class="tituloInfoPacote" >
                        <img src="../img/icones/icon-decoracao-detalhes-pacote.png" alt="">
                        <h3>'.$row4['nm_servico'].'</h3>
                    </div>
                    <div class="fotoDestaquePacote">
                        <img src="'.$row4["url_imgcapa"].'" style="width:'.$largura_capa_pacote.'%;height:'.$altura_capa_pacote.'%;">
                    </div>
            
                    <div class="fotoLateralPacote">
                        <img src="'.$row4["url_img2"].'" style="width:'.$largura_pacote.'%;height:'.$altura_pacote.'%;">
                        <img src="'.$row4["url_img3"].'" style="width:'.$largura_pacote.'%;height:'.$altura_pacote.'%;">
                    </div>
            
                    <div class="descricaoInfoPacote">
                        <h3>'.$row4['ds_servico'].'</h3>
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
            
        </div>';
                        }}}}}
?>
                   
            
                   
                
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
            
            
            
            </body>
               <script src="/js/menu.js"></script>
        <script src="../sessaoUsuario/js/carousel.js"></script>
