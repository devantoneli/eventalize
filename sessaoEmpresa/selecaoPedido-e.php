<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="icon" href="/img/index/logo.png">
    <link rel="stylesheet" href="css/criarPostagem-e.css">
    <title>Selecionar Pedido - Eventalize</title>
</head>
<body>
    <!-- MENU EMPRESA -->

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
                    <a href=""><h4>Perfil</h4></a>
                    <a href=""><h4>Mensagens</h4></a>
                    <a href=""><h4>Pontuações</h4></a>
                    <a href=""><h4>Configurações</h4></a>
                </section>

                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-bell-fill opcaoMenu" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>

                <div id="inserirPerfil"></div>

                <section id="menuPerfil">
                    <a href=""><h4>Configurações de perfil</h4></a>
                    <a href=""><h4>Postagens</h4></a>
                    <a href=""><h4>Estatísticas de venda</h4></a>
                    <a href="../index.html"><h4>Sair</h4></a>
                </section>
            </div>
        </header>
    </div>

    <div class="grid-Principal">
        <div class="cardSelecaoPedido">
            <h1>Selecione um pedido para começar</h1>
            <form action="selecaoPedido-e.php" method="post">
                <div class="inputPesquisa">
                    <!-- <input type="text" name="cd_empresa" placeholder="Código da empresa"> -->
                    <input type="text" name="nm_cliente" placeholder="Pesquisar pedido">
                    <div class="botaoPesquisaPedido">
                        <button type="submit">Pesquisar</button>
                    </div>
                </div>
            </form>

                    
                    <?php

//NESSE ARQUIVO, ESTAREMOS SELECIONANDO O PEDIDO QUE A EMPRESA DESEJA FAZER A POSTAGEM

$nm_cliente = $_POST["nm_cliente"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM vwpedidocliente WHERE nm_cliente LIKE '%$nm_cliente%'";

$result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));
$row = mysqli_fetch_assoc($result_query);

if(mysqli_num_rows($result_query) > 0){
    while($row = mysqli_fetch_assoc($result_query)){
        echo
        '<div class="cards">
            <div class="card">
            <input type="checkbox" name="cardSelecao" class="cardSelecao" value="' . $row['cd_pedido'] . '>
            <div class="cardConteudo">
            <img src="../bancoImagens/empresas/pedido.svg" alt="">
        <div class="infoCard">
            
             <p>Pedido nº' . $row["cd_pedido"] .'</p>
             <h2>' .$row["nm_cliente"] .'</h2>
             <p>' . $row["dt_pedido"] . '</p>
             <p>Mais detalhes desse pedido</p>
        </div>
        <div class="precoPedido">
            <h1>R$' . $row["vl_pedido"] . '</h1>
        </div>
    </div>
</div>';
}
    }else{
        echo "Nenhum registro encontrado";
}

$checkboxes = $_POST['cardSelecao'];

foreach ($checkboxes as $checkbox){
    //verifica se o valor da checkbox é igual a 1
    if($checkbox == '1'){
        echo $row['cd_pedido'];
    }
}
    
?>
                
                <!-- <div class="card">
                    <input type="checkbox" name="cardSelecao" class="cardSelecao">
                    <div class="card-content">
                    <h2>Card 2</h2>
                    <p>Some content here</p>
                    </div>
                </div>
                
                <div class="card">
                    <input type="checkbox" name="cardSelecao" class="cardSelecao">
                    <div class="card-content">
                    <h2>Card 3</h2>
                    <p>Some content here</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
 


      <script>
        var checkboxes = document.querySelectorAll('input[name="cardSelecao"]');

for (var i = 0; i < checkboxes.length; i++) {
  checkboxes[i].addEventListener('click', function() {
    // uncheck all checkboxes
    for (var j = 0; j < checkboxes.length; j++) {
      checkboxes[j].checked = false;
    }
    
    // check the clicked checkbox
    this.checked = true;
  });
}

      </script>
      <script src="js/menu-e.js"></script>
</body>
</html>