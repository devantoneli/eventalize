<?php

//EXCLUIR DPS ISSO É SO UM TESTE PARA AUXILIAR NA CRIAÇÃO DE OUTRA PAGINA

//CÓDIGO COM FUNÇÃO PARA MOSTRAR LISTA DE SERVIÇOS PARA O CLIENTE CONSULTAR

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

// SELECIONANDO AS INFORMAÇÕES QUE QUERO EXIBIR NA TELA DETALHES
$query = "SELECT cd_servico ,nm_servico, ds_servico, vl_servico FROM tb_servico";

$result_query = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));

// a função mysqli_num_rows serve para verificar se a consulta retornou algum resultado

if(mysqli_num_rows($result_query) > 0){
    echo "<h1>VISÃO DO CLIENTE</h1>
    <table>";
    while($row = mysqli_fetch_assoc($result_query)){

        echo 
        '<form action="edicaoServico-e.php">
        <td><input type="hidden" value= '.$row["cd_servico"] . ' name="cd_servico"></td>
        <tr>
        <td>' . $row["nm_servico"] . '</td>
        <td>' . $row["ds_servico"] . '</td>
        <td>' . $row["vl_servico"] . '</td>
        <td><button type="submit">Consultar</button></td>
        </form>
        </tr>';
    }
} else{
    echo "Nenhum registro encontrado";
}

mysqli_close($conn);

?>
