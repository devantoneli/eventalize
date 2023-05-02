<?php
if(!isset($_SESSION)){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/criarPostagem-e.css">
    <link rel="icon" href="../img/index/logo.png">
    <title>Selecionar Pedido - Eventalize</title>
</head>
<body>

    <!--INICIO MENU EMPRESA -->
    <div class="bg-gradPrincipal menuEmpresa">
        <header class="alinhaElementos">
            <div id="logoImagem"></div>
            
            <ul class="opcoesMenu">
                <li class=""><a href="#" class="opcaoMenu" aria-current="page">Seu portfólio</a></li>
                <li class="nav-item"><a href="#" class="opcaoMenu">Pedidos</a></li>
                <li class="nav-item"><a href="#" class="opcaoMenu">Suas postagens</a></li>
                <li class="nav-item"><a href="#" class="opcaoMenu">Mensagens</a></li>
            </ul>
        
            <div class="alinhaLogo">
                <button class="botaoSeta" id="iconSeta">
                <svg xmlns="http://www.w3.org/2000/svg" width="70%" height="70%" fill="currentColor" class="bi bi-chevron-down setaMenu" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
                </button>

                <section id="menu">
                    <a href=""><h4>Pedidos</h4></a>
                    <a href=""><h4>Serviços e Pacotes</h4></a>
                    <a href=""><h4>Mensagens</h4></a>
                    <a href=""><h4>Pontuações</h4></a>
                    <a href=""><h4>Configurações</h4></a>
                </section>

                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-bell-fill opcaoMenu" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>

                <div id="inserirPerfil"></div>

                <section id="menuPerfil">
                    <a href=""><h4>Perfil</h4></a>
                    <a href=""><h4>Postagens</h4></a>
                    <a href=""><h4>Estatísticas de venda</h4></a>
                    <a href="../index.html"><h4>Sair</h4></a>
                </section>
            </div>
        </header>
    </div>
    <!--FIM MENU EMPRESA -->


    <div class="grid-Principal">
        <div class="cardSelecaoPedido">
            <h1>Selecione um pedido para começar</h1>
            <form action="selecaoPedido-e.php" method="post">
                <div class="inputPesquisa">
                    <!-- <input type="text" name="cd_empresa" placeholder="Código da empresa"> -->
                    <input class="pesquisarInput" type="text" name="nm_cliente" placeholder="Pesquisar pedido">
                    <div class="botaoPesquisaPedido">
                        <button type="submit">Pesquisar</button>
                    </div>
                </div>
            </form>  

<?php

//NESSE ARQUIVO, ESTAREMOS SELECIONANDO O PEDIDO QUE A EMPRESA DESEJA FAZER A POSTAGEM

if(isset($_POST["nm_cliente"])){
    $nm_cliente = $_POST["nm_cliente"];
    }else {
        $nm_cliente = "";
    }
    $cd_empresa = $_SESSION['cd_empresa'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM vwpedidocliente WHERE nm_cliente LIKE '%$nm_cliente%'";

$result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));
$row = mysqli_fetch_assoc($result_query);

if(mysqli_num_rows($result_query) > 0){
    while($row = mysqli_fetch_assoc($result_query)){
        if($row["cd_empresa"]==$cd_empresa){
        echo
        '<div class="cards">
            <div class="card">
            <div class="cardConteudo">
            <img src="../bancoImagens/empresas/pedido.svg" alt="">
            
        <div class="infoCard">
             <p>Pedido nº' . $row["cd_pedido"] .'</p>
             <h2>' .$row["nm_cliente"] .'</h2>
             <p>' . $row["dt_pedido"] . '</p>
             <a href="">Mais detalhes desse pedido</a>
        </div>

        <div class="precoPedido">
            <h1>R$' . $row["vl_pedido"] . '</h1>
            <form action="criarPostagem.php">
            <input type="hidden" value= '.$row["cd_pedido"] . ' name="cd_pedido">
            <button type="submit" class="botaoPedido">Selecionar Pedido</button>
            </form>
        </div>
    </div>
</div>';
        }
}
    }else{
        $sql = "SELECT * FROM vwpedidocliente WHERE nm_cliente LIKE '%$nm_cliente%'";
        $result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));
        $row = mysqli_fetch_assoc($result_query);
        if(mysqli_num_rows($result_query) > 0){
            while($row = mysqli_fetch_assoc($result_query)){
                if($row["cd_empresa"]==$cd_empresa){
                echo
        '<div class="cards">
            <div class="card">
            <div class="cardConteudo">
            <img src="../bancoImagens/empresas/pedido.svg" alt="">
            
        <div class="infoCard">
             <p>Pedido nº' . $row["cd_pedido"] .'</p>
             <h2>' .$row["nm_cliente"] .'</h2>
             <p>' . $row["dt_pedido"] . '</p>
             <a href="">Mais detalhes desse pedido</a>
        </div>

        <div class="precoPedido">
            <h1>R$' . $row["vl_pedido"] . '</h1>
            <form action="criarPostagem.php">
            <input type="hidden" value= '.$row["cd_pedido"] . ' name="cd_pedido">
            <button type="submit" class="botaoPedido">Selecionar Pedido</button>
            </form>
        </div>
        </div>
    </div>';}
            }
        }else {
            echo"Nenhum registro encontrado.";
        }
}
    
?>

                </div>
            </div>
        </div>
    </div>


      <script>
var checkboxes = document.querySelectorAll('input[name="cardSelecao"]');
var selectedCheckbox = null;

for (var i = 0; i < checkboxes.length; i++) {
  checkboxes[i].addEventListener('click', function() {
    if (this === selectedCheckbox) {
      // desmarca a checkbox selecionada atualmente
      this.checked = false;
      selectedCheckbox = null;
    } else {
      // desmarca a checkbox selecionada anteriormente (se houver)
      if (selectedCheckbox) {
        selectedCheckbox.checked = false;
      }
      
      // marca a checkbox selecionada
      this.checked = true;
      selectedCheckbox = this;
    }
  });
}





      </script>
      <script src="js/menu-e.js"></script>
</body>
</html>