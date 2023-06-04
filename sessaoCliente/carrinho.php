<?php
session_start();
include('../protect.php');

if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cd_servico = $_POST['cd_servico'];
    $_SESSION['carrinho'][] = $cd_servico;

    if (isset($_POST['opcao'])) {
      $opcoes = $_POST['opcao'];
      $_SESSION['opcoes'] = $opcoes;
      header('Location: carrinhoLocal.php');
      exit;
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
    $sql = "SELECT s.nm_servico,s.cd_servico, s.vl_servico,s.url_imgcapa, e.cd_empresa, e.nm_fantasia, e.url_fotoperfil
    FROM tb_servico as s
    JOIN tb_empresa e ON e.cd_empresa = s.cd_empresa
    WHERE s.cd_servico IN ($carrinho) ORDER BY s.cd_empresa";
    $result = $conn->query($sql);
}else {
  $result = NULL;
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
              <form action="carrinho.php" id="botaoCarrinho">
                    <a href="#" class="carrinho"><img src="../img/icones/icon-carrinho.svg" alt="Carrinho" onclick="submitButton()"></a>
                </form>
                  <a href="#" class ="notificacao"><img src="../img/icones/icon-notificacao.svg" alt="Notificações"></a>
          <button class="menuIcon2" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
          </div>
          <section class="menuPerfil">
            <a href="perfil-c.php">Perfil</a>
            <a href="">Configurações</a>
            <a href="../logout.php">Sair</a>
        </section>
  </div>
</div>

  <div class="inicioCarrinho">
    <div class="tituloCarrinho">
      <h3>Meu Carrinho</h3>
    </div>
    <div class="textoSelecione">
      <h3>Selecione seus serviços para prosseguir com a compra.</h3>
    </div>
  
  
  <!-- INICIO PEDIDOS NO CARRINHO -->
  <?php
   $cd_empresa_anterior=null;
   if($result != NULL){
    echo '</div>';
    if ($result->num_rows > 0) {
      echo '<form class="gridPrinc" action="carrinhoLocal.php" method="post">';
      while ($row = $result->fetch_assoc()) {
  
        $cd_empresa_atual = $row['cd_empresa'];
        $cd_servico = $row['cd_servico'];
       
        
        if ($cd_empresa_atual != $cd_empresa_anterior) {
            // Iniciar uma nova div para a nova empresa
            if ($cd_empresa_anterior !== null) {
                // Fechar a div anterior, se não for a primeira empresa
                echo '</div></div>';
            }
            // Abrir a div para a nova empresa
            echo '<div><div class="pedidoEmpresa">';
            if ($row['url_fotoperfil']==''){
              echo'<img src="https://img.freepik.com/icones-gratis/galeria_318-583145.jpg?size=626&ext=jpg&ga=GA1.2.1135653598.1681429464&semt=ais" alt="">';
            }else{
              echo'<img src="'.$row['url_fotoperfil'].'" alt="">';
            }
            
            echo'<h3>'.$row['nm_fantasia'].'</h3></div>
            <div class="selecionaItem">';
            echo '';
        }
    
        // Exibir o serviço dentro da div da empresa
        echo '<div>
        <input type="checkbox" class="add-to-cart" name="opcao[]" value="'.$row['cd_servico'].' id="'.$row['cd_servico'].'">
        
        </div>
        <div class="imgPedido">';
  
        if ($row['url_imgcapa']==''){
          echo'<img src="https://img.freepik.com/icones-gratis/galeria_318-583145.jpg?size=626&ext=jpg&ga=GA1.2.1135653598.1681429464&semt=ais" alt="">';
        }else{
          echo'<img src="'.$row['url_imgcapa'].'" alt="">';
        }
        
        echo'</div>
        <div>
        <div class="infoPedido"> 
        <h1>'.$row['nm_servico'].'</h1>
        <h3>R$ '.$row['vl_servico'].'</h3>
        </div>
        </div>';
    
        $cd_empresa_anterior = $cd_empresa_atual;
        }
        
        // Fechar a última div
        if ($cd_empresa_anterior !== null) {
            echo '</div>';
  
      }
      echo '<input type="submit" class="continuar" value="Continuar">
      </form>';
  }
   }
 else {
  echo "<br><h1>Nenhum servico adicionado ao carrinho.</h1></div>";
  }
  ?>
  
  
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

        
  