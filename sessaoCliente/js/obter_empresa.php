<?php
if(!isset($_SESSION)){
    session_start();
}
$cd_cliente = $_SESSION["cd_cliente"];

include('../../protect.php');

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$codigoEmpresa = $_GET['cd_empresa']; // Obtenha o código da empresa fornecido por meio da requisição AJAX

// Consulta SQL para obter as informações da empresa com base no código
$sql = "SELECT cd_empresa, nm_fantasia, url_fotoperfil FROM tb_empresa WHERE cd_empresa = $codigoEmpresa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nomeEmpresa = $row['nm_fantasia'];
    $fotoEmpresa = $row['url_fotoperfil'];
    $cdEmpresa = $row['cd_empresa'];

    $query = "SELECT * FROM tb_chat where cd_cliente = $cd_cliente AND cd_empresa = $cdEmpresa";
    $result3 = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));
    $row3 = $result3->fetch_assoc();
  
    if (!$row3){
        $query4 = "INSERT INTO tb_chat(cd_cliente, cd_empresa) VALUES ($cd_cliente, $cdEmpresa)";
        $result4 = mysqli_query($conn, $query4) or die(' Erro na query:' . $query4 . ' ' . mysqli_error($conn));
        $row4 = $result4->fetch_assoc();

        $query = "SELECT * FROM tb_chat where cd_cliente = $cd_cliente AND cd_empresa = $cdEmpresa";
        $result3 = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));
        $row3 = $result3->fetch_assoc();

        $cd_chat = $row3['cd_chat'];
    }else {
        $cd_chat = $row3['cd_chat'];
    }
 

    $query2 = "SELECT * FROM tb_mensagem where cd_chat = $cd_chat";
    $result2 = mysqli_query($conn, $query2) or die(' Erro na query:' . $query2 . ' ' . mysqli_error($conn));

    $mensagens = array();
    if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $mensagem = array(
            'dt_mensagem' => $row2['dt_mensagem'],
            'ds_mensagem' => $row2['ds_mensagem'],
            'tp_destinatario' => $row2['tp_destinatario'],
            'tp_remetente' => $row2['tp_remetente']
        );
        $mensagens[] = $mensagem;
    }
    }


    // Criar um array com os dados da empresa
    $empresa = [
        'nome' => $nomeEmpresa,
        'foto' => $fotoEmpresa,
        'codigo' => $cdEmpresa,
        'cd_chat' => $cd_chat,
        'chats' => $mensagens
    ];

    // Retornar os dados da empresa como resposta em formato JSON
    header('Content-Type: application/json');
    echo json_encode($empresa);
} else {
    // Caso a empresa não seja encontrada, retorne uma resposta indicando que não foi encontrada
    header('HTTP/1.1 404 Not Found');
    echo json_encode(['mensagem' => 'Empresa não encontrada']);
}

$conn->close();
?>
