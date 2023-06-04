<?php

if(!isset($_SESSION)){
    session_start();
}

// $sql = "SELECT * FROM tb_empresa";
// $result = $conn->query($sql);

// if ($result->num_rows > 0 ) {
//   // informações de login válidas, redirecionar o usuário para a página inicial

//   $empresa = $result->fetch_assoc();

//   //se nao tem sessao...
//   if(!isset($_SESSION)){
//     session_start();
//   }

  // $_SESSION['cd_empresa'] = $empresa['cd_empresa'];
  // $_SESSION['nm_usuarioempresa'] = $empresa['nm_usuarioempresa'];
  
// }
// var_dump($_SESSION['nm_usuarioempresa']);
include('../protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

<!-- ESSA TELA TEM COMO FUNÇÕES, POR ENQUANTO, EXCLUIR, EDITAR E VISUALIZAR OS SERVIÇOS DE UMA EMPRESA -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" href="imagens/logo.png"> -->
    <link rel="stylesheet" href="css/perfil-empresa.css"/>
    <link rel="stylesheet" href="css/menu-e.css"/>
    <link rel="icon" href="../img/index/logo.png">
    <title>Perfil - Eventalize</title>
</head>
<body>
    <div class="inicioPerfil">
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
        
    
    
            <div class="infoPerfil">
                <div class="bioPerfil">
                    <div class="fotoPerfil">
                    <img src="<?php echo $_SESSION['url_fotoperfil'];?>" alt="">
                    </div>
                    <div class="infoEmpresa">
                        <div class="info">
                        <h3><?php echo $_SESSION['nm_usuarioempresa'];?></h3>
                        <h5><?php echo $_SESSION['nm_usuarioempresa'];?></h5>
                        <h4><?php echo $_SESSION['ds_biografia'];?></h4>
                        </div>
                        <div class="loc">
                            <img src="../bancoImagens/empresas/imagens-perfil-empresa/loc.svg" alt="">
                            <h4>Santos - SP</h4>
                        </div>
                            <div class="avaliacaoPerfil">
                                <img src="../bancoImagens/empresas/imagens-perfil-empresa/star.svg" alt="">
                                <h4>4,8</h4>
                            </div>
                           
                    </div>
                    <div class="botaoEditarPerfil">
                            <a href="editarPerfil-e.php"><button class="editarPerfil"><img src="" alt=""style="margin-right: -12%"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
</svg>Editar Perfil</button></a>
                    </div>
                </div>
            </div>

            <div class="inicioPostagens">
              <div class="tituloServico">
                <h2>Serviços Recentes</h2>
              </div>
                <div class="gridCardServico">
                  <div class="cardServico">
                    <div class="conteudoCardServico">
                      <h2>Foto Alta Qualidade</h2>
                    </div>
                    <div class="valorServico">
                      <h3>R$5,00 por foto</h3>
                    </div>
                  </div>

                  <div class="cardServico">
                  <div class="conteudoCardServico">
                      <h2>Foto Alta Qualidade</h2>
                    </div>
                    <div class="valorServico">
                      <h3>R$5,00 por foto</h3>
                    </div>
                  </div>

                  <div class="cardServico">
                  <div class="conteudoCardServico">
                      <h2>Foto Alta Qualidade</h2>
                    </div>
                    <div class="valorServico">
                      <h3>R$5,00 por foto</h3>
                    </div>
                  </div>

                  <div class="cardServico">
                  <div class="conteudoCardServico">
                      <h2>Foto Alta Qualidade</h2>
                    </div>
                    <div class="valorServico">
                      <h3>R$5,00 por foto</h3>
                    </div>
                  </div>

                  <div class="cardServico">
                    <div class="conteudoCardServico">
                      <h2>Foto Alta Qualidade</h2>
                    </div>
                    <div class="valorServico">
                      <h3>R$5,00 por foto</h3>
                    </div>
                  </div>

                  <div class="cardServico">
                  <div class="conteudoCardServico">
                      <h2>Foto Alta Qualidade</h2>
                    </div>
                    <div class="valorServico">
                      <h3>R$5,00 por foto</h3>
                    </div>
                  </div>

                  <div class="cardServico">
                  <div class="conteudoCardServico">
                      <h2>Foto Alta Qualidade</h2>
                    </div>
                    <div class="valorServico">
                      <h3>R$5,00 por foto</h3>
                    </div>
                  </div>

                  <div class="cardServico">
                  <div class="conteudoCardServico">
                      <h2>Foto Alta Qualidade</h2>
                    </div>
                    <div class="valorServico">
                      <h3>R$5,00 por foto</h3>
                    </div>
                  </div>

                  <div class="cardServico">
                  <div class="conteudoCardServico">
                      <h2>Foto Alta Qualidade</h2>
                    </div>
                    <div class="valorServico">
                      <h3>R$5,00 por foto</h3>
                    </div>
                  </div>

                  <div class="cardServico">
                  <div class="conteudoCardServico">
                      <h2>Foto Alta Qualidade</h2>
                    </div>
                    <div class="valorServico">
                      <h3>R$5,00 por foto</h3>
                    </div>
                  </div>
                </div>
                <!-- <div class="carrossel">
                    <div class="seta-direita">&#8250;</div>
                    <div class="seta-esquerda">&#8249;</div>

                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/festa1.png"/>
                          <div class="textoCard"><h1>Festa de Aniversário</h1></div>
                        </div>
                      
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/festa2.png" />
                          <div class="textoCard"><h1>Casamento</h1></div>
                        </div>
                      
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/festa3.png" />
                          <div class="textoCard"><h1>Pool Party</h1></div>
                        </div>
                      
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/festa.jpg"/>
                          <div class="textoCard"><h1>Festa</h1></div>
                        </div>
                      
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/halloween.jpg" />
                          <div class="textoCard"><h1>Halloween</h1></div>
                        </div>
                      
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/ensaio1.jpg" />
                          <div class="textoCard"><h1>Ensaio Fotográfico</h1></div>
                        </div>
                      
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/festasurpresa.jpg" />
                          <div class="textoCard"><h1>Festa Surpresa</h1></div>
                        </div>
                      
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/ensaioinfantil.jpg" />
                          <div class="textoCard"><h1>Ensaio Infantil</h1></div>
                        </div>
                      
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/anonovo.jpg" />
                          <div class="textoCard"><h1>Ano Novo</h1></div>
                        </div>
                      
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/pacote2.png" />
                          <div class="textoCard"><h1>Festa do Pijama</h1></div>
                        </div>
                      
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/casafesta.jpg" />
                          <div class="textoCard"><h1>Casa de Festa</h1></div>
                        </div>
                     
                    
                        <div class="conteudoCard">
                          <img src="../bancoImagens/empresas/imagens-perfil-empresa/Shows.jpg" />
                          <div class="textoCard"><h1>Shows</h1></div> -->
                        <!-- </div> -->
                  <!-- </div> -->
            </div>
            
<?php

// ESSA PÁGINA IRÁ CONTER OS BOTÕES PARA QUE A EMPRESA POSSA, CONSULTAR, EDITAR E EXCLUIR SEU SERVIÇO 
          

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";
$cd_empresa = $_SESSION['cd_empresa'];
            
$conn = new mysqli($servername, $username, $password, $db_name);
            
  if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}
            
