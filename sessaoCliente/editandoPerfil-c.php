<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

$cd_cliente = $_SESSION["cd_cliente"];
$nm_cliente = $_GET['nm_cliente'];
$nm_sobrenome = $_GET['nm_sobrenome'];
$nm_usuariocliente = $_GET['nm_usuariocliente'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "UPDATE tb_cliente SET nm_cliente='$nm_cliente',nm_sobrenome='$nm_sobrenome', nm_usuariocliente='$nm_usuariocliente' WHERE cd_cliente='$cd_cliente'";

if ($conn->query($sql)=== TRUE){
    header('Location: perfil-c.php');
} else{
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>