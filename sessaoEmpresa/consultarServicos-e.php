<?php

//BACK-END para carregar lista de serviços se achar empresa selecionada pelo r-procuraempresa-e.php

if (isset($_GET['cd_empresa'])) {
    $cd_empresa = $_GET['cd_empresa'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "db_eventalize";

    $conn = new mysqli($servername, $username, $password, $db_name);

    if($conn->connect_error){
        die("Falha na conexão: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM tb_servico WHERE cd_empresa = '$cd_empresa'";
    $result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));
    $row = mysqli_fetch_assoc($result_query);



if(mysqli_num_rows($result_query) > 0){

    echo "<table>";
    while($row = mysqli_fetch_assoc($result_query)){
        echo 
        '<form action="deletarservico.php">
        <td><input type="hidden" value= '.$row["cd_servico"] . ' name="cd_servico"></td>
        <td>
        <td>' . $row["nm_servico"] . '</td>
        <td>' . $row["ds_servico"] . '</td>
        <td>R$' . $row["vl_servico"] . '</td>
        <td><button type="submit">Deletar</button></td>
        </form>
        <td><form action="editarselecao.php"></td>
        <td><input type="hidden" value= '.$row["cd_servico"] . ' name="cd_servico"></td>
        <td><button type="submit">Editar</button></td>
        </form>
        </td>
        </table>';

    }
}else{
    echo "Nenhum registro encontrado";
}
}

?>
