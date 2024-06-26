<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Eventalize</title>
    <link rel="icon" href="img/index/logo.png">
    <link rel="stylesheet" href="css/estilo.css">
    <!-- <link rel="stylesheet" href="entrar.css"> -->
</head>
<body id="overflowEntrar">

    <!--HEADER homepage-->
    <header>
        <div class="logoHome">
            <img src="img/index/logo.png" alt="logo">
        </div>
            <div class="headerHome">
                <a href="index.html">Início</a>
                <a href="sessaoUsuario/explore.php">Explore</a>
                <a href="">Sobre Nós</a>
            </div>
            <div class="headerHomePerfil">
                <button class="estiloVazio" id="entrarHome" onclick="novaSection(1)"><a>Entrar</a></button>
                <button class="estiloVazio" id="entrarHome" onclick="novaSection(0)"><a href="cadastrar.html">Cadastrar</a></button>
            </div>
            <button class="menuIcon" onclick="menuOpen()"><img  src="img/index/menuicon.svg" width="30px"></button>
    </header>

        <div class="circleEntrar">
            <section id="loginCircEntrar">
                <h1 class="fontCirc">Entrar</h1>
                
                <form class="grid-loginCirc" action="login.php" method="post" onsubmit="return validarFormulario()">

                    <input class="inputCirc" id="usuario" name="nm_email" placeholder="Digite seu e-mail" type="email">
                    <input class="inputCirc" id="senha" name="nm_senha" placeholder="Digite sua senha" type="password">
                    
                    <p>Não tem login? <a href="cadastrar.html">Cadastre-se agora!</a></p>
                    <button class="btnCirc" type="sub
                    "><a>Entrar</a></button>
                    <br>
                    <a class="voltar" href="index.html">&lt;</a>
                    
                </form>
            </section>
        </div>
        

        <script>
            function validarFormulario() {
                // Obtém os valores dos campos
                var usuario = document.getElementById("usuario").value;
                var senha = document.getElementById("senha").value;
                
                // Verifica se os campos estão vazios
                if (senha === "" || usuario === "") {
                    alert("Por favor, preencha todos os campos.");
                    return false; // Impede o envio do formulário
                }
                
                // Se todos os campos estiverem preenchidos, o formulário pode ser enviado
                return true;
            }
        </script>

<?php if (isset($_GET['erro'])) {
    $mensagemErro = $_GET['erro'];
    echo "<script>alert('$mensagemErro');</script>";
  }
    ?>
   

<!-- <script src="js/menu.js"></script> -->

</body>
</html>