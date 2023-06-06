<?php
include('../protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloServico-e.css">
    <link rel="stylesheet" href="css/menu-e.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/index/logo.png">
    <title>Criar Serviço/Pacote - Eventalize</title>
</head>
<body>
<!-- FRONT-END formulário para criação de um serviço, enviando para o arquivo salvarServico.php-->
    <!--INICIO MENU EMPRESA -->
    <div id="topo" class="bg-gradPrincipal menuEmpresa">
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
                    <!-- <a href=""><h5>Pedidos</h5></a> -->
                    <a href="criacaoServico-e.php"><h5>Criar Serviço</h5></a>
                    <a href="selecaoPedido-e.php"><h5>Criar Postagens</h5></a>
                </section>
    
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-bell-fill opcaoMenu" viewBox="0 0 16 16" style="cursor:pointer;">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg> -->
    
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
    <h1 style="margin-left: 24%;padding-top: 2vw;position: absolute;">Novo serviço</h1>
<div class="centralizaSections">
    

<!-- SESSAO SERVICO -->  
    <section class="servico">
        <form class="grid-Principal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="digitacao">
                <input class="input-Digita" type="text" placeholder="Título do serviço" name="nm_servico">
                <input class="input-Digita" type="text" name="ds_servico" id="" placeholder="Descrição">
                <select class="input-Selec" name="cd_tiposervico" id="">
                    <option value="" selected>Tipo de serviço</option>
                    <option value="1">Comida</option>
                    <option value="2">Fotografia</option>
                    <option value="3">Decoração</option>
                    <option value="4">Música</option>
                    <option value="5">Espaço</option>
                    <option value="6">Atração</option>
                    <option value="7">Equipamento</option>
                    <option value="8">Auxiliar</option>
                </select>
                <input class="input-Digita" pattern="[0-9]+([,\.][0-9]+)?" title="Digite um número válido" name="vl_servico" id="" placeholder="Valor (ex: 10,50)">
               
<!-- RADIOS COMUNS -->
                <div class="radios">
                    <h1>Personalização</h1>
                    <div class="personalizacao">
                        <label class="sim" for="1" name="cd_personaliz">
                        <input type="radio" name="cd_personaliz" value="1" id="">
                        Sim</label>
                        
                        <label class="nao" for="0">
                        <input type="radio" name="cd_personaliz" value="0" id="">
                        <a>Não</a></label>
                    </div>
                    <hr>
                    </div>
<!-- BOTAO DO FORM -->         
                <button class="criar" type="submit" id="openModal">Criar Serviço</button>
</div>
            
            

<!-- INPUT PARA IMAGENS -->
        <!-- <div class="gridImagens"> -->
            <div class="imagens">
                <h1 class="">Imagem de capa</h1>
                <label class="cardCarregarG uploadImgPedido" for="img-inputCapa" id="img2">
                    <input hidden class="linkCapa" id="img-inputCapa" value="" type="file" name="imgCapa">
                    <input id="linkimgCapa" value="mudara" type="hidden" name="url_imgcapa">
                    <img id="preview-capa" src="" width="100%">
                </label>

                <h1>Outras imagens</h1>
                <div class="grid-imagens">
                        <div>
                        <label class="img2 uploadImg" for="img-input2">
                        <input class="link2" id="img-input2" value="" hidden type="file" name="img2">
                            <input id="linkimg2" value="mudara" type="hidden" name="url_img2">
                            <img id="preview-2" src="" width="100%">
                        </label>
                    </div>
                    <div>
                        <label class="img3 uploadImg2" for="img-input3">
                        <input hidden class="link3" id="img-input3" value="" type="file" name="img3">
                            <input id="linkimg3" value="mudara" type="hidden" name="url_img3">
                            <img id="preview-3" src="" width="100%">
                        </label>
                    </div>
                </div>
                <!-- </div> -->
        </form>
       
    </section>
    
    <div id="escurecer"></div>


<!-- SESSAO PACOTE -->
    <section class="pacote">

    </section>
    <center>
    <div class="servicoAtt" id="modal">
        <svg width="215" height="215" viewBox="0 0 215 215" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="107.5" cy="107.5" r="107.5" fill="#F5468A" class="svg-elem-1 active"></circle>
        <path d="M136.8 79.6586L136.815 79.6436L136.83 79.6282L145.249 70.8434L162.849 88.077L154.034 96.8922L104.235 146.691L95.4349 155.491L87.0309 146.722L87.0162 146.706L87.0012 146.691L65.6586 125.349L56.8284 116.519L74.062 99.2851L82.8922 108.115L82.9055 108.129L82.9191 108.142L94.4441 119.24L95.8578 120.601L97.2456 119.213L136.8 79.6586Z" fill="white" stroke="#F5468A" stroke-width="4" class="svg-elem-2 active"></path>
        </svg>
        <h1 id="animacao" class="hidden">Serviço criado com sucesso! </h1>
        <a href="perfilEmpresa.php">Voltar para o início</a>
        
        </div>
</center>
</div>


<style>
    /* .hidden {
    display: none;
    } */

    .servicoAtt{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 50%;
        display: none;
        position: absolute;
        width: 50%;
        top: 20%;
        left: 23%;
        background-color: white;
        z-index: 3;
        padding-top: 5%;
    }

    #escurecer {
        display: none;
        width: 100%;
        height: 166%;
        background-color: black;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        opacity: 0.5;
    }
    
    svg .svg-elem-1 {
    stroke-dashoffset: 677.4424205218055px;
    stroke-dasharray: 677.4424205218055px;
    /* fill: transparent; */
    -webkit-transition: stroke-dashoffset 1s cubic-bezier(0.47, 0, 0.745, 0.715) 0s,
    fill 0.7s cubic-bezier(0.47, 0, 0.745, 0.715) 0.8s;
    transition: stroke-dashoffset 1s cubic-bezier(0.47, 0, 0.745, 0.715) 0s,
    fill 0.7s cubic-bezier(0.47, 0, 0.745, 0.715) 0.8s;
    }

    svg.active .svg-elem-1 {
    stroke-dashoffset: 0;
    fill: rgb(245, 70, 138);
    }

    svg .svg-elem-2 {
    stroke-dashoffset: 301.8009033203125px;
    stroke-dasharray: 301.8009033203125px;
    /* fill: transparent; */
    -webkit-transition: stroke-dashoffset 1s cubic-bezier(0.47, 0, 0.745, 0.715) 0.12s,
    fill 0.7s cubic-bezier(0.47, 0, 0.745, 0.715) 0.9s;
    transition: stroke-dashoffset 1s cubic-bezier(0.47, 0, 0.745, 0.715) 0.12s,
    fill 0.7s cubic-bezier(0.47, 0, 0.745, 0.715) 0.9s;
    }

    svg.active .svg-elem-2 {
    stroke-dashoffset: 0;
    fill: rgb(255, 255, 255);
    }

    #animacao {
    opacity: 1;
    animation-name: fadeIn;
    animation-duration: 1s;
    animation-fill-mode: forwards;
    color: rgb(245, 70, 138);
    animation-delay: 2s;
    }

    


    @keyframes fadeIn {
    from {
        opacity: 1;
    }
    to {
        opacity: 1;
    }
    }

    



        
    </style>
    <script src="js/scriptServico-e.js"></script>
    <script src="js/menu-e.js"></script>
