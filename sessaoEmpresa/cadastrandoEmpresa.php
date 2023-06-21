<?php

$popup = FALSE;
$incorreto = "incorreto";
$incorretoCnpj = FALSE;
$label = FALSE;
$labelFantasia = FALSE;

if(isset($_POST['nm_fantasia']) && isset($_POST['nm_razaosocial']) && isset($_POST['cd_cnpj'])){
    $fantasia = $_POST['nm_fantasia'];
    $razao = $_POST['nm_razaosocial'];
    $cnpj = $_POST['cd_cnpj'];
        $url = 'https://www.receitaws.com.br/v1/cnpj/'.$cnpj.'';
        if ($response = @file_get_contents($url)){
            $data = json_decode($response, true);
    
            //Verifica se houve algum erro na consulta
            if ($data['status'] === 'ERROR'){
                $incorretoCnpj = TRUE;
                $label = '<label for="juridica"><a class="labelV">CNPJ inexistente</a></label>';
            }else {
                $razaoSocial = $data['nome'];
                $nomeFantasia = $data['fantasia'];
                $endereco = $data['logradouro'];
                $bairro = $data['bairro'];
                $cidade = $data['municipio'];
                $estado = $data['uf'];

                if($fantasia!=$nomeFantasia){
                    $labelFantasia = '<label for="nm_fantasia"><a class="labelV">O nome fantasia não condiz com o do CNPJ informado</a></label>';
                }
            } 
        }else{
            $popup = "<div class='popupErro'><img src='../img/icones/exclamacao.svg' width='150px'><h2>Desculpe-nos! Algo deu errado no processamento dos dados. Por favor, tente novamente mais tarde ou tente <a href='cadastrandoEmpresa.php'>recarregar a página</a>.</h2></div>";
            unset($_POST);

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
    <title>Se cadastre como empresa ou profissional</title>
    <link rel="stylesheet" href="css/estiloPerfil-e.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body id="empresa">
    <?php
        if($popup){
            echo $popup;
            $popup = FALSE;
        }
    ?>
    <div class="cont">
        <center>
        <div class="bigBoxEmpresa">
            <br>
         <div class="box">
                <h2 class="estiloFonte">EVENTALIZE</h2><br>
                <h3>Cadastre-se como Empresa ou Profissional</h3><br>
                <form action="" id="cadastrarEmp" method="POST">                      
                             <div class="gridSegCadastro">
                                        <div class="inputs">
                                            <input required type="text" value="<?php echo isset($_POST['nm_fantasia']) ? $_POST['nm_fantasia'] : ''; ?>" placeholder="Nome Fantasia" name="nm_fantasia" class="retangulo outrosInputs <?php echo $labelFantasia ? $incorreto : ''; ?>">
                                        <?php echo $labelFantasia ? $labelFantasia : ''; ?>
                                        </div>
                                    </div>
                                    <br>    
                                    <div class="gridSegCadastro">
                                        <input required type="text" value="<?php echo isset($_POST['nm_razaosocial']) ? $_POST['nm_razaosocial'] : ''; ?>" class="retangulo outrosInputs" placeholder="Razão Social" name="nm_razaosocial">
                                    </div>
                                    <br>
                                <div class="gridUmCadastro">
                                    <div class="inputs">
                                        <input required type="date" value="<?php echo isset($_POST['abertura']) ? $_POST['abertura'] : ''; ?>" name="abertura" class="retangulo outrosInputs" placeholder="Data de abertura" title="Data de abertura">
                                    </div>
                                    <div></div>
                                    <div class="inputs">
                                        <input required type="number" value="<?php echo isset($_POST['cd_cnpj']) ? $_POST['cd_cnpj'] : ''; ?>" placeholder="CNPJ" name="cd_cnpj" class="retangulo outrosInputs <?php echo $incorretoCnpj ? $incorreto : ''; ?>">
                                        <?php echo $label ? $label : ''; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="gridUmCadastro">
                                    <input name="logradouro" required type="text" value="<?php echo isset($_POST['logradouro']) ? $_POST['logradouro'] : ''; ?>" class="retangulo outrosInputs" placeholder="Logradouro (rua)">
                                    <div></div>
                                    <input required type="text" value="<?php echo isset($_POST['jbairro']) ? $_POST['bairro'] : ''; ?>" name="bairro" class="retangulo outrosInputs" placeholder="Natureza Juridica">
                                </div>
                                <br>
                                <div class="gridSegCadastro">
                                    <input required type="text" value="<?php echo isset($_POST['nm_usuarioempresa']) ? $_POST['nm_usuarioempresa'] : ''; ?>" class="retangulo outrosInputs" placeholder="Nome do usuário" name="nm_usuarioempresa">
                                </div>
                                <br>
                                <div class="gridSegCadastro">
                                    <input required type="email" value="<?php echo isset($_POST['nm_emailempresa']) ? $_POST['nm_emailempresa'] : ''; ?>" class="retangulo outrosInputs" placeholder="Email" name="nm_emailempresa">
                                </div>
                                <br>
                                <div class="gridUmCadastro">
                                    <input required type="password" value="<?php echo isset($_POST['nm_senhaempresa']) ? $_POST['nm_senhaempresa'] : ''; ?>" class="retangulo outrosInputs" placeholder="Senha" name="nm_senhaempresa">
                                    <div></div>
                                    <input required type="password" value="<?php echo isset($_POST['nm_senhaempresa']) ? $_POST['nm_senhaempresa'] : ''; ?>" class="retangulo outrosInputs" placeholder="Repita a senha">
                                </div>
                                <br>
                                <div class="gridUmCadastro">
                                    <input required type="text" value="<?php echo isset($_POST['estado']) ? $_POST['estado'] : ''; ?>" class="retangulo outrosInputs" name="estado" placeholder="Estado">
                                    <div></div>
                                    <input required type="text" value="<?php echo isset($_POST['cidade']) ? $_POST['cidade'] : ''; ?>" class="retangulo outrosInputs" name="cidade" placeholder="Cidade">
                                </div>
                            <br>
                                <div class="termos">
                                    <input required type="checkbox">
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