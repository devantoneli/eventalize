<?php

// BACKEND PARA A EMPRESA EXCLUIR UM SERVIÇO DE SEU PERFIL

$cd_servico = $_GET['cd_servico'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

// SELECIONANDO NA TB_PACOTESERVICO O CD_SERVICO DO SERVICO QUE FOI SELECIONADO, PARA QUE ELE POSSA SER EXCLUÍDO DE AMBAS AS TABELAS
$sql = "SELECT * FROM tb_pacoteservico WHERE cd_servico = ('$cd_servico')";

$result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));

if(mysqli_num_rows($result_query) > 0){
    //DELETAR DA TB_PACOTESERVICO O CD_SERVICO QUE FOI SELECIONADO PELA EMPRESA, OU SEJA, O SERVICO QUE ELA DESEJA EXCLUIR
    $sql2 = "DELETE FROM tb_pacoteservico WHERE cd_servico = ('$cd_servico')";

    if($conn->query($sql2) === TRUE){
        //SE A CONEXÃO ACIMA FUNCIONAR, ENTAO AGORA EXCLUIREMOS O SERVICO SELECIONADO PELA EMPRESA DA TB_SERVICO
        $sql3 ="DELETE FROM tb_servico WHERE cd_servico=('$cd_servico')";

        if($conn->query($sql3) === TRUE)
        echo
        //SE A CONEXÃO COM $sql3 FUNCIONAR, EXIBIREMOS ESSA MENSAGEM:
        '<h1>EXCLUIDO COM SUCESSO</h1>';
    } else{
        echo "Error deleting record: " . $conn->error;
    }
} /*else{
    $sql2 = "DELETE FROM tb_servico WHERE cd_servico=('$cd_servico')";

    if($conn->query($sql2) === TRUE){
    echo
    '<h1>EXCLUIDO COM SUCESSO</h1>';
    
  } else {
    echo "Error deleting record: " . $conn->error;
    }
}*/
    
$conn->close();
?>

