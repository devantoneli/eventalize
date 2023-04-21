<?php

//NESSE ARQUIVO, ESTAREMOS SELECIONANDO O PEDIDO QUE A EMPRESA DESEJA FAZER A POSTAGEM

$nm_cliente = $_POST["nm_cliente"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM vwpedidocliente WHERE  nm_cliente LIKE '%$nm_cliente%'";
// $sql = "SELECT * FROM vwpedidocliente WHERE cd_empresa = $cd_empresa AND nm_cliente = %$nm_cliente%";

$result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));
$row = mysqli_fetch_assoc($result_query);

if(mysqli_num_rows($result_query) > 0){
    echo "<table>";
    while($row = mysqli_fetch_assoc($result_query)){
        echo
        // '<td>'. $row["cd_pedido"]; '</td>
        '<tr>
        <td>' . $row["nm_cliente"] . '</td>
        <td>' . $row["dt_pedido"] . '</td>
        <td>R$' . $row["vl_pedido"] . '</td>
        <tr>';
}
    }else{
        echo "Nenhum registro encontrado";
}

?>