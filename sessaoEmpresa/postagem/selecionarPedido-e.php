<?php

//NESSE ARQUIVO, ESTAREMOS SELECIONANDO O PEDIDO QUE A EMPRESA DESEJA FAZER A POSTAGEM

if (isset($_GET["nm_cliente"])) {
    $nm_cliente = "%".trim($_POST["nm_cliente"])."%";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$sql = "SELECT c.nm_cliente FROM tb_pedido AS p
            JOIN tb_infopagamento AS ip ON
                ip.cd_pagamento = p.cd_infopagamento
                    JOIN tb_cliente AS c on c.cd_cliente = ip.cd_cliente
                        WHERE c.cd_cliente = $nm_cliente";

$result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));
$row = mysqli_fetch_assoc($result_query);


if(mysqli_num_rows($result_query) > 0){
    while($row = mysqli_fetch_assoc($result_query)){
        echo  $row["nm_cliente"];
    }
}
}
?>