<?php

if(isset($_GET['nm_fantasia']) && isset($_GET['nm_razaosocial']) && isset($_GET['cd_cnpj'])){
    $fantasia = $_GET['nm_fantasia'];
    $razao = $_GET['nm_razaosocial'];
    $cnpj = $_GET['cd_cnpj'];

    $url = 'https://www.receitaws.com.br/v1/cnpj/'.$cnpj.'';
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    //Verifica se houve algum erro na consulta
    if ($data['status'] === 'ERROR'){
        echo 'Erro: ' . $data['message'];
    }else {
        $razaoSocial = $data['nome'];
        $endereco = $data['logradouro'];
        $bairro = $data['bairro'];
        $cidade = $data['municipio'];
        $estado = $data['uf'];
    }

    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- FRONT-END formulário para inserir informações da empresa e enviar ao arquivo validarEmpresa.php, para cadastrar -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se cadastre como cliente</title>
    <link rel="stylesheet" href="css/estiloPerfil-e.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body id="empresa">
    <div class="cont">
        <center>
        <div class="bigBoxEmpresa">
            <br>
         <div class="box">
                <h2 class="estiloFonte">EVENTALIZE</h2><br>
                <h3>Cadastre-se como Empresa ou Profissional</h3><br>
                <form action="" id="cadastrarEmp">                      
                             <div class="gridSegCadastro">
                                        <input required type="text" class="retangulo" placeholder="Nome Fantasia" name="nm_fantasia">
                                    </div>
                                    <br>    
                                    <div class="gridSegCadastro">
                                        <input required type="text" class="retangulo" placeholder="Razão Social" name="nm_razaosocial">
                                    </div>
                                    <br>
                                <div class="gridUmCadastro">
                                    <input required type="text" name="juridica" class="retangulo" placeholder="Natureza Juridica">
                                    <div></div>
                                    <input required type="number" class="retangulo" placeholder="CNPJ" name="cd_cnpj">
                                </div>
                                <br>
                                <div class="gridUmCadastro">
                                    <input required type="text" class="retangulo" placeholder="Atividade Economica">
                                    <div></div>
                                    <input required type="date" class="retangulo" placeholder="Data de fundação">
                                </div>
                                <br>
                                <div class="gridSegCadastro">
                                    <input required type="text" class="retangulo" placeholder="Nome do usuário" name="nm_usuarioempresa">
                                </div>
                                <br>
                                <div class="gridSegCadastro">
                                    <input required type="email" class="retangulo" placeholder="Email" name="nm_emailempresa">
                                </div>
                                <br>
                                <div class="gridUmCadastro">
                                    <input required type="password" class="retangulo" placeholder="Senha" name="nm_senhaempresa">
                                    <div></div>
                                    <input  required type="password" class="retangulo" placeholder="Repita a senha">
                                </div>
                                <br>
                                <div class="gridUmCadastro">
                                    <input  required type="text" class="retangulo" name="estado" placeholder="Estado">
                                    <div></div>
                                    <input  required type="text" class="retangulo" name="cidade" placeholder="Cidade">
                                </div>
                            <br>
                                <div class="termos">
                                    <input  required type="checkbox">
                                    <h4>Eu li e concordo com os 
                                        <h4 class="rosaEstilo">termos de uso</h4>
                                    </h4>
                                </div> <br>
                                <center>   
                                    <input type="submit">Cadastrar</input>
                                </center>
                                <br>
                            <div class="h4Grid">
                                <h4>Já possui uma conta? <h4> <a class="rosaEstilo" href="../index.html">Entrar </a></h4></h4>
                            </div>
                                
                            <div class="h4Grids">
                                <h4>Deseja se <h4> <a class="azulEstilo" href="../sessaoCliente/cadastrandoCliente.html"> cadastrar como Cliente?</a> </h4>
                                </h4> 
                            </div>      
                            </center>
                 </form>
                 </div>
             </div>    
       </div>
       <script src="js/cadastro.js"></script>
</body>
</html>