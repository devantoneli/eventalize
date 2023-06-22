<?php
$diferente = FALSE;
$invalido = FALSE;

if(isset($_POST['nm_cliente']) && isset($_POST['nm_sobrenome']) && isset($_POST['cd_cpf']) && isset($_POST['nm_senhacliente']) && isset($_POST['senha2']) && isset($_POST['nm_emailcliente']) && isset($_POST['nm_usuariocliente'])){

    $cpf = $_POST['cd_cpf'];
    $senha = $_POST['nm_senhacliente'];
    $senha2 = $_POST['senha2'];
    
    if($senha != $senha2){
        $diferente = '<label for="senha2"><a class="labelV">Certifique-se de digitar a mesma senha nos dois campos</a></label>';
        $validacao = 1;
    }
    if (preg_match('/^(?=.*[0-9])(?=.*[^\w\s]).{8,}$/', $senha)) {
        
    } else {
        // A senha não atende aos requisitos
        $invalido = '<label for="nm_senhacliente"><a class="labelV">A senha deve ter no mínimo 8 caracteres, um símbolo e um número.</a></label>';
        $validacao = 1;
    }

}

function validarCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($i = 9, $j = 0, $soma = 0; $i > 0; $i--, $j++) {
        $soma += $cpf[$j] * $i;
    }

    $resto = $soma % 11;

    if ($cpf[9] != ($resto < 2 ? 0 : 11 - $resto)) {
        return false;
    }

    for ($i = 10, $j = 0, $soma = 0; $i > 1; $i--, $j++) {
        $soma += $cpf[$j] * $i;
    }

    $resto = $soma % 11;

    if ($cpf[10] != ($resto < 2 ? 0 : 11 - $resto)) {
        return false;
    }

    return true;
}

function obterEstadoCPF($cpf) {
    $digitoEstado = substr($cpf, 8, 1);

    $estados = [
        '0' => 'Rio Grande do Sul',
        '1' => 'Distrito Federal, Goiás, Mato Grosso do Sul, Tocantins',
        '2' => 'Pará, Amazonas, Acre, Amapá, Rondônia, Roraima',
        '3' => 'Ceará, Maranhão, Piauí',
        '4' => 'Pernambuco, Rio Grande do Norte, Paraíba, Alagoas',
        '5' => 'Bahia, Sergipe',
        '6' => 'Minas Gerais',
        '7' => 'Rio de Janeiro, Espírito Santo',
        '8' => 'São Paulo',
        '9' => 'Paraná, Santa Catarina'
    ];

    return isset($estados[$digitoEstado]) ? $estados[$digitoEstado] : 'Estado não identificado';
}

// Exemplo de uso:
$cpf = '527.042.258-18';

if (validarCPF($cpf)) {
    echo "CPF válido. Estado: " . obterEstadoCPF($cpf);
} else {
    echo "CPF inválido.";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- FRONT-END formulário para inserir informações da empresa e enviar ao arquivo validarCliente.php, para cadastrar -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se cadastre como cliente</title>
    <link rel="stylesheet" href="css/estiloPerfil-c.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <script src="cadastrocliente.js"></script>
</head>
<body id="cliente"> 
    <div class="cont">
        <center>
        <div class="bigBoxCliente">
            <br>
        <div class="box">
                <h2 class="estiloFonte">EVENTALIZE</h2>
                <h3>Cadastre-se como Cliente</h3>
                <form action="" method="POST">              
                <div class="gridUmCadastro">
                    <input required type="text" class="retangulo" placeholder="Nome" name="nm_cliente">
                    <div></div>
                    <input required type="text" class="retangulo" placeholder="Sobrenome" name="nm_sobrenome">
                </div>
                <br>
                <div class="gridSegCadastro">
                    <input required type="email" class="retangulo" placeholder="E-mail" name="nm_emailcliente">
                </div>
                <br>
                <div class="gridSegCadastro">
                    <input required type="number" placeholder="CPF" name="cd_cpf" class="retangulo outrosInputs <?php echo $labelCpf ? $incorreto : ''; ?>">
                    <?php echo $labelCpf ? $labelCpf : ''; ?>
                </div>
                <br>
                <div class="gridUmCadastro">
                    <input required type="password" placeholder="Senha" name="nm_senhacliente" class="retangulo outrosInputs <?php echo $invalido ? $incorreto : ''; ?>">
                    <?php echo $invalido ? $invalido : ''; ?>
                    <div></div>
                    <input required type="password" name="senha2" placeholder="Repita a senha" class="retangulo outrosInputs <?php echo $diferente ? $incorreto : ''; ?>">
                    <?php echo $diferente ? $diferente : ''; ?>
                </div>
                <br>
                <div class="gridSegCadastro">
                    <input required type="text" class="retangulo" placeholder="Nome de usuário" name="nm_usuariocliente">
                </div>
                <div class="termos">
                    <input required type="checkbox">
                    <h4>Eu li e concordo com os 
                        <h4 class="rosaEstilo">termos de uso</h4>
                    </h4>
                </div> 
                <center>   
                    <button id="buttonCadastro" type="submit">Cadastrar</button>
                </center>
               <div class="h4Grid">
                <h4>Já possui uma conta? <h4> <a class="rosaEstilo" href="../index.html">Entrar </a></h4></h4>
               </div>
               <div class="h4Grids">
                <h4>Deseja se <h4> <a class="azulEstilo" href="../sessaoEmpresa/cadastrandoEmpresa.html"> cadastrar como Empresa?</a> </h4>
                </h4> 
               </div>    
            </center>
        </div>
    </div>
    </div>
</form>

</body>
</html>