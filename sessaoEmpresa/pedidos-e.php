<?php


if (!isset($_SESSION)) {
    session_start();
}

include('../protect.php');

$cd_empresa = $_SESSION["cd_empresa"];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT cd_cep, cd_pedido FROM tb_endereco as cep JOIN tb_pedido as p on cep.cd_endereco = p.cd_endereco";
$result = $conn->query($sql);



// Consulta os CEPs dos pedidos com nm_status "Aguardando confirmação"
$sql1 = "SELECT e.cd_cep
         FROM tb_endereco e
         INNER JOIN tb_pedido p ON e.cd_endereco = p.cd_endereco
         WHERE p.cd_empresa = '$cd_empresa'
         AND p.nm_status = 'Aguardando confirmação'";

// Consulta os CEPs dos pedidos com nm_status específicos
$sql2 = "SELECT e.cd_cep
         FROM tb_endereco e
         INNER JOIN tb_pedido p ON e.cd_endereco = p.cd_endereco
         WHERE p.cd_empresa = '$cd_empresa'
         AND (p.nm_status = 'Elaboração do serviço em processo' OR p.nm_status = 'Aguardando data agendada' OR p.nm_status = 'Em consumo')";

// Executa as consultas SQL
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

// Arrays para armazenar os CEPs
$ceps1 = array();
$ceps2 = array();
// Verifica se a consulta 1 retornou resultados
if ($result1->num_rows > 0) {
    // Loop pelos resultados da consulta 1
    while ($row = $result1->fetch_assoc()) {
        $ceps1[] = $row['cd_cep'];
    }
}

// Verifica se a consulta 2 retornou resultados
if ($result2->num_rows > 0) {
    // Loop pelos resultados da consulta 2
    while ($row = $result2->fetch_assoc()) {
        $ceps2[] = $row['cd_cep'];
    }
}

// Função para consultar o CEP na API ViaCEP
function consultarCEP($cep) {
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $response = file_get_contents($url);

    if ($response !== false) {
        $data = json_decode($response);

        if (!isset($data->erro)) {
            return $data;
        } else {
            return null;
        }
    } else {
        return null;
    }
}

// Arrays para armazenar as informações da API ViaCEP
$informacoes1 = array();
$informacoes2 = array();

// Consulta à API ViaCEP para os CEPs da consulta 1
foreach ($ceps1 as $cep) {
    $data = consultarCEP($cep);

    if ($data !== null) {
        $informacoes1[] = $data;
    }
}

// Consulta à API ViaCEP para os CEPs da consulta 2
foreach ($ceps2 as $cep) {
    $data = consultarCEP($cep);

    if ($data !== null) {
        $informacoes2[] = $data;
    }
}

// Exemplo de exibição das informações obtidas (você pode ajustar conforme necessário)





?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/menu-e.css"/>
    <link rel="stylesheet" href="css/pedidos-e.css"/>
    <link rel="icon" href="../img/index/logo.png">
    <title>Pedidos - Eventalize</title>
</head>
    <!--INICIO MENU EMPRESA -->
    <div class="bg-gradPrincipal menuEmpresa">
        <header class="alinhaElementos">
        <a href="index-e.php"><div id="logoImagem"></div></a>
            
            <ul class="opcoesMenu">
                <li class=""><a href="index-e.php" class="opcaoMenu" aria-current="page">Início</a></li>
                <li class="nav-item"><a href="pedidos-e.php" class="opcaoMenu">Pedidos</a></li>
                <li class="nav-item"><a href="perfilEmpresa.php" class="opcaoMenu">Suas postagens</a></li>
                <li class="nav-item"><a href="chatEmpresa.php" class="opcaoMenu">Mensagens</a></li>
            </ul>
        
            <div class="alinhaLogo">
                <button class="botaoSeta" id="iconSeta">
                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                </button>

                <section id="menu">
                <a href="criacaoServico-e.php"><h5>Criar Serviço ou Pacote</h5></a>
                <a href="selecaoPedido-e.php"><h5>Criar Postagens</h5></a>
                </section>

                <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-bell-fill opcaoMenu" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>

                <div id="inserirPerfil">
                    <img src="<?php echo $_SESSION['url_fotoperfil'];?>" alt="">
                </div>

                <section id="menuPerfil">
                <a href="perfilEmpresa.php"><h5>Perfil</h5></a>
                <!-- <a href=""><h5>Pontuações</h5></a>
                <a href=""><h5>Postagens</h5></a>
                <a href=""><h5>Estatísticas de venda</h5></a> -->
                <a href=""><h5>Configurações</h5></a>
                <a href="../logout.php"><h5>Sair</h5></a>
            </section>
            </div>
        </header>
    </div>
