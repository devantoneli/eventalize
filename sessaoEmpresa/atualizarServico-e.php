<?php
$nm_servico = $_POST['nm_servico'];
$ds_servico = $_POST['ds_servico'];
$vl_servico = $_POST['vl_servico'];
$cd_personaliz = $_POST['cd_personaliz'];
$cd_orcament = $_POST['cd_orcament'];
$cd_local = $_POST['cd_local'];
$cd_servico = $_POST['cd_servico'];
$cd_tiposervico = $_POST['cd_tiposervico'];

// BACK-END para salvar alterações enviadas pelo arquivo edicaoServico-e.php

var_dump($_POST);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

//CONVERSAO BASE64 PARA JPEG
$post_imgcapa = $_POST['url_imgcapa'];
$post_imgcapa = str_replace('data:image/jpeg;base64,', '', $post_imgcapa);
$post_imgcapa = str_replace(' ', '+', $post_imgcapa);
$data = base64_decode($post_imgcapa);
$nm_imgcapa = 'capa'.$cd_servico.'.jpeg';
//UPLOAD DE ARQUIVO CONVERTIDO
$caminho_capa = '../bancoImagens/servicos/' . $nm_imgcapa;
file_put_contents($caminho_capa, $data);
// construir o caminho completo para a imagem a partir do diretório raiz do projeto
$url_imgcapa = '../bancoImagens/servicos/' .$nm_imgcapa;


if(isset($_POST['url_img2'])) {
    // //CONVERSAO BASE64 PARA JPEG
    $post_img2 = $_POST['url_img2'];
    $post_img2 = str_replace('data:image/jpeg;base64,', '', $post_img2);
    $post_img2 = str_replace(' ', '+', $post_img2);
    $data = base64_decode($post_img2);
    $nm_img2 = 'img2-'.$cd_servico.'.jpeg';
    //UPLOAD DE ARQUIVO CONVERTIDO
    $caminho_img2 = '../bancoImagens/servicos/' . $nm_img2;
    file_put_contents($caminho_img2, $data);
    // construir o caminho completo para a imagem a partir do diretório raiz do projeto
    $url_img2 = '../bancoImagens/servicos/' .$nm_img2;
    $semimg2 = false;
}else {
    $semimg2 = true;
}

if(isset($_POST['url_img3'])) {
    // //CONVERSAO BASE64 PARA JPEG
    $post_img3 = $_POST['url_img3'];
    $post_img3 = str_replace('data:image/jpeg;base64,', '', $post_img3);
    $post_img3 = str_replace(' ', '+', $post_img3);
    $data = base64_decode($post_img3);
    $nm_img3 = 'img3-'.$cd_servico.'.jpeg';
    //UPLOAD DE ARQUIVO CONVERTIDO
    $caminho_img3 = '../bancoImagens/servicos/' . $nm_img3;
    file_put_contents($caminho_img3, $data);
    // construir o caminho completo para a imagem a partir do diretório raiz do projeto
    $url_img3 = '../bancoImagens/servicos/' .$nm_img3;
    $semimg3 = false;
}else {
    $semimg3 = true;
}

echo ($url_img3);

if ($semimg2 == false && $semimg3 == false){
    $sql = "UPDATE tb_servico SET nm_servico='$nm_servico',ds_servico='$ds_servico', vl_servico=$vl_servico, cd_personaliz=$cd_personaliz, cd_orcament=$cd_orcament, cd_local=$cd_local, cd_tiposervico=$cd_tiposervico, url_imgcapa='$url_imgcapa', url_img2='$url_img2', url_img3='$url_img3' WHERE cd_servico=$cd_servico";
}else if ($semimg2 == true){
    $sql = "UPDATE tb_servico SET nm_servico='$nm_servico',ds_servico='$ds_servico', vl_servico=$vl_servico, cd_personaliz=$cd_personaliz, cd_orcament=$cd_orcament, cd_local=$cd_local, cd_tiposervico=$cd_tiposervico, url_imgcapa='$url_imgcapa', url_img3='$url_img3' WHERE cd_servico=$cd_servico";
}else {
    $sql = "UPDATE tb_servico SET nm_servico='$nm_servico', ds_servico='$ds_servico', vl_servico=$vl_servico, cd_personaliz=$cd_personaliz, cd_orcament=$cd_orcament, cd_local=$cd_local, cd_tiposervico=$cd_tiposervico, url_imgcapa='$url_imgcapa', url_img2='$url_img2' WHERE cd_servico=$cd_servico";
}


if ($conn->query($sql)=== TRUE){
    echo '<h1>Informações alteradas com sucesso</h1>';
} else{
    echo "Error updating record: " . $conn->error;
}

$conn->close();


?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<img src="">
</body>
</html> -->
