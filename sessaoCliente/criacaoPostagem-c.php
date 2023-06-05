<?php

//INSERT DE POSTAGEM CLIENTE (CRIAÇÃO DE POSTAGEM)
if(!isset($_SESSION)){
    session_start();
}

include('../protect.php');

$dataAtual = date('Y-m-d H:i:s');

$cd_cliente = $_SESSION["cd_cliente"];
// $cd_postagem = $_POST['cd_postagem'];
$nm_postagem = $_POST['nm_postagem'];
$ds_postagem = $_POST['ds_postagem'];
if (!isset($_POST['cd_pedido'])){
    echo "nada nao";
    }
$cd_pedido = $_POST['cd_pedido'];


$cd_avaliacao = $_POST['cd_avaliacao'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eventalize";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// $result = $conn->query($sql);

// $result_query = mysqli_query($conn, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conn));


// if($conn->query($sql)=== TRUE){
//     // header('Location: /sistema/eventalize/sessaoUsuario/postagem-usuario.html');
//     echo 'funfou';
// }
// else{
//     echo "Erro: " . $sql . "<br>" . $conn->error;
// }

//ULTIMA PRIMARY KEY para somar um e fazer a primary key atual, para nomear as imagens corretamente
$sql = "SELECT MAX(cd_postagem) as 'ultimo' FROM tb_postagem";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cd_postagem = $row['ultimo'] + 1;

//CONVERSAO BASE64 PARA JPEG
$post_imgcapa = $_POST['url_imgcapa'];
$post_imgcapa = str_replace('data:image/jpeg;base64,', '', $post_imgcapa);
$post_imgcapa = str_replace(' ', '+', $post_imgcapa);
$data = base64_decode($post_imgcapa);
$nm_imgcapa = 'capa'.$cd_postagem.'.jpeg';
//UPLOAD DE ARQUIVO CONVERTIDO
$caminho_capa = '../bancoImagens/postagens/' . $nm_imgcapa;
file_put_contents($caminho_capa, $data);
// construir o caminho completo para a imagem a partir do diretório raiz do projeto
$url_imgcapa = '../bancoImagens/postagens/' .$nm_imgcapa;


if(isset($_POST['url_img2'])) {
    // //CONVERSAO BASE64 PARA JPEG
    $post_img2 = $_POST['url_img2'];
    $post_img2 = str_replace('data:image/jpeg;base64,', '', $post_img2);
    $post_img2 = str_replace(' ', '+', $post_img2);
    $data = base64_decode($post_img2);
    $nm_img2 = 'img2-'.$cd_postagem.'.jpeg';
    //UPLOAD DE ARQUIVO CONVERTIDO
    $caminho_img2 = '../bancoImagens/postagens/' . $nm_img2;
    file_put_contents($caminho_img2, $data);
    // construir o caminho completo para a imagem a partir do diretório raiz do projeto
    $url_img2 = '../bancoImagens/postagens/' .$nm_img2;
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
    $nm_img3 = 'img3-'.$cd_postagem.'.jpeg';
    //UPLOAD DE ARQUIVO CONVERTIDO
    $caminho_img3 = '../bancoImagens/postagens/' . $nm_img3;
    file_put_contents($caminho_img3, $data);
    // construir o caminho completo para a imagem a partir do diretório raiz do projeto
    $url_img3 = '../bancoImagens/postagens/' .$nm_img3;
    $semimg3 = false;
}else {
    $semimg3 = true;
}

if ($semimg2 == false && $semimg3 == false){
    $sql = "INSERT INTO tb_postagem(cd_cliente, nm_postagem, ds_postagem, url_imgcapa, url_img2, url_img3, cd_avaliacao, cd_pedido, dt_postagem, cd_tipoautor) VALUES ($cd_cliente, '$nm_postagem', '$ds_postagem', '$url_imgcapa', '$url_img2', '$url_img3', $cd_avaliacao, $cd_pedido, '$dataAtual', 1)";
}else if ($semimg2 == true){
      $sql = "INSERT INTO tb_postagem(cd_cliente, nm_postagem, ds_postagem, url_imgcapa, url_img2, url_img3, cd_avaliacao, cd_pedido, dt_postagem, cd_tipoautor) VALUES ($cd_cliente, '$nm_postagem', '$ds_postagem', '$url_imgcapa', '$url_img3', $cd_avaliacao, $cd_pedido, '$dataAtual', 1)";
}else {
    $sql = "INSERT INTO tb_postagem(cd_cliente, nm_postagem, ds_postagem, url_imgcapa, url_img2, url_img3, cd_avaliacao, cd_pedido, dt_postagem, cd_tipoautor) VALUES ($cd_cliente, '$nm_postagem', '$ds_postagem', '$url_imgcapa', '$url_img2', $cd_avaliacao, $cd_pedido, '$dataAtual', 1)";
}

if ($conn->query($sql)=== TRUE){
    header('Location: perfil-c.php');
} else{
    echo "Error: " . $sql . "<br>" .  $conn->error;
}


//CASO VCS SE ESQUEÇAM, AS IMAGENS NÃO ESTÃO SENDO EXIBIDAS, POIS NÃO ESTAMOS PEDINDO PARA ELAS SEREM EXIBIDAS, NÃO SURTEM!
$conn->close();

?>