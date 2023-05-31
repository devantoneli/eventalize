<?php
session_start();
include('../protect.php');
if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cd_pacote = $_POST['cd_pacote'];
    $_SESSION['carrinho'][] = $cd_pacote;

    if (isset($_POST['opcao'])) {
      $opcoes = $_POST['opcao'];
      $_SESSION['opcoes'] = $opcoes;
      header('Location: carrinhoLocal.php');
      exit;
    } else {
      // Nenhuma opção foi selecionada, você pode exibir uma mensagem de erro ou tomar outra ação
      echo "Nenhuma opção selecionada.";
    }
}

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_eventalize";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

if (!empty($_SESSION['carrinho'])) {
    
    $carrinho = implode(",", $_SESSION['carrinho']);
    $sql = "SELECT p.nm_pacote,p.cd_pacote, p.vl_pacote,p.url_imgcapa, e.nm_fantasia, e.url_fotoperfil
    FROM tb_pacote as p
    JOIN tb_pacoteservico ps ON ps.cd_pacote = p.cd_pacote
    JOIN tb_servico s ON ps.cd_servico = s.cd_servico
    JOIN tb_empresa e ON e.cd_empresa = s.cd_empresa
    WHERE p.cd_pacote IN ($carrinho)";
    // echo $carrinho;
    $result = $conn->query($sql);
}
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu-c.css">
    <link rel="stylesheet" href="css/carrinho.css">
    <link rel="icon" href="../img/icones/logo.png">
    <title>Meu Carrinho</title>
    </head>
<body>

    <!-- INICIO MENU CLIENTE -->
<div class="grid-container">
    <div class="header">
      <div class="logo">
        <a href="index-c.php"><img src="../img/icones/logoBranca.svg" alt=""></a>
      </div>
      <div class="menu">
          <a href="index-c.php">Início</a>
          <a href="../sessaoUsuario/explore.php">Feed</a>
          <a href="chatCliente.php">Mensagens</a>
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
              <form action="carrinho.php" id="botaoCarrinho">
                    <a href="#" class="carrinho"><img src="../img/icones/icon-carrinho.svg" alt="Carrinho" onclick="submitButton()"></a>
                </form>
                  <a href="#" class ="notificacao"><img src="../img/icones/icon-notificacao.svg" alt="Notificações"></a>
                <!-- </div> -->
          <button class="menuIcon2" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
          </div>
          <section class="menuPerfil">
            <a href="perfil-c.php">Perfil</a>
            <!-- <a href="">Postagens</a> -->
            <!-- <a href="" style="margin-bottom: 20%">Histórico de Pedidos</a> -->
            <a href="">Configurações</a>
            <a href="">Sair</a>
        </section>
  </div>
  </div>
  

  <!-- INICIO TEXTO CARRINHO -->
  <!-- <div class="inicioCarrinho">
  <div class="tituloCarrinho">
    <h3>Meu Carrinho</h3>
  </div>
  <div class="textoSelecione">
    <h3>Selecione seus pedidos para prosseguir com a compra.</h3>
  </div>
