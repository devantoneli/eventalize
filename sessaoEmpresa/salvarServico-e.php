<?php

$nm_servico = $_POST['nm_servico'];
$ds_servico = $_POST['ds_servico'];
$vl_servico = $_POST["vl_servico"];
$cd_personaliz = $_POST["cd_personaliz"];
$cd_orcament = $_POST["cd_orcament"];
$cd_local = $_POST["cd_local"];
// $cd_empresa = $_POST['cd_empresa'];
$cd_tiposervico = $_POST['cd_tiposervico'];

// BACK-END para salvar um serviço e finalizar sua criação com as informações enviadas pelo arquivo FRONT-END edicaoServico.html

// var_dump($_POST);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

//ULTIMA PRIMARY KEY para somar um e fazer a primary key atual, para nomear as imagens corretamente
$sql = "SELECT MAX(cd_servico) as 'ultimo' FROM tb_servico";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cd_servico = $row['ultimo'] + 1;

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

if ($semimg2 == false && $semimg3 == false){
    $sql = "INSERT INTO tb_servico(nm_servico, ds_servico, vl_servico, cd_personaliz, cd_orcament, cd_local, cd_tiposervico, url_imgcapa, url_img2, url_img3) VALUES ('$nm_servico','$ds_servico', $vl_servico, $cd_personaliz, $cd_orcament, $cd_local, $cd_tiposervico, '$url_imgcapa', '$url_img2', '$url_img3')";
}else if ($semimg2 == true){
    $sql = "INSERT INTO tb_servico(nm_servico, ds_servico, vl_servico, cd_personaliz, cd_orcament, cd_local, cd_tiposervico, url_imgcapa, url_img3) values ('$nm_servico','$ds_servico', $vl_servico, $cd_personaliz, $cd_orcament, $cd_local, $cd_tiposervico, '$url_imgcapa', '$url_img3')";
}else {
    $sql = "INSERT INTO tb_servico(nm_servico, ds_servico, vl_servico, cd_personaliz, cd_orcament, cd_local, cd_tiposervico, url_imgcapa, url_img2) values ('$nm_servico','$ds_servico', $vl_servico, $cd_personaliz, $cd_orcament, $cd_local, $cd_tiposervico, '$url_imgcapa', '$url_img2')";
}


if ($conn->query($sql)=== TRUE){
    echo '<h1>Informações inseridas</h1>';
} else{
    echo "Error: " . $sql . "<br>" .  $conn->error;
}


//CASO VCS SE ESQUEÇAM, AS IMAGENS NÃO ESTÃO SENDO EXIBIDAS, POIS NÃO ESTAMOS PEDINDO PARA ELAS SEREM EXIBIDAS, NÃO SURTEM!
$conn->close();

?>