</body>
</html>

<?php
$onclick = "";
if(!isset($_SESSION)){
    session_start();
  }
//CRIANDO SERVIÇO (INSERT)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nm_servico = $_POST['nm_servico'];
$ds_servico = $_POST['ds_servico'];
$vl_servico = $_POST["vl_servico"];
$cd_personaliz = $_POST["cd_personaliz"];
$cd_orcament = $_POST["cd_orcament"];
$cd_local = $_POST["cd_local"];
$cd_empresa = $_SESSION['cd_empresa'];
$cd_tiposervico = $_POST['cd_tiposervico'];

$vl_servico = str_replace(',', '.', $vl_servico);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

//ULTIMA PRIMARY KEY para somar um e fazer a primary key atual, para nomear as imagens corretamente
$sql = "SELECT MAX(cd_servico) as 'ultimo' FROM tb_servico";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cd_servico = $row['ultimo'] + 1;

//CONVERSAO BASE64 PARA JPEG
$post_imgcapa = $_POST['url_imgcapa'];
$post_imgcapa = str_replace('data:image/jpeg;base64,', '', $post_imgcapa);
$post_imgcapa = str_replace(' ', '+', $post_imgcapa);
$data = base64_decode($post_imgcapa);
$nm_imgcapa = 'capa'.$cd_servico.'.jpeg';
//UPLOAD DE ARQUIVO CONVERTIDO
$caminho_capa = '../bancoImagens/servicos/' . $nm_imgcapa;
file_put_contents($caminho_capa, $data);
// construir o caminho completo para a imagem a partir do diretório raiz do projeto
$url_imgcapa = '../bancoImagens/servicos/' .$nm_imgcapa;


