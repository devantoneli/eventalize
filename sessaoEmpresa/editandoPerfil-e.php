<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

$cd_empresa = $_SESSION["cd_empresa"];
$nm_fantasia = $_POST['nm_fantasia'];
$ds_biografia = $_POST['ds_biografia'];
$nm_usuarioempresa = $_POST['nm_usuarioempresa'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $db_name);

//CONVERSAO BASE64 PARA JPEG
if(isset($_POST['url_fotoperfil']) && $_POST['url_fotoperfil'] != "mudara") {
    $post_imgperfil = $_POST['url_fotoperfil'];
    $post_imgperfil = str_replace('data:image/jpeg;base64,', '', $post_imgperfil);
    $post_imgperfil = str_replace(' ', '+', $post_imgperfil);
    $data = base64_decode($post_imgperfil);
    $nm_imgperfil = 'capa'.$cd_empresa.'.jpeg';
    //UPLOAD DE ARQUIVO CONVERTIDO
    $caminho_imgperfil = '../bancoImagens/servicos/' . $nm_imgperfil;
    file_put_contents($caminho_imgperfil, $data);
    // construir o caminho completo para a imagem a partir do diretório raiz do projeto
    // $url_imgperfil = '../bancoImagens/servicos/' .$nm_imgperfil;
    $url_imgperfil = '../bancoImagens/servicos/' . $nm_imgperfil . '?t=' . time();
    $_SESSION["url_fotoperfil"] = $url_imgperfil;
  
    $semfoto = false;
    }else {
        $semfoto = true;
    }

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "UPDATE tb_empresa SET nm_fantasia='$nm_fantasia',ds_biografia='$ds_biografia', nm_usuarioempresa='$nm_usuarioempresa', url_fotoperfil='$url_imgperfil' WHERE cd_empresa='$cd_empresa'";

if ($conn->query($sql)=== TRUE){
    header('Location: perfilEmpresa.php');
} else{
    echo "Error updating record: " . $conn->error;
}


$conn->close();
?>