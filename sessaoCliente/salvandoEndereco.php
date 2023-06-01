<?php

session_start();
include('../protect.php');


$cdCep = $_POST['cep'];
$url = "https://viacep.com.br/ws/$cdCep/json/";
$response = file_get_contents($url);
$endereco = json_decode($response);


echo "CEP: " . $endereco->cep . "<br>";
echo "Logradouro: " . $endereco->logradouro . "<br>";
echo "Bairro: " . $endereco->bairro . "<br>";
echo "Cidade: " . $endereco->localidade . "<br>";
echo "Estado: " . $endereco->uf . "<br>";

$cep = $endereco->cep;
$logradouro = $endereco->logradouro;
$bairro = $endereco->bairro;
$cidade = $endereco->localidade;
$estado = $endereco->uf;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_eventalize";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }


    

    exit();



?>