<!--FIM MENU EMPRESA -->


<body>
    <div class="acessoRapido">
        <a href="#novosPedidos"><h3 id="roxo">Novos Pedidos</h3></a>
        <a href="#emAndamento"><h3 id="rosa">Em andamento</h3></a>
        <a href="#Outros"><h3 id="azul">Outros</h3></a>
    </div>


<?php

$query3 = "SELECT *
FROM tb_pedido AS p
JOIN tb_servicopedido as sp ON p.cd_pedido = sp.cd_pedido
JOIN tb_servico as s on sp.cd_servico = s.cd_servico
JOIN tb_endereco AS e ON e.cd_endereco = p.cd_endereco
JOIN tb_cliente AS c ON c.cd_cliente = p.cd_cliente
WHERE nm_status = 'Aguardando confirmação' AND p.cd_empresa = '$cd_empresa'";



$result_query3 = mysqli_query($conn, $query3) or die(' Erro na query:' . $query3 . ' ' . mysqli_error($conn));

// echo 'Quantidade de registros retornados: ' . mysqli_num_rows($result_query3);
if(mysqli_num_rows($result_query3) > 0){
    echo'
    <section class="novosPedidos" id="novosPedidos">
        <div class="blocoPedidos">
            <h2 id="txtNovosPedidos">Novos pedidos</h2>
            <div class="gridNovosPedidos">
            <div class="categoriasNvPedidos">
                <h3>Cod.</h3>
                <h3>Cliente e local</h3>
                <h3>Pedido</h3>
                <h3>Valor</h3>
                <h3>Datado para</h3>
                <h3>Requerido em</h3>
                </div>';
                
    while($row3 = mysqli_fetch_assoc($result_query3)){
        foreach ($informacoes1 as $info) {
            // echo "CEP: " . $info->cep . "<br>";
            // echo "Logradouro: " . $info->logradouro . "<br>";
            // echo "Bairro: " . $info->bairro . "<br>";
            // echo "Cidade: " . $info->localidade . "<br>";
            // echo "UF: " . $info->uf . "<br>";
            // echo "<br>";
       
            echo'
                <div class="cardNvPedidos">
                <h3>'.$row3['cd_pedido'].'</h3>
                <h3>'.$row3['nm_cliente'].' <br> '. $info->logradouro.',  '.$row3['qt_numeroendereco'].'</h3>
                <h3>'.$row3['nm_servico'].'</h3>
                <h3>R$'. str_replace('.', ',', $row3['vl_pedido']) .'</h3>
                <h3>15/02/2023 <br>'.date('H:i', strtotime($row3['hr_agendamento'])).'</h3>
                <h3>'.date('d/m/Y', strtotime($row3['dt_pedido'])).'<br>13h24</h3>
                </div>';
    }
}
            echo '</div>
        </div>
    </section>';
}
?>

<?php

//SELECT DOS PEDIDOS EM ANDAMENTO
$query = "SELECT *
FROM tb_pedido AS p
JOIN tb_servicopedido as pp ON p.cd_pedido = pp.cd_pedido
JOIN tb_servico as pac on pp.cd_servico = pac.cd_servico
JOIN tb_endereco AS e ON e.cd_endereco = p.cd_endereco
JOIN tb_cliente AS c ON c.cd_cliente = p.cd_cliente
WHERE (p.nm_status = 'Elaboração do serviço em processo' OR p.nm_status = 'Aguardando data agendada' OR p.nm_status = 'Em consumo') 
AND p.cd_empresa = $cd_empresa 
ORDER BY p.dt_pedido DESC";


