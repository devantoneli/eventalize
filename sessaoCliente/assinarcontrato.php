<?php

if (!isset($_SESSION)) {
    session_start();
}

include('../protect.php');

$cd_cliente = $_SESSION["cd_cliente"];
$cd_pedido = $_POST["cd_pedido"];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "UPDATE tb_pedido SET nm_status = 'Aguardando Pagamento' WHERE cd_pedido = '$cd_pedido'";

if ($conn->query($sql) === TRUE) {
    echo "Status do pedido atualizado com sucesso.";
} else {
    echo "Erro ao atualizar o status do pedido: " . $conn->error;
}