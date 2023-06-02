<?php 

    session_start();

//TELA BACK E FRONT DE EXPLORAR, que carrega as imagens das capas de cada pedido ou pacote/serviço publicado tanto pela empresa, quanto pelo cliente

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

$sql = "SELECT * FROM tb_postagem where url_imgcapa<>''";
$result = $conn->query($sql);

$result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}else{
    echo ('Sem resultados.');
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="css/estiloExplore.css">
    <title>Explore - Eventalize</title>
</head>
<body>
    <!-- MENU -->
    <?php
        if(isset($_SESSION['cd_empresa'])){
            ?>
            <link rel="stylesheet" href="../sessaoEmpresa/css/estilo-e.css">
            <div class="bg-gradPrincipal menuEmpresa">
            <header class="alinhaElementos">
                <div id="logoImagem"><a href="../sessaoEmpresa/index-e.php"></a></div>
                
                <ul class="opcoesMenu">
                    <li class=""><a href="../sessaoEmpresa/index-e.php" class="opcaoMenu" aria-current="page">Início</a></li>
                    <li class="nav-item"><a href="#" class="opcaoMenu">Pedidos</a></li>
                    <li class="nav-item"><a href="#" class="opcaoMenu">Suas postagens</a></li>
                    <li class="nav-item"><a href="chatEmpresa.php" class="opcaoMenu">Mensagens</a></li>
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
        <?php
        }else if (isset($_SESSION['cd_cliente'])){
            ?>
            <link rel="stylesheet" href="../sessaoCliente/css/iniciocliente.css">
            <link rel="stylesheet" href="../sessaoCliente/css/menu-c.css">
            <link rel="icon" href="../img/index/logo.png">
            <div class="grid-container">
            <div class="header">
                <div class="logo">
                    <a href="../sessaoCliente/index-c.php"><img src="../img/icones/logoBranca.svg" alt=""></a>
                </div>
                <div class="menu">
                    <a href="../sessaoCliente/index-c.php">Início</a>
                    <a href="../sessaoUsuario/explore.php">Feed</a>
                    <a href="../sessaoCliente/chatCliente.php">Mensagens</a>
                    <a href="historicopedido-c.php">Meus Pedidos</a>
                </div>
    
                <div class="headerPesquisa">
                    <form action="buscaServico-c.php" method="post" id="searchForm">
                        <input type="text" style="padding: 2.5%;" placeholder="Procure Serviços" name="nm_tiposervico">
                        <div class="imgLupa">
                        <img src="../img/icones/icon-lupa.svg" alt="" width="30px" onclick="submitForm()">
                        </div>
                    </form>
                </div>
                <div class="headerClientePerfil" >
                    <!-- <div class="iconCliente"> -->
                    <a href="#" class="carrinho"><img src="../img/icones/icon-carrinho.svg" alt="Carrinho"></a>
                    <a href="#" class ="notificacao"><img src="../img/icones/icon-notificacao.svg" alt="Notificações"></a>
                    <!-- </div> -->
                    
                    <button class="menuIcon2" onclick="menuOpen()"><img src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
                </div>
                <section class="menuPerfil">
                    <a href="">Perfil</a>
                    <!-- <a href="">Postagens</a> -->
                    <!-- <a href="" style="margin-bottom: 20%">Histórico de Compras</a> -->
                    <a href="">Configurações</a>
                    <a href="../logout.php">Sair</a>
                </section>
            </div>
        </div>
        <script src="../sessaoCliente/js/menu-c.js"></script>
        <?php
        }else {
            ?>
            <header>
        <div class="logoHome">
            <img src="../img/index/logo.png" alt="logo">
        </div>
            <div class="headerHome">
                <a href="../index.html">Início</a>
                <a href="">Explore</a>
                <a href="">Sobre Nós</a>
            </div>
            <div class="headerHomePerfil">
                <button class="estiloVazio" id="entrarHome" onclick="novaSection(1)"><a href="../entrar.html">Entrar</a></button>
                <button class="estiloVazio" id="entrarHome" onclick="novaSection(0)"><a href="../cadastrar.html">Cadastrar</a></button>
            </div>
            <button class="menuIcon" onclick="menuOpen()"><img  src="img/index/menuicon.svg" width="30px"></button>
    </header>
    <?php
        }
    ?>
    <!-- FIM MENU -->
<div class="row">
    <!-- CORPO - GRID DE POSTAGENS -->
        <?php
        $contador = 0;
        while ($row = $result->fetch_assoc()) {
            // Verifica se é a primeira imagem da linha
        
            // Verifica se é a primeira imagem da coluna
            if ($contador % 7 === 0) {
                // Abre uma nova coluna
                echo '<div class="column">';
            }
        
            // Div que contém a imagem e informações de uma postagem
            echo '<div class="tipoServico">';
            // Procura o codigo para inserir o icone correspondente
            $sql2 = "SELECT * FROM vwtiposervicopost where cd_postagem = ".$row['cd_postagem']."";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            //associa o código do autor da tabela postagem a variáveis
            $cliente = $row['cd_cliente'];
            $empresa = $row['cd_empresa'];
            // Pega informações do autora partir do atributo cd_tipoautor da tabela postagem
            if ($row['cd_tipoautor'] == 2){
                $sql4 = "SELECT * FROM tb_empresa where cd_empresa = $empresa";
                $result4 = $conn->query($sql4);
                $row4 = $result4->fetch_assoc();
                $nome = $row4['nm_fantasia'];
                $biografia = substr($row4['ds_biografia'], 0, 25) . '...';
                $perfil = $row4['url_fotoperfil'];
            }else {
                $sql3 = "SELECT * FROM tb_cliente WHERE cd_cliente = $cliente";
                $result3 = $conn->query($sql3);
                echo (mysqli_error($conn));
                $row3 = $result3->fetch_assoc();
                $nome = $row3['nm_cliente'];
                $biografia = 'Cliente';
                $perfil = "https://img.freepik.com/vetores-gratis/vetores-de-design-de-baloes-festivos-coloridos_53876-61834.jpg?w=826&t=st=1683333233~exp=1683333833~hmac=225c06ffa7e5e25f43e96dbbccf8e2efcaaf88ff3e34aebc8dd473be069fdaf6";
            }
           
            
            //Carrega cada informação de cada postagem
            echo '<img class="iconTipo" src="../img/icones/'.$row2['cd_tiposervico'].'.svg">';
            echo '<div class="sombraCapa"></div>';
            echo '<img src="'.$row['url_imgcapa'].'">';
            echo '<form class="infoPostagem" action="postagem.php" method="get">
                        <input type="hidden" name="cd_postagem" value="'.$row['cd_postagem'].'">
                        <div>
                        <h3>'. $row['nm_postagem'] .'</h3>
                        </div>

                        <div class="autor">
                        <img class="perfil" src="'.$perfil.'">
                        
                        <div class="infoAutor">
                        <h3>'.$nome.'</h3>
                        <p>'.$biografia.'</p>
                        </div>
                        </div>
                  
                        <button class="verMais" type="submit">Ver mais</button>
                  </form>
            ';
            echo '</div>';
            
            // Incrementa o contador para separar as postagem com suas respectitivas colunas e posições
            $contador++;
        
            // Verifica se é a última imagem da coluna
            if ($contador % 7 === 0) {
                // Fecha a coluna quando é a última imagem
                echo '</div>';
            }
        

        }
        
        // Verifica se ainda há imagens não exibidas
        while ($contador % 28 !== 0) {
            // Verifica se é a última imagem da coluna
            if ($contador % 7 === 0) {
                // Fecha a coluna
                // echo '</div>';
            }
        
            // Incrementa o contador
            $contador++;
        }
        
   

        //========================================================
        //=============================================================================================================================================================================================================================================================================================================
        
        $sql5 = "SELECT * FROM tb_servico where url_imgcapa<>''";
        $result5 = $conn->query($sql5);

        $contador2 = 0;
        while ($row5 = $result5->fetch_assoc()) {
            // Verifica se é a primeira imagem da linha
        
            // Verifica se é a primeira imagem da coluna
            if ($contador2 % 7 === 0) {
                // Abre uma nova coluna
                echo '<div class="column">';
            }
        
            // Div que contém a imagem e informações de uma postagem
            echo '<div class="tipoServico">';
            // Procura o codigo para inserir o icone correspondente
           
            $empresa = $row5['cd_empresa'];
            // Pega informações do autora partir do atributo cd_tipoautor da tabela postagem
                $sql4 = "SELECT * FROM tb_empresa where cd_empresa = $empresa";
                $result4 = $conn->query($sql4);
                $row4 = $result4->fetch_assoc();
                $nome = $row4['nm_fantasia'];
                $biografia = substr($row4['ds_biografia'], 0, 25) . '...';
                $perfil = $row4['url_fotoperfil'];
    
           
            
            //Carrega cada informação de cada postagem
            echo '<img class="iconTipo" src="../img/icones/'.$row5['cd_tiposervico'].'.svg">';
            echo '<div class="sombraCapa"></div>';
            echo '<img src="'.$row5['url_imgcapa'].'">';
            echo '<form class="infoPostagem" action="../sessaoCliente/detalheServico.php" method="get">
                        <input type="hidden" name="cd_servico" value="'.$row5['cd_servico'].'">
                        <div>
                        <h3>'. $row5['nm_servico'] .'</h3>
                        </div>

                        <div class="autor">
                        <img class="perfil" src="'.$perfil.'">
                        
                        <div class="infoAutor">
                        <h3>'.$nome.'</h3>
                        <p>'.$biografia.'</p>
                        </div>
                        </div>
                  
                        <button class="verMais" type="submit">Ver mais</button>
                  </form>
            ';
            echo '</div>';
            
            // Incrementa o contador2 para separar as postagem com suas respectitivas colunas e posições
            $contador2++;
        
            // Verifica se é a última imagem da coluna
            if ($contador2 % 7 === 0) {
                // Fecha a coluna quando é a última imagem
                echo '</div>';
            }
        

        }
        
        // Verifica se ainda há imagens não exibidas
        while ($contador2 % 28 !== 0) {
            // Verifica se é a última imagem da coluna
            if ($contador2 % 7 === 0) {
                // Fecha a coluna
                echo '</div>';
            }
        
            // Incrementa o contador2
            $contador2++;
        }
        ?> </div><?php
        $conn->close();
        ?>
</div>
    <!-- FIM CORPO -->

    <script src="js/scriptExplore.js"></script>
</body>
</html>