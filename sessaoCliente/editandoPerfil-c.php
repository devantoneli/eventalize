<?php

if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

$cd_cliente = $_SESSION["cd_cliente"];
$nm_cliente = $_POST['nm_cliente'];
$nm_sobrenome = $_POST['nm_sobrenome'];
$nm_usuariocliente = $_POST['nm_usuariocliente'];

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
    $nm_imgperfil = 'capa'.$cd_cliente.'.jpeg';
    //UPLOAD DE ARQUIVO CONVERTIDO
    $caminho_imgperfil = '../bancoImagens/servicos/' . $nm_imgperfil;
    file_put_contents($caminho_imgperfil, $data);
    // construir o caminho completo para a imagem a partir do diretório raiz do projeto
    // $url_imgperfil = '../bancoImagens/servicos/' .$nm_imgperfil;
    $url_imgperfil = '../bancoImagens/servicos/' . $nm_imgperfil . '?t=' . time();

    echo "se AESFFAm";
    $semfoto = false;
    $_SESSION["url_fotoperfil"] = $url_imgperfil;
    }else {
        $semfoto = true;
    }
    
if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "UPDATE tb_cliente SET nm_cliente='$nm_cliente',nm_sobrenome='$nm_sobrenome', nm_usuariocliente='$nm_usuariocliente', url_fotoperfil='$url_imgperfil' WHERE cd_cliente='$cd_cliente'";

if ($conn->query($sql)=== TRUE){
    header('Location: perfil-c.php');

} else{
    header('Location: perfil-c.php');
}

$conn->close();
?>