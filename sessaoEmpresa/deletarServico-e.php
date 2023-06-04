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

// // SELECIONANDO NA TB_PACOTESERVICO O CD_SERVICO DO SERVICO QUE FOI SELECIONADO, PARA QUE ELE POSSA SER EXCLUÍDO DE AMBAS AS TABELAS
// $sql = "SELECT * FROM tb_pacoteservico WHERE cd_servico = $cd_servico";

// $result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));

// if(mysqli_num_rows($result_query) > 0){
//     //DELETAR DA TB_PACOTESERVICO O CD_SERVICO QUE FOI SELECIONADO PELA EMPRESA, OU SEJA, O SERVICO QUE ELA DESEJA EXCLUIR
//     $sql2 = "DELETE FROM tb_pacoteservico WHERE cd_servico = ('$cd_servico')";

//     if($conn->query($sql2) === TRUE){
//         //SE A CONEXÃO ACIMA FUNCIONAR, ENTAO AGORA EXCLUIREMOS O SERVICO SELECIONADO PELA EMPRESA DA TB_SERVICO
//         $sql3 ="DELETE FROM tb_servico WHERE cd_servico=('$cd_servico')";

//         if($conn->query($sql3) === TRUE)
       
//         //SE A CONEXÃO COM $sql3 FUNCIONAR, EXIBIREMOS ESSA MENSAGEM:
//         header('Location: perfilEmpresa.php');
//     } else{
//         echo "Error deleting record: " . $conn->error;
//     }
// }else{
//     $sql2 = "DELETE FROM tb_servico WHERE cd_servico=$cd_servico";

//     if($conn->query($sql2) === TRUE){
//     header('Location: perfilEmpresa.php');
    
//   } else {
//     echo "Error deleting record: " . $conn->error;
//     }
// }

// clico no botao de excluir 
//  if this servico nao existe em nenhum pedido que seja igual a finalizado ou cancelado -> delete 
// else  -> update tb_servico set apagado = 1 where tb_servico = pipipipi

// mais pra frente
// ta la alterando em consumo para finalizado, quando for alterar:
// update tb_pedido pipipopo, status = finalizado 
// if (servico que ta dentro do pedido[apagado] = 1){
// finalmente delete}
// senao, faz mais nada

// if($cd_servico)

$sql = "SELECT COUNT(*) AS total FROM tb_pedido AS p
JOIN tb_servicopedido AS sp ON sp.cd_pedido = p.cd_pedido
JOIN tb_servico AS s ON s.cd_servico = sp.cd_servico 
WHERE sp.cd_servico = $cd_servico AND p.nm_status NOT IN ('Finalizado', 'Cancelado', 'Pedido recusado')";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalPedidosAtivos = $row['total'];

if ($totalPedidosAtivos > 0) {
    // Existem pedidos ativos com o serviço, atualize o atributo 'delete' para 1
    $sql = "UPDATE tb_servico SET deletado = 1 WHERE cd_servico = $cd_servico";
    $conn->query($sql);
    echo "O serviço não pode ser excluído, mas seu atributo 'delete' foi atualizado.";
} else {
    // Não há pedidos ativos com o serviço, exclua-o
    $sql = "DELETE FROM tb_servico WHERE cd_servico = $cd_servico";
    $conn->query($sql);
    echo "O serviço foi excluído com sucesso.";
}

    
$conn->close();
?>

