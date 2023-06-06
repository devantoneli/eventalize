<?php

// BACK-END para receber informações enviadas pelo cadastrandoCliente.html, validar as informações e cadastrar no banco de dados

$nm_cliente = $_GET['nm_cliente'];
$nm_sobrenome = $_GET['nm_sobrenome'];
$cd_cpf = $_GET['cd_cpf'];
$nm_emailcliente = $_GET['nm_emailcliente'];
$nm_senhacliente = $_GET['nm_senhacliente'];
$nm_usuariocliente = $_GET['nm_usuariocliente'];


$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";


$conn = new mysqli($servername, $username, $password, $db_name);


if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}



$sql = 'INSERT INTO tb_cliente (cd_cpf, nm_cliente, nm_sobrenome, nm_emailcliente, nm_senhacliente, nm_usuariocliente) VALUES ('.$cd_cpf .',' . "'" . $nm_cliente ."'" . ', ' ."'" .  $nm_sobrenome ."'" . ', ' ."'" . $nm_emailcliente ."'" . ', ' ."'" . $nm_senhacliente ."'" . ', ' ."'" .  $nm_usuariocliente ."'" . ')';



if($conn->query($sql)=== TRUE){
    header('Location: ../entrar.php');
}
else{
    $_GET['err'] = true;
    header('Location: erro.php');
}