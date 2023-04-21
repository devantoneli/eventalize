<?php

//CRIANDO A POSTAGEM DO LADO DA EMPRESA (FAZENDO OS INSERTS)

if(isset($_POST['nm_postagem']) && isset($_POST['ds_postagem'])){
    $nm_postagem = $_POST['nm_postagem'];
    $ds_postagem = $_POST['ds_postagem'];

// $cd_pedido = $_POST['cd_pedido'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = 'INSERT INTO tb_postagem (nm_postagem, ds_postagem) VALUES (' . "'" . $nm_postagem . "'" . ', ' . "'" . $ds_postagem . "'" . ')';

if($conn->query($sql)=== TRUE){
    // header('Location: /sistema/eventalize/sessaoUsuario/postagem-usuario.html');
    echo 'funfou';
}
else{
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
}
