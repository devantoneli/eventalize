<?php

if(!isset($_SESSION)){
    session_start();
}

$cd_cliente = $_SESSION['cd_cliente'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$sql=" SELECT DISTINCT p.cd_pedido, c.nm_cliente, p.dt_pedido, p.nm_status, s.cd_personaliz,
s.nm_servico, s.ds_servico, s.vl_servico, s.url_imgcapa, e.nm_fantasia, p.cd_infopagamento
FROM tb_pedido p
INNER JOIN tb_cliente c ON p.cd_cliente = c.cd_cliente
INNER JOIN tb_empresa e ON p.cd_empresa = e.cd_empresa
INNER JOIN tb_servicopedido sp ON p.cd_pedido = sp.cd_pedido
INNER JOIN tb_servico s ON sp.cd_servico = s.cd_servico
WHERE p.cd_cliente = $cd_cliente ORDER BY p.dt_pedido";
 $result=$conn->query($sql);
 $row=$result->fetch_assoc();

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
                  
          <button class="menuIcon2" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
          </div>
          <section class="menuPerfil">
            <a href="perfil-c.php">Perfil</a>
            <a href="">Configurações</a>
            <a href="../logout.php">Sair</a>
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
                    <h4>	Este Contrato de Prestação de Serviços para Eventos ("Contrato") é celebrado entre a Empresa <?php echo $row['nm_fantasia']?>, doravante denominada "Prestadora de Serviços", e o Cliente <?php echo($_SESSION['nm_cliente'])?>, doravante denominado "Cliente", em conjunto referidos como "Partes".

                    Objeto do Contrato
                    1.1 A Prestadora de Serviços compromete-se a fornecer os serviços relacionados à organização e execução do evento, a ser realizado na data do Evento, no local previsto.
                    1.2 Os serviços incluem, mas não se limitam a: <?php echo $row['ds_servico']?>

                    Pagamento
                    2.1 O Cliente concorda em efetuar o pagamento à Prestadora de Serviços de acordo com as seguintes condições:
                    a- <?php echo $row['vl_servico']?> deverá ser pago totalmente.
                    b- O pagamento será efetuado através de pix.
                    c- Em caso de não pagamento, no todo ou em parte, pela Prestadora de Serviços, o valor total será reembolsado ao Cliente.
                    d- Em caso de não pagamento, no todo ou em parte, pelo Cliente, a Prestadora de Serviços terá o direito de reaver o valor devido ou reter os equipamentos fornecidos até o pagamento integral.

                    Alterações no Escopo do Evento
                    3.1 Qualquer alteração no escopo do evento deverá ser acordada por escrito entre as Partes, estabelecendo as condições adicionais, se necessário, e qualquer impacto no valor total do contrato.

                    Cancelamento
                    4.1 Em caso de cancelamento do evento por qualquer motivo, o Cliente deverá notificar a Prestadora de Serviços por escrito com antecedência mínima de [Número de dias] dias.
                    4.2 O Cliente será responsável pelo pagamento de eventuais despesas já incorridas pela Prestadora de Serviços até a data de cancelamento.

                    Responsabilidade
                    5.1 A Prestadora de Serviços se compromete a executar os serviços com o máximo de profissionalismo e qualidade.
                    5.2 A Prestadora de Serviços não será responsável por quaisquer danos ou prejuízos causados por terceiros, casos fortuitos ou de força maior que possam afetar o evento.

                    Vigência
                    6.1 Este Contrato terá vigência a partir da data de assinatura pelas Partes e permanecerá em vigor até a conclusão dos serviços prestados.

                    Lei Aplicável e Foro
                    7.1 Este Contrato será regido e interpretado de acordo com as leis do [País].
                    7.2 Quaisquer controvérsias decorrentes deste Contrato serão submetidas à jurisdição exclusiva dos tribunais competentes do [Local do Foro].

                    As Partes declaram ter lido, compreendido e concordado com todos os termos e condições deste Contrato, através da assinatura abaixo.

                   </h4>
                </div>
                <div class="assinaturas">
                    <div class="assCliente">
                        <h3><?php echo($_SESSION['nm_cliente'])?></h3>
                        <hr>
                        <h6>Assinatura do Cliente</h6>
                    </div>
                    <div class="assEmpresa">
                    <h3><?php echo $row['nm_fantasia']?></h3>
                        <hr>
                        <h6>Assinatura da Empresa</h6>
                    </div>
                    <div class="assEmpresa">
                        <button onclick="generatePDF()">Assinar Contrato</button>
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