<?php
// validar as entradas do usuário
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
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
$username = $_POST['usuario'];
$password = $_POST['senha'];

$sql = "SELECT * FROM tb_empresa WHERE nm_emailempresa = '$username' AND nm_senhaempresa = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  // informações de login válidas, redirecionar o usuário para a página inicial
  header("Location: ../inicioEmpresa.html ");

  exit();
} else {
  // informações de login inválidas, exibir mensagem de erro
  echo "Nome de usuário ou senha inválido(s).";
  exit();
}

$conn->close();
?>
