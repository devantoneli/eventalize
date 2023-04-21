<?php

$nm_postagem = $_POST['nm_postagem'];
$ds_postagem = $_POST['ds_postagem'];
$cd_pedido = $_POST['cd_pedido'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}