</div> -->

  <!-- INICIO PEDIDOS NO CARRINHO -->

  <!-- <div class="pedidoEmpresa">
      <img src="../bancoImagens/empresas/confeiteira.jpg" alt="">
      <h3>Smash Party</h3>
  </div>

  <div class="selecionaItem">
  <div>
    <input type="radio">
  </div>
    <div class="imgPedido">
      <img src="../bancoImagens/postagens/capa53.jpeg" alt=""> 
    </div>
    <div>
     <div class="infoPedido"> 
    <h1>Aluguel de casa noturna de 10 horas, no dia 30 de Junho.</h1>
    <h3>R$ 850,00</h3>
      </div>
  </div>
  </div>
  <div class="selecionaItem">
  <div>
    <input type="radio">
  </div>
    <div class="imgPedido">
      <img src="../bancoImagens/postagens/capa53.jpeg" alt=""> 
    </div>
    <div>
     <div class="infoPedido"> 
    <h1>Aluguel de casa noturna de 10 horas, no dia 30 de Junho.</h1>
    <h3>R$ 850,00</h3>
      </div>
  </div>
  </div>
  <div class="pedidoEmpresa">
      <img src="../bancoImagens/empresas/confeiteira.jpg" alt="">
      <h3>Smash Party</h3>
  </div>

  <div class="selecionaItem">
  <div>
    <input type="radio">
  </div>
    <div class="imgPedido">
      <img src="../bancoImagens/postagens/capa53.jpeg" alt=""> 
    </div>
    <div>
     <div class="infoPedido"> 
    <h1>Aluguel de casa noturna de 10 horas, no dia 30 de Junho.</h1>
    <h3>R$ 850,00</h3>
      </div>
  </div>
  </div>
  <div class="selecionaItem">
  <div>
    <input type="radio">
  </div>
    <div class="imgPedido">
      <img src="../bancoImagens/postagens/capa53.jpeg" alt=""> 
    </div>
    <div>
     <div class="infoPedido"> 
    <h1>Aluguel de casa noturna de 10 horas, no dia 30 de Junho.</h1>
    <h3>R$ 850,00</h3>
      </div>
  </div>
  </div>

  <div class="produtoSelecionado">
    <h3>Carrinho</h3>
    <div id="itensCarrinho"></div>
  </div> -->

  <div class="inicioCarrinho">
    <div class="tituloCarrinho">
      <h3>Meu Carrinho</h3>
    </div>
    <div class="textoSelecione">
      <h3>Selecione seus pedidos para prosseguir com a compra.</h3>
    </div>
  </div>
  
  <!-- INICIO PEDIDOS NO CARRINHO -->
  <?php
  if ($result->num_rows > 0) {
    echo '<form action="carrinhoLocal.php" method="post">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="pedidoEmpresa">
        <img src="'.$row['url_fotoperfil'].'" alt="">
        <h3>'.$row['nm_fantasia'].'</h3>
      </div>
      
      <div class="selecionaItem">
        <div>
          <input type="checkbox" class="add-to-cart" name="opcao[]" value="'.$row['cd_pacote'].' id="'.$row['cd_pacote'].'">
          '.$row['cd_pacote'].'
        </div>
        <div class="imgPedido">
          <img src="'.$row['url_imgcapa'].'" alt=""> 
        </div>
        <div>
          <div class="infoPedido"> 
            <h1>'.$row['nm_pacote'].'</h1>
            <h3>R$ '.$row['vl_pacote'].'</h3>
          </div>
        </div>
      </div>';
    }
    echo '<input type="submit">
    </form>';
} else {
  echo "Nenhum pacote selecionado no carrinho.";
  }
  ?>
  
  
  <!-- <div class="selecionaItem">
    <div>
      <input type="radio" class="add-to-cart">
    </div>
    <div class="imgPedido">
      <img src="../bancoImagens/postagens/capa53.jpeg" alt=""> 
    </div>
    <div>
      <div class="infoPedido"> 
        <h1>Aluguel de casa noturna de 10 horas, no dia 30 de Junho.</h1>
        <h3>R$ 850,00</h3>
      </div>
    </div>
  </div>
  
  <div class="pedidoEmpresa">
    <img src="../bancoImagens/empresas/confeiteira.jpg" alt="">
    <h3>Smash Party</h3>
  </div>
  
  <div class="selecionaItem">
    <div>
      <input type="radio" class="add-to-cart">
    </div>
    <div class="imgPedido">
      <img src="../bancoImagens/postagens/capa53.jpeg" alt=""> 
    </div>
    <div>
      <div class="infoPedido"> 
        <h1>Aluguel de casa noturna de 10 horas, no dia 30 de Junho.</h1>
        <h3>R$ 850,00</h3>
      </div>
    </div>
  </div>
  
  <div class="selecionaItem">
    <div>
      <input type="radio" class="add-to-cart">
    </div>
    <div class="imgPedido">
      <img src="../bancoImagens/postagens/capa53.jpeg" alt=""> 
    </div>
    <div>
      <div class="infoPedido"> 
        <h1>Aluguel de casa noturna de 10 horas, no dia 30 de Junho.</h1>
        <h3>R$ 850,00</h3>
      </div>
    </div>
  </div>

  <div class="botaoPosicao">
    <button class="botaoSelecionar">Selecionar</button>
  </div>
  
  <div class="produtoSelecionado">
    <h1>Carrinho</h1>
    <div id="itensCarrinho"></div>
  </div> -->
  
  <script>
    function addCarrinho() {
      const nomeProduto = this.parentNode.parentNode.querySelector('.infoPedido h1').textContent;
      const itemCarrinho = document.createElement('div');
      itemCarrinho.classList.add('itensCarrinho');
      itemCarrinho.innerHTML = `<div class="selecionaItem">
        <div>
          <input type="radio" class="add-to-cart">
        </div>
        <div class="imgPedido">
          <img src="../bancoImagens/postagens/capa53.jpeg" alt=""> 
        </div>
        <div>
          <div class="infoPedido"> 
            <h1>${nomeProduto}</h1>
            <span class="removerBotao">Deletar</span>
            <h3>R$ 850,00</h3>
          </div>
        </div>
      </div>`;
      document.getElementById('itensCarrinho').appendChild(itemCarrinho);
      bindRemoveButton(itemCarrinho.querySelector('.removerBotao'));
    }
  
    function removerDoCarrinho() {
      const itemCarrinho = this.parentNode.parentNode;
      itemCarrinho.parentNode.removeChild(itemCarrinho);
    }
  
    function bindAdicionarNoCarrinho(input) {
      input.addEventListener('click', addCarrinho);
    }
  
    function bindRemoveButton(input) {
      input.addEventListener('click', removerDoCarrinho);
    }
  
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(bindAdicionarNoCarrinho);
  
    const removeButtons = document.querySelectorAll('.removerBotao');
    removeButtons.forEach(bindRemoveButton);
  </script>

  
  
  

  <!-- <script>
    function addCarrinho (){
      const nomeProduto = this.parentNode.queryselector('h1').textContent;
      const itemCarrinho = document.createElement('div');
      itemCarrinho.classList.add('itennsCarrinho');
      itemCarrinho.innerHTML = `<div class="selecionaItem">
  <div>
    <input type="radio">
  </div>
    <div class="imgPedido">
      <img src="../bancoImagens/postagens/capa53.jpeg" alt=""> 
    </div>
    <div>
     <div class="infoPedido"> 
    <h1>${nomeProduto}</h1>
    <span class="removerBotao">Deletar</span>
    <h3>R$ 850,00</h3>
      </div>
  </div>
  </div>`
  document.querySelector('itensCarrinho').appendChild(itemCarrinho);
  bindRemoveButton(itemCarrinho.querySelector('.removerBotao'))
    }

    function removerDoCarrinho(){
      const itemCarrinho = this.parentNode;
      itemCarrinho.parentNode.removeChild(itemCarrinho);
    }

    function bindAdicionarNoCarrinho (input){
      input.addEventListener('click', AdicionarNoCarrinho)
    }

    function bindRemoveButton(input){
      input.addEventListener('click', removerDoCarrinho)
    }

    const addToCartButton = document.querySelectorAll('add-to-cart');
    addToCartButton.forEach(bindAdicionarNoCarrinho);

    const removeButton = document.querySelectorAll('remover.Botao');
    removeButton.forEach(bindRemoveButton);

  </script> -->

 
  



  <script src="../sessaoCliente/js/menu-c.js"></script>
  <script src="js/lupa.js"></script>
  <script src="js/carrinho.js"></script>
  </body>
</html>

        
  