$result_query = mysqli_query($conn, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conn));

// echo 'Quantidade de registros retornados: ' . mysqli_num_rows($result_query);

if(mysqli_num_rows($result_query) > 0){
    echo '
    <section class="pedidosAndamento" id="emAndamento">
        <div class="blocoPedidos">
            <h1 id="txtPedidosAndamento">Pedidos em andamento</h1>
            <div class="gridPedidosAndamento">';
            
           
            foreach ($informacoes2 as $info) {
    while($row = mysqli_fetch_assoc($result_query)){
        
        echo '<div class="card-Andamento">
            <div id="cardPedido">
                <h2>'.$row['nm_servico'].'</h2>
                    <h4>'.$row['ds_servico'].'</h4>
            </div>
            
            <div id="statusPedido">
                <h2>'. $row['nm_status'] .'</h2>
                <div class="gridPedidoInfo">
                    <img src="'.$row['url_fotoperfil'].'" alt="">
                    <div class="infoPedido">
                        <h2>'.$row['nm_cliente'].'</h2>
                    <h3>'.substr($info->logradouro, 0,25).'. nº '.$row['qt_numeroendereco'].'</h3>
                        <h4>'.$info->localidade.' - '.$info->uf .'</h4>
                    </div>
                    <div class="dataPedido">
                        <div id="iconCalendario">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h1>'.date('d/m/Y', strtotime($row['dt_pedido'])).'</h1>
                            <h3>Domingo, '.$row['hr_agendamento'].'h</h3>
                        </div>
                    </div>
                    <div class="gridIcons">
                        <h1>R$'. str_replace('.', ',', $row['vl_pedido']) .'</h1>
                        <div class="iconsFuncPedidos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                            </svg>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                                <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                            </svg>
                            
                            <h3>Chat</h3>
                            <h3>Mais</h3>
                            <h3>Contr.</h3>
                        </div>
                    </div>
                </div></div></div>';
        }
    }
    echo '
            </div>
        </div>
    </section>
    ';
}

//SELECT DOS FINALIZADOS E CANCELADOS
$query2 = "SELECT *
FROM tb_pedido AS p
JOIN tb_servicopedido as pp ON p.cd_pedido = pp.cd_pedido
JOIN tb_servico as pac on pp.cd_servico = pac.cd_servico
WHERE (nm_status = 'Finalizado' OR nm_status = 'Cancelamento em processo') AND p.cd_empresa = $cd_empresa ORDER BY dt_pedido DESC";
$result_query2 = mysqli_query($conn, $query2) or die(' Erro na query:' . $query2 . ' ' . mysqli_error($conn));

// echo 'Quantidade de registros retornados: ' . mysqli_num_rows($result_query2);

if(mysqli_num_rows($result_query2) > 0){
    echo'
    <section class="outros" id="Outros">
        <div class="blocoPedidos">
            <h1 id="txtPedidosOutros">Outros</h1>
            <div class="gridOutros">
                <div class="categorias">
                <h3>Cod.</h3>
                <h3>Pedido</h3>
                <h3>Valor</h3>
                <h3>Status final</h3>
                </div>';
    while($row2 = mysqli_fetch_assoc($result_query2)){
        echo'
        <div class="cardOutrosPedidos">
        <h3>'.$row2['cd_pedido'].'</h3>
        <h3>'.$row2['nm_servico'].'</h3>
        <h3>R$'. str_replace('.', ',', $row2['vl_pedido']) .'</h3>
        <h3 id="txtArquivado">'.$row2['nm_status'].'</h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
        </svg>
        </div>';
    }
    echo'

        </div>
        </div>
    </section>';
}
?>

    <script src="js/menu-e.js"></script>
</body>
</html>