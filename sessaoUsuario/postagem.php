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
        $sql2 = "SELECT e.url_fotoperfil, e.nm_fantasia, s.cd_servico FROM tb_postagem as p JOIN tb_empresa as e ON e.cd_empresa = p.cd_empresa JOIN tb_servicopedido as pd on pd.cd_pedido = p.cd_pedido
        JOIN tb_servico as s on s.cd_servico = pd.cd_servico WHERE cd_postagem = $cd_postagem";
        $result2 = $conn->query($sql2);
        $row2 = $result2 -> fetch_assoc();
        $nm_autor = $row2['nm_fantasia'];
        $img_autor = $row2['url_fotoperfil'];
        // $cd_empresa = $row2['cd_empresa'];
        $cd_servico = $row2['cd_servico'];

    }else {
        $sql2 = "SELECT c.nm_cliente FROM tb_postagem as p JOIN tb_cliente as c ON c.cd_cliente = p.cd_cliente WHERE cd_postagem = $cd_postagem";
        $result2 = $conn->query($sql2);
        $row2 = $result2 -> fetch_assoc();
        $nm_autor = $row2['nm_cliente'];
        $img_autor = 'vazio';
    }
    $sql3 = "SELECT * FROM vwcodigospostagem WHERE cd_postagem = $cd_postagem"; //(pra quando o da raiza estiver pronto)
    $result3 = $conn->query($sql3);

    
 
        if ($result -> num_rows > 0){
                while ($row = $result -> fetch_assoc()){

                    if($row["cd_avaliacao"]==''){
                        $avaliacao = "-";
                    }else {
                        $avaliacao = $row["cd_avaliacao"];
                    }

                    $capa_img = getimagesize($row["url_imgcapa"]);
                    $info_imagem = getimagesize($row["url_img2"]. $row["url_img3"] );
                    $largura = 100; 
                    $altura = 100;
                    $largura_capa = 100;
                    $altura_capa = 100;
                    setlocale(LC_TIME, 'pt_BR.utf8');

                    //formatando data do banco
                    $dt_postagem = $row['dt_postagem'];
                    // Array com os nomes dos meses em português
                    $meses = array(
                        1 => 'janeiro',
                        2 => 'fevereiro',
                        3 => 'março',
                        4 => 'abril',
                        5 => 'maio',
                        6 => 'junho',
                        7 => 'julho',
                        8 => 'agosto',
                        9 => 'setembro',
                        10 => 'outubro',
                        11 => 'novembro',
                        12 => 'dezembro'
                    );

                    // Extrai os valores da data e hora
                    $dia = date('d', strtotime($dt_postagem));
                    $mes_numero = date('n', strtotime($dt_postagem));
                    $ano = date('Y', strtotime($dt_postagem));
                    $hora = date('H\hi', strtotime($dt_postagem));

                    // Obtém o nome do mês com base no número
                    $mes = $meses[$mes_numero];

            echo '<div class="grid-container"> <!--DIV QUE CARREGA O LAYOUT GRID DA PÁGINA TODA-->
                   <!-- INICIO POSTAGENS -->
                 
                  <div class="inicioPostagens">
                    <div class="fotoDestaque">
                        <div class="curtidasPostagem">
                            <img src="../img/icones/estrel.png" alt="">
                            <h3>'.$avaliacao.'</h3>
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
                        <h3>postado em '.$dia.' de '.$mes.' de '.$ano.', às '.$hora.'</h3>
                    </div>
            
                    <div class="tituloPostagem">
                        <h3>'.$row["nm_postagem"].'</h3>
                    </div>
            
                    <div class="descricaoTituloPostagem">
                        <h3>'.$row["ds_postagem"].'</h3>
                    </div>
            
            
            
                    <div class="iconEmpresa">
                        <img src="'.$img_autor.'" alt="">
                        <div class="nomeEmpresa">
                        <h2>'.$nm_autor.'</h2>
                        <div class="iconsCategorias">';
                        if($row["cd_tipoautor"] == 2){
                            echo'Empresa
                            <form action="../sessaoEmpresa/perfilEmpresa.php">
                            <button class="btnVerPerfil" type="submit">Ver perfil</button>
                            </form>

                            <form action="../sessaoCliente/detalheServico.php" method="get">
                            <input type="hidden" value="'.$cd_servico.'" name="cd_servico">
                            <button class="btnVerServico" type="submit">Ver serviço</button>
                            </form>';
                        }else {
                            echo'<p style="font-size: 1.5em;">Cliente</p>';
                        }echo'
                        </div>

                    </div>
                    </div>
                </div>';
                    }
                }
                
                // if (mysqli_num_rows($result3) > 0){
                //     while($row3 = $result3 -> fetch_assoc()){
                //         $servico = $row3['cd_servico'];
                //         $sql4 = "SELECT * FROM tb_servico WHERE cd_servico = 14";
                //         $result4 = $conn->query($sql4);
                //     }
                //     if (mysqli_num_rows($result4) > 0){
                //         echo'
                    //     <!-- INICIO EXIBIÇÕES DE PACOTES -->
                    //     <div class="infoDescricao">
                    //         <h3>Esta postagem contém o pacote</h3>
                    //     </div>
                    //     <div class="inicioInfoPostagem">
                    //     <div class="quadroPacote">
                            
                    // ';

                        // while ($row4 = $result4 -> fetch_assoc()) {
                        //     $capa_img_servico = getimagesize($row4["url_imgcapa"]);
                        //     // $info_imagem_servico = getimagesize($row4["url_img2"]. $row4["url_img3"] );
                        //     $largura_capa_servico = 90;
                        //     $altura_capa_servico = 90;
                        //     $largura_servico = 80; 
                        //     $altura_servico = 80;
                        // // aqui vem o carrosel da pa 
                        // echo'
                        
