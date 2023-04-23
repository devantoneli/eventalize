<?php


$cd_pedido = $_POST['cd_pedido'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$query2 = 'SELECT * FROM cd_pedido WHERE cd_pedido =' . $row['cd_pedido'] .''; 

$result_query2 = mysqli_query($conn, $query2) or die(' Erro na query:' . $query2 . ' ' . mysqli_error($conn));
$row2 = mysqli_fetch_assoc($result_query2);

?>