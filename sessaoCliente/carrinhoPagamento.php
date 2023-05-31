<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sessaoCliente/css/menu-c.css">
    <link rel="stylesheet" href="css/carrinhoPagamento.css">
    <link rel="stylesheet" href="css/carrinhoLocal.css">
    <link rel="icon" href="../img/icones/logo.png">
    <title>Finalizando Compra</title>
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
          <button class="menuIcon" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
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

  <div class="inicioCarrinhoLocal">
    <div class="formPagamento">
        <h3>Forma de Pagamento</h3>
        <div >
            <form method="post" id="myForm">
            <select name="escolha" class="selecionaPagamento" onchange="submitForm()">
                <option value="0" >Selecione uma forma</option>
                <option value="1" >Cartão de Crédito</option>
                <option value="2">Cartão de Débito</option>
                <option value="3">Pix</option>
              </select>
              <!-- <input type="submit" value="enviar"> -->
            </form>

            
        </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcao = $_POST["escolha"];

    if ($opcao == "0") {
    echo'';
    }elseif ($opcao == "1") {
      echo "<div class='formCredito'>
      <input type='text' placeholder='Nome do Titular'>
      <div class='formdiv1'>
          <input type='number' placeholder='Número do Cartão'>
          <input type='number' placeholder='CVV' style='padding-left: 8%;'>
      </div>
      <input type='text' placeholder='Data de validade (MM/AA)'>
  </div>

  <div class='divParcela'>
      <h3>Deseja parcelar sua compra?</h3>
      <div>
          <select name='escolha' class='selecionaParcela'>
              <option  selected disabled>Selecione quantas vezes deseja parcelar</option>
              <option value='opcao1'>Parcelar em 1x</option>
              <option value='opcao2'>Parcelar em 2x</option>
              <option value='opcao3'>Parcelar em 3x</option>
              <option value='opcao4'>Parcelar em 4x</option>
              <option value='opcao5'>Parcelar em 5x</option>
              <option value='opcao6'>Parcelar em 6x</option>
            </select> 
      </div>
  </div>'";
    } elseif ($opcao == "2") {
      echo "<div class='formCredito'>
      <input type='text' placeholder='Nome do Titular'>
      <div class='formdiv1'>
          <input type='number' placeholder='Número do Cartão'>
          <input type='number' placeholder='CVV' style='padding-left: 8%;'>
      </div>
      <input type='text' placeholder='Data de validade (MM/AA)'>
  </div>";
    } elseif ($opcao == "3") {
      echo "Implementar API do Pix";
    } else {
      echo "Opção inválida.";
    }
  }
?>
    
    </div>

    <hr class="hrVertical">

    <div class="ladoCarrinho">
        <div class="tituloCarrinho">
            <h3>Carrinho</h3>
        </div>
        <div class="cardProduto">
            <div class="cardInfo">
                <img src="../bancoImagens/empresas/confeiteira.jpg" alt="">
                <div class="infoEmpresa">
                    <h3>Confete Doces</h3>
                    <div class="perfilEmpresa">
                        <img src="../bancoImagens/empresas/fotoempresa.jpg" alt="">
                        <h3>Bianca Almeida</h3>
                        <h6>Comida</h6>
                    </div>
                </div>
                <div class="precoProduto">
                    <h3>R$ 1200,00</h3>
                </div>
                <div class="iconDeletar">
                    <span>&#x2716;</span>
                </div>
            </div>
        </div>

        <div class="cardProduto">
            <div class="cardInfo">
                <img src="../bancoImagens/empresas/confeiteira.jpg" alt="">
                <div class="infoEmpresa">
                    <h3>Confete Doces</h3>
                    <div class="perfilEmpresa">
                        <img src="../bancoImagens/empresas/fotoempresa.jpg" alt="">
                        <h3>Bianca Almeida</h3>
                        <h6>Comida</h6>
                    </div>
                </div>
                <div class="precoProduto">
                    <h3>R$ 1200,00</h3>
                </div>
                <div class="iconDeletar">
                    <span>&#x2716;</span>
                </div>
            </div>
        </div>

        <div class="precoTotal">
            <h3>Total: R$ 2400,00</h3>
        </div>

        <div class="botoesEndereco">
            <button id="voltar">Voltar</button>
            <button id="continuar">Continuar</button>
        </div>
    </div>

    
  </div>


  <script src="../sessaoCliente/js/menu-c.js"></script>
  <script src="js/lupa.js"></script>
  <script src="js/carrinho.js"></script>

  <script>
function submitForm() {
    document.getElementById("myForm").submit();
}
</script>

</body>
</html>
  