//                         <div class="slides-container">
//                             <!-- slides -->
//                             <div class="slide" data-slide>
//                     <div class="tituloInfoPacote" >
//                         <img src="../img/icones/icon-decoracao-detalhes-pacote.png" alt="">
//                         <h3>'.$row4['nm_servico'].'</h3>
//                     </div>
//                     <div class="fotoDestaquePacote">
//                         <img src="'.$row4["url_imgcapa"].'" style="width:'.$largura_capa_servico.'%;height:'.$altura_capa_servico.'%;">
//                     </div>
            
//                     <div class="fotoLateralPacote">
//                         <img src="'.$row4["url_img2"].'" style="width:'.$largura_servico.'%;height:'.$altura_servico.'%;">
//                         <img src="'.$row4["url_img3"].'" style="width:'.$largura_servico.'%;height:'.$altura_servico.'%;">
//                     </div>
            
//                     <div class="descricaoInfoPacote">
//                         <h3>'.$row4['ds_servico'].'</h3>
//                     </div>                    
//                 </div>
               
//                  </div>   
//                 <button class="seta-esquerda" data-button="previous">&#8249;</button>
//                 <button class="seta-direita" data-button="next">&#8250;</button>

//                 <button class="botaoDetalhes">Mais detalhes</button>
            
//                     <div class="identificaPersonalizacao">
//                         <h3><img src="../img/icones/icon-personaliza-detalhes.png" alt=""> Personalizado pelo Cliente</h3>
//                     </div>
//             </div>
            
//         </div>';
//                         }}}}}
// 
?>
                   
            
                   
                
                <!-- MAIS SOBRE A EMPRESA -->
                <!-- <div class="maisSobre">
                    <h3>Mais sobre a empresa</h3>
                    <div class="gridMaisSobre">
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
            </div> -->
            
            
            
</body>
</html>

    <script src="/js/menu.js"></script>
    <script src="../sessaoUsuario/js/carousel.js"></script>
