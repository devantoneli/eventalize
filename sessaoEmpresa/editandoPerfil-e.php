<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

$cd_empresa = $_SESSION["cd_empresa"];
$nm_fantasia = $_GET['nm_fantasia'];
$ds_biografia = $_GET['ds_biografia'];
$nm_usuarioempresa = $_GET['nm_usuarioempresa'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "UPDATE tb_empresa SET nm_fantasia='$nm_fantasia',ds_biografia='$ds_biografia', nm_usuarioempresa='$nm_usuarioempresa' WHERE cd_empresa='$cd_empresa'";

if ($conn->query($sql)=== TRUE){
    header('Location: perfilEmpresa.php');
} else{
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>