if(isset($_POST['url_img2'])) {
    // //CONVERSAO BASE64 PARA JPEG
    $post_img2 = $_POST['url_img2'];
    $post_img2 = str_replace('data:image/jpeg;base64,', '', $post_img2);
    $post_img2 = str_replace(' ', '+', $post_img2);
    $data = base64_decode($post_img2);
    $nm_img2 = 'img2-'.$cd_servico.'.jpeg';
    //UPLOAD DE ARQUIVO CONVERTIDO
    $caminho_img2 = '../bancoImagens/servicos/' . $nm_img2;
    file_put_contents($caminho_img2, $data);
    // construir o caminho completo para a imagem a partir do diretório raiz do projeto
    $url_img2 = '../bancoImagens/servicos/' .$nm_img2;
    $semimg2 = false;
}else {
    $semimg2 = true;
}

if(isset($_POST['url_img3'])) {
    // //CONVERSAO BASE64 PARA JPEG
    $post_img3 = $_POST['url_img3'];
    $post_img3 = str_replace('data:image/jpeg;base64,', '', $post_img3);
    $post_img3 = str_replace(' ', '+', $post_img3);
    $data = base64_decode($post_img3);
    $nm_img3 = 'img3-'.$cd_servico.'.jpeg';
    //UPLOAD DE ARQUIVO CONVERTIDO
    $caminho_img3 = '../bancoImagens/servicos/' . $nm_img3;
    file_put_contents($caminho_img3, $data);
    // construir o caminho completo para a imagem a partir do diretório raiz do projeto
    $url_img3 = '../bancoImagens/servicos/' .$nm_img3;
    $semimg3 = false;
}else {
    $semimg3 = true;
}

if ($semimg2 == false && $semimg3 == false){
    $sql = "INSERT INTO tb_servico(cd_empresa, nm_servico, ds_servico, vl_servico, cd_personaliz, cd_tiposervico, url_imgcapa, url_img2, url_img3) VALUES ($cd_empresa,'$nm_servico','$ds_servico', $vl_servico, $cd_personaliz, $cd_tiposervico, '$url_imgcapa', '$url_img2', '$url_img3')";
}else if ($semimg2 == true){
    $sql = "INSERT INTO tb_servico(cd_empresa,nm_servico, ds_servico, vl_servico, cd_personaliz, cd_tiposervico, url_imgcapa, url_img3) values ($cd_empresa,'$nm_servico','$ds_servico', $vl_servico, $cd_personaliz, $cd_tiposervico, '$url_imgcapa', '$url_img3')";
}else {
    $sql = "INSERT INTO tb_servico(cd_empresa,nm_servico, ds_servico, vl_servico, cd_personaliz, cd_tiposervico, url_imgcapa, url_img2) values ($cd_empresa,'$nm_servico','$ds_servico', $vl_servico, $cd_personaliz, $cd_tiposervico, '$url_imgcapa', '$url_img2')";
}