// SELECIONANDO AS INFORMAÇÕES QUE QUERO EXIBIR NA TELA DETALHES
$query = "SELECT cd_servico ,nm_servico, ds_servico, vl_servico, url_imgcapa FROM tb_servico where cd_empresa = $cd_empresa";
            
$result_query = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));
            
// a função mysqli_num_rows serve para verificar se a consulta retornou algum resultado


if (mysqli_num_rows($result_query) > 0) {
    echo '
    <div class="inicioPacotes">
    <div class="servicos">
    <h2>Serviços</h2>
    </div>
        <div class="gridPacotes">';

    // Lista de cores disponíveis para os cards
    $cores = array('#3ED1FF', '#FFA856', '#B974B1');

    // Corrente do índice de cores
    $indiceCor = 0;

    while ($row = mysqli_fetch_assoc($result_query)) {
        // Obter a cor do índice atual
        $corCard = $cores[$indiceCor];

        // Incrementar o índice para a próxima cor
        $indiceCor = ($indiceCor + 1) % count($cores);

        echo '
        <div class="cardPacotes" style="background-color: '.$corCard.';">
            <div class="conteudoPacote">
                <form action="../sessaoCliente/detalheServico.php">
                    <input type="hidden" value="'.$row["cd_servico"].'" name="cd_servico">
                    <button type="submit" style="background: transparent; border: none; cursor: pointer;">
                        <img src="'.$row["url_imgcapa"].'" alt="">
                        <h3>'.$row["nm_servico"].'</h3>
                        <h4>'.$row["ds_servico"].'</h4>
                        <h2>R$'. str_replace('.', ',', $row['vl_servico']) .'</h2>
                    </button>
                    <div class="botoesPacote">
                    </form>
                    <form action="edicaoServico-e.php">
                        <input type="hidden" value="'.$row["cd_servico"].'" name="cd_servico">
                        <button type="submit" class="editarPacote"><img src="../bancoImagens/empresas/imagens-perfil-empresa/editarIcon.svg" alt="">Editar</button>
                    </form>
                    <form action="deletarServico-e.php">
                        <input type="hidden" value="'.$row["cd_servico"].'" name="cd_servico">
                        <button class="deletarPacote" type="submit"><img src="../bancoImagens/empresas/imagens-perfil-empresa/deletar.svg" alt="">Deletar</button>
                    </form>
                </div>
            </div>
        </div>';
    }

    echo '
        </div>
    </div>';
} else {
    echo "Nenhum registro encontrado";
}

mysqli_close($conn);

  
  ?>
        </div>
    </div>
  </div>
    <script src="js/carouseul.js"></script>
    <script src="js/menu-e.js"></script>
</body>
</html>