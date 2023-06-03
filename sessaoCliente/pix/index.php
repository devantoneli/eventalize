
<?php

if(!isset($_SESSION)){
  session_start();
}

include('../../protect.php');

$endpoint = 'https://sandbox.api.pagseguro.com/orders';
$token = '30B2F2984A8C45D6861126259693CA3C';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/iniciocliente.css">
    <link rel="stylesheet" href="../css/menu-c.css">
    <link rel="icon" href="../../img/index/logo.png">
    <title>Início - Eventalize</title>
</head>
<body>

<!-- INICIO MENU -->
    <div class="grid-container">
        <div class="header">
            <div class="logo">
                <a href="index-c.php"><img src="../../img/icones/logoBranca.svg" alt=""></a>
            </div>
            <div class="menu">
                <a href="index-c.php">Início</a>
                <a href="../../sessaoUsuario/explore.php">Feed</a>
                <a href="chatCliente.php">Mensagens</a>
                <a href="historicopedido-c.php">Meus Pedidos</a>
            </div>

            <div class="headerPesquisa">
                <form action="buscaServico-c.php" method="post" id="searchForm">
                    <input type="text" style="padding: 2.5%;" placeholder="Procure Serviços" name="nm_tiposervico">
                    <div class="imgLupa">
                    <img src="../../img/icones/icon-lupa.svg" alt="" width="30px" onclick="submitForm()">
                    </div>
                </form>
            </div>
            <div class="headerClientePerfil" >
                <!-- <div class="iconCliente"> -->
                <form action="carrinho.php" id="botaoCarrinho">
                    <a href="#" class="carrinho"><img src="../../img/icones/icon-carrinho.svg" alt="Carrinho" onclick="submitButton()"></a>
                </form>
                <a href="#" class ="notificacao"><img src="../../img/icones/icon-notificacao.svg" alt="Notificações"></a>
                <!-- </div> -->
                <button class="menuIcon2" onclick="menuOpen()"><img  src="../../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
            </div>
            <section class="menuPerfil">
                <a href="perfil-c.php">Perfil</a>
                <!-- <a href="">Postagens</a> -->
                <!-- <a href="" style="margin-bottom: 20%">Histórico de Compras</a> -->
                <!-- <a href="historicopedido-c.php">Histórico de Pedidos</a> -->
                <a href="">Configurações</a>
                <a href="../../logout.php">Sair</a>
            </section>
        </div>
    </div>


<?php
$cd_cliente = $_POST['cd_cliente'];
$cd_pedido = $_POST['cd_pedido'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$sql=" SELECT * FROM tb_cliente WHERE cd_cliente = '$cd_cliente'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

$nome = $row['nm_cliente']." ".$row['nm_sobrenome'];

$sql2="SELECT p.cd_pedido, s.cd_servico, s.nm_servico, s.ds_servico, s.vl_servico FROM tb_pedido as p JOIN tb_servicopedido as sp ON sp.cd_pedido = p.cd_pedido JOIN tb_servico  as s ON s.cd_servico = sp.cd_servico WHERE p.cd_pedido = $cd_pedido";

$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$valores = $row2['vl_servico'];
$valor = $valores * 100;

// Obter a data atual
$dataAtual = new DateTime();

// Adicionar um dia à data atual
$dataFutura = $dataAtual->modify('+1 day');

// Formatar a data no formato desejado
$expirationDate = $dataFutura->format('Y-m-d\TH:i:sP');

$body =
  [
    "reference_id" => "$cd_pedido",
    "customer" => [
      "name" => $nome,
      "email" => $row['nm_emailcliente'],
      "tax_id" => $row['cd_cpf'],
      "phones" => [
        [
          "country" => "55",
          "area" => "11",
          "number" => "999999999",
          "type" => "MOBILE"
        ]
      ]
    ],
    "items" => [
      [
        "name" => $row2['nm_servico'],
        "quantity" => 1,
        "unit_amount" => 500
      ]
    ],
    "qr_codes" => [
      [
        "amount" => [
          "value" => $valor
        ],
        "expiration_date" => $expirationDate,
      ]
    ],
    "shipping" => [
      "address" => [
        "street" => "Avenida Brigadeiro Faria Lima",
        "number" => "1384",
        "complement" => "apto 12",
        "locality" => "Pinheiros",
        "city" => "São Paulo",
        "region_code" => "SP",
        "country" => "BRA",
        "postal_code" => "01452002"
      ]
    ],
    "notification_urls" => [
      "https://eventalize-pagseguro.ultrahook.com"
    ]
  ];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $endpoint);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($curl, CURLOPT_CAINFO, __DIR__ ."/cacert.pem");
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'Content-Type:application/json',
  'Authorization: Bearer ' . $token
]);

$response = curl_exec($curl);
$error = curl_error($curl);

curl_close($curl);

if ($error) {
  var_dump($error);
  die();
}

$data = json_decode($response, true);

// Converter para objeto DateTime
$dateTime = new DateTime($expirationDate);

// Formatar a data no formato desejado
$formattedDate = $dateTime->format('d/m/Y \à\s H\hi');

// var_dump($data);
?>

<div class="grid-flexPix">
  <h1>Faça o pagamento através de Pix QR code!</h1>
  <h2>O QR code expirará em <?php echo($formattedDate); ?></h2>
  <h3 style="color: #BB4242;">Caso essa página seja fechada ou atualizada, será gerado um novo código.</h3>
  <h3 style="color: #BB4242;">Ao realizar o pagamento, volte para a página anterior.</h3>
  <?php if ($data) : ?>
    <img src="<?php echo ($data['qr_codes'][0]['links'][0]['href']); ?>" alt="">

    <p class="copiacola"><?php echo ($data['qr_codes'][0]['id']); ?></p>
  
</div>



  <?php endif; ?>
</body>

</html>