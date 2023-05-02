<?php

// BACK-END para receber informações enviadas pelo cadastrandoEmpresa.html, validar as informações e cadastrar no banco de dados

$nm_fantasia = $_GET['nm_fantasia'];
$nm_razaosocial = $_GET['nm_razaosocial'];
$cd_cnpj = $_GET['cd_cnpj'];
$nm_usuarioempresa = $_GET['nm_usuarioempresa'];
$nm_emailempresa = $_GET['nm_emailempresa'];
$nm_senhaempresa = $_GET['nm_senhaempresa'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";


$conn = new mysqli($servername, $username, $password, $db_name);


if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = 'INSERT INTO tb_empresa (nm_fantasia,cd_cnpj, nm_usuarioempresa, nm_emailempresa, nm_senhaempresa) VALUES (' . "'" . $nm_fantasia ."'" . ', ' . "'" . $cd_cnpj . "'" . ',' . "'" . $nm_usuarioempresa . "'" . ', ' . "'" . $nm_emailempresa . "'" . ', ' . "'" . $nm_senhaempresa . "'" . ')';



if($conn->query($sql)=== TRUE){
    header('Location: ../entrar.html');
}
else{
    echo "Erro: " . $sql . "<br>" . $conn->error;
}