<?php
// validar as entradas do usuário
// if(empty($_POST['nm_email']) || empty($_POST['nm_senha'])) {
//   // echo '<script>alert("Por favor, preencha todos os campos!");</script>';
//   exit();
// }

// conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha ao conectar ao banco de dados: " . $conn->connect_error);
}

// verificar as informações de login
$nm_email = $_POST['nm_email'];
$nm_senha = $_POST['nm_senha'];


$sql = "SELECT * FROM tb_empresa WHERE nm_emailempresa = '$nm_email' AND nm_senhaempresa = '$nm_senha'";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM tb_cliente WHERE nm_emailcliente = '$nm_email' AND nm_senhacliente = '$nm_senha'";
$result2 = $conn->query($sql2);

if ($result->num_rows == 1 ) {
  // informações de login válidas, redirecionar a empresa para a página inicial

  $empresa = $result->fetch_assoc();

  //se nao tem sessao...
  if(!isset($_SESSION)){
    session_start();
  }

  $_SESSION['cd_empresa'] = $empresa['cd_empresa'];
  $_SESSION['nm_fantasia'] = $empresa['nm_fantasia'];
  $_SESSION['nm_usuarioempresa'] = $empresa['nm_usuarioempresa'];
  $_SESSION['url_fotoperfil'] = $empresa['url_fotoperfil'];
  $_SESSION['ds_biografia'] = $empresa['ds_biografia'];

  header("Location: sessaoEmpresa/index-e.php ");



  exit();
} if ($result2->num_rows == 1 ) {
  // informações de login válidas, redirecionar o cliente para a página inicial

  $cliente = $result2->fetch_assoc();

  //se nao tem sessao...
  if(!isset($_SESSION)){
    session_start();
  }

  $_SESSION['cd_cliente'] = $cliente['cd_cliente'];
  $_SESSION['nm_cliente'] = $cliente['nm_cliente'];
  $_SESSION['nm_usuariocliente'] = $cliente['nm_usuariocliente'];
  $_SESSION['url_fotoperfil'] = $cliente['url_fotoperfil'];
  // $_SESSION['ds_biografia'] = $empresa['ds_biografia'];

  header("Location: sessaoCliente/index-c.php ");
}else {
  // informações de login inválidas, exibir mensagem de erro
  echo "Nome de usuário ou senha inválido(s).";
  exit();
}

$conn->close();
?>
