<?php

session_start();
include('../protect.php');

$qtNumeroEndereco = $_POST['numero'];
$dsReferencia = $_POST['referencia'];
$dwsComplemento = $_POST['complemento'];
$cdCep = $_POST['cep'];
$dsRua = $_POST['rua'];
$dsBairro = $_POST['bairro'];
$dsCidade = $_POST['cidade'];
$sgUF = $_POST['uf'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_eventalize";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }
echo $qtNumeroEndereco ;
echo $dsReferencia;
echo $dwsComplemento;
echo $cdCep;
echo $dsRua;
echo $dsBairro;
echo $dsCidade;
echo $sgUF;


$sqlCidade = "INSERT INTO tb_cidade (nm_cidade, sg_uf) VALUES ( '$dsCidade', '$sgUF')";
$stmtCidade = $conn->prepare($sqlCidade);
$stmtCidade->bind_param("ss", $dsCidade, $sgUF);
$stmtCidade->execute();


$cdCidade = $stmtCidade->insert_id;


$sqlBairro = "INSERT INTO tb_bairro (nm_bairro, cd_cidade) VALUES (?, ?)";
$stmtBairro = $conn->prepare($sqlBairro);
$stmtBairro->bind_param("ss",$dsBairro, $cdCidade);
$stmtBairro->execute();

$cdBairro = $stmtBairro->insert_id;


$sqlCep = "INSERT INTO tb_cep (cd_cep, nm_rua, cd_bairro) VALUES (?, ?, ?)";
$stmtCep = $conn->prepare($sqlCep);
$stmtCep->bind_param("iss", $cdCep, $dsRua, $cdBairro);
$stmtCep->execute();


$cdCep = $stmtCep->insert_id;

$sqlEndereco = "INSERT INTO tb_endereco (qt_numeroendereco, ds_referencia, ds_complemento, cd_cep) VALUES (?, ?, ?, ?)";
$stmtEndereco = $conn->prepare($sqlEndereco);
$stmtEndereco->bind_param("isss", $qtNumeroEndereco, $dsReferencia, $dwsComplemento, $cdCep);
$stmtEndereco->execute();
$cdEndereco = $stmtEndereco->insert_id;


?>