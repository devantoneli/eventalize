<?php
// validar as entradas do usuário
if(empty($_POST['nm_email']) || empty($_POST['nm_senha'])) {
  echo "Por favor, preencha todos os campos.";
  exit();
}

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

if ($result->num_rows == 1 ) {
  // informações de login válidas, redirecionar o usuário para a página inicial

  $empresa = $result->fetch_assoc();

  //se nao tem sessao...
  if(!isset($_SESSION)){
    session_start();
  }

  $_SESSION['cd_empresa'] = $empresa['cd_empresa'];
  $_SESSION['nm_fantasia'] = $empresa['nm_fantasia'];

  header("Location: /sistema/eventalize/sessaoEmpresa/index-e.php ");



  exit();
} else {
  // informações de login inválidas, exibir mensagem de erro
  echo "Nome de usuário ou senha inválido(s).";
  exit();
}

$conn->close();
?>
