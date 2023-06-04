<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sessaoCliente/css/menu-c.css">
    <link rel="stylesheet" href="css/contrato.css">
    <link rel="icon" href="../img/icones/logo.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <title>Contrato - Eventalize</title>
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
            <a href="">Sair</a>
        </section>
  </div>
  </div>
        
        <div class="inicioContrato">
            <div>
            <div class="iconContrato">
                <img src="../img/icones/icon-contrato.svg" alt="">
            </div>
            <div class="iconContrato2">
                <img src="../img/icones/icon-info-contrato.svg" alt="">
            </div>
            </div>
            <div class="inicioTexto" id="conteudo">
                <div class="titulo">
                    <h3>Contrato de um Serviço</h3>
                </div>
                <div class="textoContrato">
                    <h4>	Lorem ipsum cras risus fermentum ornare suspendisse est volutpat viverra, himenaeos morbi sapien tristique vitae leo eros. curabitur convallis nullam vestibulum leo eleifend elementum donec enim iaculis, proin ipsum aenean litora suspendisse quisque porta elit donec porttitor, ac iaculis feugiat sit luctus vestibulum scelerisque semper. sociosqu nostra pulvinar mauris varius facilisis egestas litora iaculis dolor, ornare in molestie laoreet aenean sed fringilla lacinia velit sollicitudin, adipiscing egestas orci ut class a curabitur sed. phasellus mauris augue rutrum bibendum odio molestie euismod enim lorem, proin augue nulla arcu fermentum duis tempor dictumst, commodo euismod felis dui purus scelerisque nisl magna. 

                        Consequat ut porttitor fermentum metus a dapibus mollis, ultrices sociosqu bibendum sapien pretium quisque, tortor vitae fringilla integer orci rutrum. urna malesuada gravida enim fermentum curae integer odio, porttitor libero ut purus venenatis ornare quis, ad sed praesent a inceptos purus. senectus sed sociosqu maecenas rhoncus netus sodales maecenas nec viverra purus, quisque facilisis aliquam praesent ipsum diam taciti luctus laoreet dolor, himenaeos integer proin mi aliquam lacinia potenti sollicitudin aptent. gravida tempor at consectetur sit fringilla lacinia ac justo ad mattis, congue eleifend donec faucibus ut curae malesuada nisl viverra, nunc metus curabitur condimentum viverra curae interdum nec aliquam. 
                    
                        Laoreet torquent mauris porta quisque adipiscing semper tristique primis, sit tristique pretium donec litora et aliquam ut, fames gravida euismod sagittis etiam urna amet. nibh est eros cras lobortis phasellus blandit amet enim venenatis urna est eget, nulla fusce quis sem habitasse eget elit ad etiam ad. quisque lacinia donec quisque lacinia posuere semper arcu nulla tristique erat suspendisse taciti id, potenti porta donec quisque aptent odio iaculis congue dictum posuere hac sed. quisque dolor commodo malesuada faucibus nisl felis sociosqu mi vestibulum, fringilla auctor curae maecenas tempor habitasse curabitur fames enim arcu, quam inceptos pulvinar posuere netus curabitur leo scelerisque. </h4>
                </div>
                <div class="assinaturas">
                    <div class="assCliente">
                        <h3>Ana Luiza Barros</h3>
                        <hr>
                        <h6>Assinatura do Cliente</h6>
                    </div>
                    <div class="assEmpresa">
                        <button onclick="generatePDF()">Assinar Contrato</button>
                        <hr>
                        <h6>Assinatura da Empresa</h6>
                    </div>
                </div>
            </div>

        
        </div>

        <script>
            function generatePDF() {
                const element = document.getElementById('conteudo');
                html2pdf()
                    .from(element)
                    .save('contrato.pdf');
            }
        </script>


  <script src="../sessaoCliente/js/menu-c.js"></script>

  </body>
  </html>