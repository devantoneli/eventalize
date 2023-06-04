<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$query = "SELECT * FROM tb_chat where cd_cliente = 1 AND cd_empresa = 21";
$result = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));
$row = $result->fetch_assoc();

$cd_chat = $row['cd_chat'];

$query2 = "SELECT * FROM tb_mensagem where cd_chat = $cd_chat";
$result2 = mysqli_query($conn, $query2) or die(' Erro na query:' . $query2 . ' ' . mysqli_error($conn));

$mensagens = array();
if ($result2->num_rows > 0) {
  while ($row2 = $result2->fetch_assoc()) {
    $mensagem = array(
        'dt_mensagem' => $row2['dt_mensagem'],
        'ds_mensagem' => $row2['ds_mensagem'],
        'tp_destinatario' => $row2['tp_destinatario'],
        'tp_remetente' => $row2['tp_remetente']
      );
    $mensagens[] = $mensagem;
  }
}

// Retorne os números em formato JSON
$response = array(
  'status' => 'success',
  'data' => $mensagens
);

header('Content-Type: application/json');
echo json_encode($response);
?>
