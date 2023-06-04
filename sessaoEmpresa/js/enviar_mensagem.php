<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

// Obter os dados enviados pela requisição AJAX
$mensagem = $_POST['mensagem'];
$tpRemetente = $_POST['tpRemetente'];
$tpDestinatario = $_POST['tpDestinatario'];
$cdChat = $_POST['cdChat'];

// Inserir a mensagem na tabela tb_mensagem
$query = "INSERT INTO tb_mensagem(ds_mensagem, tp_remetente, tp_destinatario, cd_chat) VALUES ('$mensagem', $tpRemetente, $tpDestinatario, $cdChat)";

if ($conn->query($query) === TRUE) {
  // Se a inserção foi realizada com sucesso, retorne uma resposta de sucesso para a requisição AJAX
  $response = array(
    'status' => 'success',
    'message' => 'Mensagem enviada com sucesso!'
  );
} else {
  // Se ocorreu um erro na inserção, retorne uma resposta de erro para a requisição AJAX
  $response = array(
    'status' => 'error',
    'message' => 'Erro ao enviar a mensagem: ' . $conn->error
  );
}

// Retorne a resposta como um JSON
header('Content-Type: application/json');
echo json_encode($response);
?>