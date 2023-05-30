<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sessaoCliente/css/menu-c.css">
    <link rel="stylesheet" href="css/carrinhoPagamento.css">
    <link rel="icon" href="../img/icones/logo.png">
    <title>Finalizando Compra</title>
    </head>
<body>

    <!-- INICIO MENU CLIENTE -->
<div class="grid-container">
    <div class="header">
      <div class="logo">
          <img src="../img/icones/logoBranca.svg" alt="">
      </div>
      <div class="menu">
          <a href="">Início</a>
          <a href="">Feed</a>
          <a href="">Mensagens</a>
          <a href="">Seus Pedidos</a>
      </div>
  
      <div class="headerPesquisa">
            <input type="text" placeholder="Procure Serviços">
            <img src="../img/icones/icon-lupa.svg" alt="" width="30px">
          </div>
          <div class="headerClientePerfil" >
              <!-- <div class="iconCliente"> -->
                  <a href="#" class="carrinho"><img src="../img/icones/icon-carrinho.svg" alt="Carrinho"></a>
                  <a href="#" class ="notificacao"><img src="../img/icones/icon-notificacao.svg" alt="Notificações"></a>
                <!-- </div> -->
          <button class="menuIcon" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
          </div>
          <section class="menuPerfil">
            <a href="">Perfil</a>
            <a href="">Postagens</a>
            <a href="" style="margin-bottom: 20%">Histórico de Compras</a>
            <a href="">Configurações</a>
            <a href="">Sair</a>
        </section>
  </div>
  </div>

  <div class="inicioCarrinhoLocal">
    <div class="formPagamento">
        <h3>Forma de Pagamento</h3>
        <div >
            <form method="post" >
            <select name="escolha" class="selecionaPagamento">
                <option value="0" >Selecione uma forma</option>
                <option value="1" >Cartão de Crédito</option>
                <option value="2">Cartão de Débito</option>
                <option value="3">Pix</option>
              </select>
              <input type="submit" value="enviar">
            </form>
        </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcao = $_POST["escolha"];

    if ($opcao == "0") {
    echo'';
    }elseif ($opcao == "1") {
      echo "Você selecionou a Opção 1.";
    } elseif ($opcao == "2") {
      echo "Você selecionou a Opção 2.";
    } elseif ($opcao == "3") {
      echo "Você selecionou a Opção 3.";
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

</body>
</html>
  