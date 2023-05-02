<?php
include('../protect.php');
// ESSA TELA SERÁ EXIBIDA QUANDO A EMPRESA SELECIONAR UM SERVIÇO PARA EDITÁ-LO
$cd_servico = $_GET['cd_servico'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

// SELECIONANDO AS INFORMAÇÕES DA TB_SERVICO QUE QUERO EXIBIR NA TELA DETALHES
$query = "SELECT * FROM tb_servico WHERE cd_servico = '$cd_servico'";
//estou usando $cd_servico para selecionar um serviço específico da empresa, ou seja, o serviço em que o cliente vai clicar

$result_query = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));
$row = mysqli_fetch_assoc($result_query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloServico-e.css">
    <link rel="icon" href="../img/index/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <title>Criar Serviço/Pacote</title>
</head>
<body>

    <!-- <div class="menu"></div> -->
        <!--INICIO MENU EMPRESA -->
        <div id="topo" class="bg-gradPrincipal menuEmpresa">
        <header class="alinhaElementos">
        <a href="../sessaoEmpresa/index-e.php"><div id="logoImagem"></div></a>
            
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
                    <!-- <a href=""><h5>Pedidos</h5></a> -->
                    <a href="criacaoServico-e.php"><h5>Criar Serviço ou Pacote</h5></a>
                    <a href="selecaoPedido-e.php"><h5>Criar Postagens</h5></a>
                </section>
    
                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-bell-fill opcaoMenu" viewBox="0 0 16 16" style="cursor:pointer;">
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
<div class="centralizaSections">

    <h1 class="meioH1">Este é um</h1>
    <div class="cabecalho">
        <div>
        <label for="servico">
        <input type="radio" name="opcao" value="servico" id="" checked>
        Servico</label>
        </div>
        <hr>
        <div>
        <label for="pacote">
        <input type="radio" name="opcao" value="pacote" id="">
        <a>Pacote de serviços</a></label>
        </div>
    </div>

<!-- SESSAO SERVICO -->  
    <section class="servico">
        <form class="grid-Principal" action="atualizarServico-e.php" method="POST">
            <div class="digitacao">
                <input type="hidden" name="cd_servico" value="<?php echo($row["cd_servico"])?>">
                <input class="input-Digita" type="text" placeholder="Título do serviço" name="nm_servico" value="<?php if (isset($row)) { echo $row['nm_servico']; } ?>">
                <input class="input-Digita" type="text" name="ds_servico" id="" placeholder="Descrição" value="<?php if (isset($row)) { echo $row['ds_servico']; } ?>">
                <select class="input-Selec" name="cd_tiposervico" id="">
                    <option value="" selected>Tipo de serviço</option>
                    <option value="1" <?php if(isset($row) && $row['cd_tiposervico'] == '1') echo 'selected'; ?>>Comida</option>
                    <option value="2" <?php if(isset($row) && $row['cd_tiposervico'] == '2') echo 'selected'; ?>>Fotografia</option>
                    <option value="3" <?php if(isset($row) && $row['cd_tiposervico'] == '3') echo 'selected'; ?>>Decoração</option>
                    <option value="4" <?php if(isset($row) && $row['cd_tiposervico'] == '4') echo 'selected'; ?>>Música</option>
                    <option value="5" <?php if(isset($row) && $row['cd_tiposervico'] == '5') echo 'selected'; ?>>Espaço</option>
                    <option value="6" <?php if(isset($row) && $row['cd_tiposervico'] == '6') echo 'selected'; ?>>Atração</option>
                    <option value="7" <?php if(isset($row) && $row['cd_tiposervico'] == '7') echo 'selected'; ?>>Equipamento</option>
                    <option value="8" <?php if(isset($row) && $row['cd_tiposervico'] == '8') echo 'selected'; ?>>Auxiliar</option>
                </select>
                <input class="input-Digita" type="text" name="vl_servico" id="" placeholder="Valor" value="<?php echo($row["vl_servico"]);?>">
<!-- RADIOS COMUNS -->
                <div class="radios">
                    <h1>Personalização</h1>
                    <div class="personalizacao">
                        <label class="sim" for="sim">
                        <input type="radio" name="cd_personaliz" value="1" id="" <?php if($row['cd_personaliz']==1)echo("checked"); ?> >
                        Sim</label>
                        
                        <label class="nao" for="nao">
                        <input type="radio" name="cd_personaliz" value="0" id="" <?php if($row['cd_personaliz']==0)echo("checked"); ?>>
                        <a>Não</a></label>
                    </div>
                    <hr>
                    <h1>Solicitação de orçamento</h1>
                    <div class="personalizacao">
                        <label class="sim" for="sim">
                        <input type="radio" name="cd_orcament" value="1" id="" <?php if($row['cd_orcament']==1)echo("checked"); ?>>
                        Sim</label>
                        
                        <label class="nao" for="nao">
                        <input type="radio" name="cd_orcament" value="0" id="" <?php if($row['cd_orcament']==0)echo("checked"); ?>>
                        <a>Não</a></label>
                    </div>
                    <hr>
                    <h1>Livre localização</h1>
                    <div class="personalizacao">
                        <label class="sim" for="sim">
                        <input type="radio" name="cd_local" value="1" id="" <?php if($row['cd_local']==1)echo("checked"); ?>>
                        Sim</label>
                        
                        <label class="nao" for="nao">
                        <input type="radio" name="cd_local" value="0" id="" <?php if($row['cd_local']==0)echo("checked"); ?>>
                        <a>Não</a></label>
                    </div>
                </div>
<!-- BOTAO DO FORM -->         
                <button class="criar" type="submit">Editar Serviço</button>
            </div>
<!-- INPUT PARA IMAGENS -->
            <div class="imagens">
                <h1 class="">Imagem de capa</h1>
                <label class="cardCarregarG" for="img-inputCapa" id="img2">
                    <input hidden class="linkCapa" id="img-inputCapa" value="" type="file" name="imgCapa">
                    <input id="linkimgCapa" value="mudara" type="hidden" name="url_imgcapa">
                    <img id="preview-capa" style="opacity: 1;" src="<?php echo($row['url_imgcapa']) ?>" width="100%">
                </label>

                <h1>Outras imagens</h1>
                <div class="grid-imagens">
                        <div>
                        <label class="img2" for="img-input2">
                        <input class="link2" id="img-input2" value="" hidden type="file" name="img2">
                            <input id="linkimg2" value="mudara" type="hidden" name="url_img2">
                            <img style="opacity: 1;" id="preview-2" src="<?php echo($row['url_img2']) ?>" width="100%">
                        </label>
                    </div>
                    <div>
                        <label class="img3" for="img-input3">
                        <input hidden class="link3" id="img-input3" value="" type="file" name="img3">
                            <input id="linkimg3" value="mudara" type="hidden" name="url_img3">
                            <img style="opacity: 1;" id="preview-3" src="<?php echo($row['url_img3']) ?>" width="100%">
                        </label>
                    </div>
                </div>
        </form>
    </section>

<!-- SESSAO PACOTE -->
    <section class="pacote">

    </section>
   
</div>
    <script src="js/scriptServico-e.js"></script>
    <script src="js/menu-e.js"></script>

</body>
</html>