if ($conn->query($sql)=== TRUE){
    echo '<div id="myModal" class="modal" style="display: block;">';
    echo '<div class="modal-content">';
    echo '<svg width="215" height="215" viewBox="0 0 215 215" fill="none" xmlns="http://www.w3.org/2000/svg">
    <circle cx="107.5" cy="107.5" r="107.5" fill="#F5468A" class="svg-elem-1"></circle>
    <path d="M136.8 79.6586L136.815 79.6436L136.83 79.6282L145.249 70.8434L162.849 88.077L154.034 96.8922L104.235 146.691L95.4349 155.491L87.0309 146.722L87.0162 146.706L87.0012 146.691L65.6586 125.349L56.8284 116.519L74.062 99.2851L82.8922 108.115L82.9055 108.129L82.9191 108.142L94.4441 119.24L95.8578 120.601L97.2456 119.213L136.8 79.6586Z" fill="white" stroke="#F5468A" stroke-width="4" class="svg-elem-2"></path>
    </svg>';
    echo '<h1>Serviço criado com sucesso!</h1>';
    echo '</div>';
    echo '</div>';
    
    
    echo '<script>
            setTimeout(function() {
                window.location.href = "perfilEmpresa.php";
            }, 4000); // Redireciona após 5 segundos (5000 milissegundos)
          </script>';
    
} else{
    echo "Error: " . $sql . "<br>" .  $conn->error;
}




//CASO VCS SE ESQUEÇAM, AS IMAGENS NÃO ESTÃO SENDO EXIBIDAS, POIS NÃO ESTAMOS PEDINDO PARA ELAS SEREM EXIBIDAS, NÃO SURTEM!
$conn->close();

}


// BACK-END para salvar um serviço e finalizar sua criação com as informações enviadas pelo arquivo FRONT-END edicaoServico.html

// var_dump($_POST);



?>

<style>

        @font-face {
            font-family: 'League Spartan';
            src: url('/font/LeagueSpartan.ttf');
        }
        .modal {
          display: none; /* Oculta o modal por padrão */
          position: fixed; /* Permanece posicionado no topo da página */
          z-index: 1; /* Define a ordem de empilhamento */
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto; /* Adiciona rolagem quando o conteúdo excede a altura da janela */
          background-color: rgba(0, 0, 0, 0.5); /* Define um fundo escuro com transparência */
        }

        .modal-content h1{
            font-family: 'League Spartan'
        }
        
        .modal-content {
          background-color: #fff;
          margin: 15% auto; /* Centraliza o modal verticalmente */
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
          max-width: 600px;
          height: 80%;
          max-height: 400px;
          border-radius: 30px;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
        }

        .modal-content h2{
            font-size: 2em;
            font-weight: 600;
            width: 50%;
        }
        
        /* .close {
          color: #aaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
          cursor: pointer;
        } */
        
        /* .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        } */
        
        svg .svg-elem-1 {
          stroke-dashoffset: 677.4424205218055px;
          stroke-dasharray: 677.4424205218055px;
          fill: transparent;
          animation: strokeDash1 1s cubic-bezier(0.47, 0, 0.745, 0.715) forwards, fill1 0.7s cubic-bezier(0.47, 0, 0.745, 0.715) 0.8s forwards;
        }
        
        svg.active .svg-elem-1 {
          stroke-dashoffset: 0;
          fill: #F5468A;
        }
        
        svg .svg-elem-2 {
          stroke-dashoffset: 301.8009033203125px;
          stroke-dasharray: 301.8009033203125px;
          fill: transparent;
          animation: strokeDash2 1s cubic-bezier(0.47, 0, 0.745, 0.715) 0.12s forwards, fill2 0.7s cubic-bezier(0.47, 0, 0.745, 0.715) 0.9s forwards;
        }
        
        svg.active .svg-elem-2 {
          stroke-dashoffset: 0;
          fill: rgb(255, 255, 255);
        }
        
        @keyframes strokeDash1 {
          to {
            stroke-dashoffset: 0;
          }
        }
        
        @keyframes fill1 {
          to {
            fill: #F5468A;
          }
        }
        
        @keyframes strokeDash2 {
          to {
            stroke-dashoffset: 0;
          }
        }
        
        @keyframes fill2 {
          to {
            fill: rgb(255, 255, 255);
          }
        }
    </style>