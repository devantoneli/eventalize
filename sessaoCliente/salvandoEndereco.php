<?php
//BACK PARA RECEBER AS INFORMAÇÕES DE POST, INSERIR EM ENDEREÇO, INFOPAGAMENTO E PEDIDOS
session_start();
include('../protect.php');

    $cd_cliente = $_SESSION['cd_cliente'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_eventalize";

//GUARDANDO EM VARIÁVEIS PARA SEREM USADAS POSTERIORMENTE
    $cepA = $_POST['cep'];
    $cep = str_replace('-', '', $cepA);
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $referencia = $_POST['referencia'];
    $dtAgendamento = $_POST['dtAgendamento'];
    $hrAgendamento = $_POST['hrAgendamento'];
    date_default_timezone_set('America/Sao_Paulo');
    $data_atual = date('Y-m-d');
    echo $data_atual;
    $empresas_serializadas = $_POST['empresas_serializadas'];
    $empresas = unserialize($empresas_serializadas);


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

//INSERINDO AS INFORMAÇÕES NA TABELA ENDERECO
    $sql = "INSERT INTO tb_endereco (qt_numeroendereco, ds_complemento, ds_referencia, cd_cep) VALUES ('$numero','$complemento','$referencia','$cep')";
    if ($conn->query($sql) === TRUE) {
        //GUARDANDO O CD ENDERECO EM UMA VARIAVEL
        $cd_endereco = $conn->insert_id; 
        // echo "O novo cd_endereco é: " . $cd_endereco;
    }
    else {
        echo "Erro ao adicionar registro: " . $conn->error;
    }
    

//VARIAVEL RESPONSAVEL POR REALIZAR OS INSERTS DENTRO DO LOOP
    $sqlInsertPedido = "INSERT INTO tb_pedido (nm_status, vl_pedido, dt_pedido, cd_endereco, cd_infopagamento, cd_cliente, cd_empresa, dt_agendamento, hr_agendamento)
                    VALUES ";

// LOOP PARA PERCORRER OS ARRAYS E ADICIONAR NA TABELA PEDIDO
    foreach ($empresas as $empresa) {
        $cd_empresa = $empresa['cd_empresa'];
        $vl_pedido = $empresa['vl_total'];
        $sqlInsertPedido .= "('Aguardando a confirmação', $vl_pedido, '$data_atual', $cd_endereco, '0' , $cd_cliente, $cd_empresa, '$dtAgendamento', '$hrAgendamento'),";
    }
    $sqlInsertPedido = rtrim($sqlInsertPedido, ",");
    if ($conn->query($sqlInsertPedido) === TRUE) {
       
        echo "Pedido inserido com sucesso!";
    } else {
        echo "Erro ao inserir pedido: " . $conn->error;
    }
    $conn->close();
    
    header("Location: historicopedido-c.php");
    
    exit();



?>