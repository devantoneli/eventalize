<?php

session_start();
include('../protect.php');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_eventalize";

    $cepA = $_POST['cep'];
    $cep = str_replace('-', '', $cepA);
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $referencia = $_POST['referencia'];
    $dtAgendamento = $_POST['dtAgendamento'];
    $hrAgendamento = $_POST['hrAgendamento'];
    date_default_timezone_set('America/Sao_Paulo');
    $data_atual = date('Y-m-d');


    // echo $cep;
    // echo $numero;
    // echo $complemento;
    // echo $referencia;
    // echo $dtAgendamento;
    // echo $hrAgendamento;
    // echo $data_atual;

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tb_endereco (qt_numeroendereco, ds_complemento, ds_referencia, cd_cep) VALUES ('$numero','$complemento','$referencia','$cep')";
    if ($conn->query($sql) === TRUE) {
        $cd_endereco = $conn->insert_id; 
        // header("Location:carrinhoLocal.php");
        echo "O novo cd_endereco é: " . $cd_endereco;
    }
    else {
        echo "Erro ao adicionar registro: " . $conn->error;
    }
    

    // if ($conn->query($sql)=== TRUE){
    //     header("Location:carrinhoLocal.php");
    // }
    

    exit();



?>