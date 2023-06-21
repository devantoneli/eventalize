<?php

$popup = FALSE;
$incorreto = "incorreto";
$incorretoCnpj = FALSE;
$label = FALSE;

$labelFantasia = FALSE;
$labelSocial = FALSE;
$labelData = FALSE;
$labelRua = FALSE;
$labelEstado = FALSE;
$labelCidade = FALSE;
$labelBairro = FALSE;

$diferente = FALSE;
$invalido = FALSE;

if(isset($_POST['nm_fantasia']) && isset($_POST['nm_razaosocial']) && isset($_POST['cd_cnpj'])){
    $fantasia = $_POST['nm_fantasia'];
    $social = $_POST['nm_razaosocial'];
    $razao = $_POST['nm_razaosocial'];
    $cnpj = $_POST['cd_cnpj'];
    $logradouro = $_POST['logradouro'];
    $bairroP = $_POST['bairro'];
    $estadoP = $_POST['estado'];
    $cidadeP = $_POST['cidade'];

    $aberturaA = $_POST['abertura'];
    $abertura = date('d/m/Y', strtotime($aberturaA));
    
    $senha = $_POST['nm_senhaempresa'];
    $senha2 = $_POST['senha2'];

    if($senha != $senha2){
        $diferente = '<label for="senha2"><a class="labelV">Certifique-se de digitar a mesma senha nos dois campos</a></label>';
    }
    if (preg_match('/^(?=.*[0-9])(?=.*[^\w\s]).{8,}$/', $senha)) {
        
    } else {
        // A senha não atende aos requisitos
        $invalido = '<label for="nm_senhaempresa"><a class="labelV">A senha deve ter no mínimo 8 caracteres, um símbolo e um número.</a></label>';
    }

        $url = 'https://www.receitaws.com.br/v1/cnpj/'.$cnpj.'';
        if ($response = @file_get_contents($url)){
            $data = json_decode($response, true);
    
            //Verifica se houve algum erro na consulta
            if ($data['status'] === 'ERROR'){
                $incorretoCnpj = TRUE;
                $label = '<label for="juridica"><a class="labelV">CNPJ incorreto ou inexistente</a></label>';
            }else {
                $razaoSocial = $data['nome'];
                $nomeFantasia = $data['fantasia'];
                $dataAbert = $data['abertura'];
                $rua = $data['logradouro'];
                $bairro = $data['bairro'];
                $cidade = $data['municipio'];
                $estado = $data['uf'];

                //Verificando campos informados
                if($fantasia!=$nomeFantasia){
                    $labelFantasia = '<label for="nm_fantasia"><a class="labelV">O nome fantasia não condiz com o do CNPJ informado</a></label>';
                }
                if($social!=$razaoSocial){
                    $labelSocial = '<label for="nm_razaosocial"><a class="labelV">A razão social não condiz com o do CNPJ informado</a></label>';
                }
                if($abertura!=$dataAbert){
                    $labelData = '<label for="abertura"><a class="labelV">A data de abertura não condiz com a do CNPJ informado</a></label>';
                }
                if($logradouro!=$rua){
                    $labelRua = '<label for="logradouro"><a class="labelV">O logradouro não condiz com o do CNPJ informado</a></label>';
                }
                if($estadoP!=$estado){
                    $labelEstado = '<label for="estado"><a class="labelV">O estado não condiz com o do CNPJ informado</a></label>';
                }
                if($cidadeP!=$cidade){
                    $labelCidade = '<label for="cidade"><a class="labelV">A cidade não condiz com a do CNPJ informado</a></label>';
                }
                if($bairroP!=$bairro){
                    $labelBairro = '<label for="bairro"><a class="labelV">O bairro não condiz com o do CNPJ informado</a></label>';
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
                                        <div class="inputs">
                                            <input required type="text" value="<?php echo isset($_POST['nm_razaosocial']) ? $_POST['nm_razaosocial'] : ''; ?>"  placeholder="Razão Social" name="nm_razaosocial" class="retangulo outrosInputs <?php echo $labelSocial ? $incorreto : ''; ?>">
                                            <?php echo $labelSocial ? $labelSocial : ''; ?>
                                        </div>
                                    </div>
                                    <br>
                                <div class="gridUmCadastro">
                                    <div class="inputs">
                                        <input required type="date" value="<?php echo isset($_POST['abertura']) ? $_POST['abertura'] : ''; ?>" name="abertura" placeholder="Data de abertura" title="Data de abertura" class="retangulo outrosInputs <?php echo $labelData ? $incorreto : ''; ?>">
                                            <?php echo $labelData ? $labelData : ''; ?>
                                    </div>
                                    <div></div>
                                    <div class="inputs">
                                        <input required type="number" value="<?php echo isset($_POST['cd_cnpj']) ? $_POST['cd_cnpj'] : ''; ?>" placeholder="CNPJ" name="cd_cnpj" class="retangulo outrosInputs <?php echo $incorretoCnpj ? $incorreto : ''; ?>">
                                        <?php echo $label ? $label : ''; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="gridUmCadastro">
                                    <div class="inputs">
                                        <input name="logradouro" required type="text" value="<?php echo isset($_POST['logradouro']) ? $_POST['logradouro'] : ''; ?>" placeholder="Logradouro (rua)" class="retangulo outrosInputs <?php echo $labelRua ? $incorreto : ''; ?>">
                                            <?php echo $labelRua ? $labelRua : ''; ?>
                                    </div>
                                    <div></div>
                                    <div class="inputs">
                                        <input required type="text" value="<?php echo isset($_POST['bairro']) ? $_POST['bairro'] : ''; ?>" name="bairro" placeholder="Bairro" class="retangulo outrosInputs <?php echo $labelBairro ? $incorreto : ''; ?>">
                                            <?php echo $labelBairro ? $labelBairro : ''; ?>
                                    </div>
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
                                    <div class="inputs">   
                                        <input required type="password" id="senha" onpaste="limparColagem(event)" value="<?php echo isset($_POST['nm_senhaempresa']) ? $_POST['nm_senhaempresa'] : ''; ?>" placeholder="Senha" name="nm_senhaempresa" class="retangulo outrosInputs <?php echo $invalido ? $incorreto : ''; ?>">
                                                <?php echo $invalido ? $invalido : ''; ?>
                                    </div>
                                    <div></div>
                                    <div class="inputs">
                                        <input required type="password" value="<?php echo isset($_POST['senha2']) ? $_POST['senha2'] : ''; ?>"  name="senha2" placeholder="Repita a senha" class="retangulo outrosInputs <?php echo $diferente ? $incorreto : ''; ?>">
                                                <?php echo $diferente ? $diferente : ''; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="gridUmCadastro">
                                    <div class="inputs">
                                            <select value="<?php echo isset($_POST['estado']) ? $_POST['estado'] : ''; ?>"  id="estado" name="estado" onchange="atualizarCidades()" class="retangulo outrosInputs <?php echo $labelEstado ? $incorreto : ''; ?>">
                                            <?php echo $labelEstado ? $labelEstado : ''; ?>
                                            <option value="">Selecione um estado</option>
                                            
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </select>
                                    </div>
                                    <div></div>
                                    <div class="inputs">
                                        <input required type="text" value="<?php echo isset($_POST['cidade']) ? $_POST['cidade'] : ''; ?>" name="cidade" placeholder="Cidade" class="retangulo outrosInputs <?php echo $labelCidade ? $incorreto : ''; ?>">
                                                <?php echo $labelCidade ? $labelCidade : ''; ?>
                                    </div>
                                </div>
                            <br>
                                <div class="termos">
                                    <input required type="checkbox">
                                    <h4>Eu li e concordo com os 
                                        <h4 class="rosaEstilo">termos de uso</h4>
                                    </h4>
                                </div> <br>
                                <center>   
                                    <input type="submit" value="Cadastrar">
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