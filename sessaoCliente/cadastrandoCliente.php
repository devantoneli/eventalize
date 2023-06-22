<?php
$diferente = FALSE;
$invalido = FALSE;
$labelCpf = FALSE;
$incorreto = "incorreto";
$validacao = 0;
$popup = FALSE;

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
    
    /* VALIDAÇÃO CPF */
$dig = array_fill(0, 11, 0);
$digd = array_fill(0, 11, 0);
$rr = array_fill(0, 11, 0);
$vali = array_fill(0, 2, 0);
$valitt = array_fill(0, 2, 0);
$tt = 0;
$tt1 = 0;
$tt2 = 0;

if ($cpf < 99999999999) {
    $rr[0] = $cpf % 10000000000;
    $digd[0] = $rr[0] * 0.0000000001;
    $dig[0] = $cpf / 10000000000;
    $dig[0] = $dig[0] - $digd[0];

    $rr[1] = $rr[0] % 1000000000;
    $digd[1] = $rr[1] * 0.000000001;
    $dig[1] = $rr[0] / 1000000000;
    $dig[1] = $dig[1] - $digd[1];

    $rr[2] = $rr[1] % 100000000;
    $digd[2] = $rr[2] * 0.00000001;
    $dig[2] = $rr[1] / 100000000;
    $dig[2] = $dig[2] - $digd[2];

    $rr[3] = $rr[2] % 10000000;
    $digd[3] = $rr[3] * 0.0000001;
    $dig[3] = $rr[2] / 10000000;
    $dig[3] = $dig[3] - $digd[3];

    $rr[4] = $rr[3] % 1000000;
    $digd[4] = $rr[4] * 0.000001;
    $dig[4] = $rr[3] / 1000000;
    $dig[4] = $dig[4] - $digd[4];

    $rr[5] = $rr[4] % 100000;
    $digd[5] = $rr[5] * 0.00001;
    $dig[5] = $rr[4] / 100000;
    $dig[5] = $dig[5] - $digd[5];

    $rr[6] = $rr[5] % 10000;
    $digd[6] = $rr[6] * 0.0001;
    $dig[6] = $rr[5] / 10000;
    $dig[6] = $dig[6] - $digd[6];

    $rr[7] = $rr[6] % 1000;
    $digd[7] = $rr[7] * 0.001;
    $dig[7] = $rr[6] / 1000;
    $dig[7] = $dig[7] - $digd[7];

    $rr[8] = $rr[7] % 100;
    $digd[8] = $rr[8] * 0.01;
    $dig[8] = $rr[7] / 100;
    $dig[8] = $dig[8] - $digd[8];

    $rr[9] = $rr[8] % 10;
    $digd[9] = $rr[9] * 0.1;
    $dig[9] = $rr[8] / 10;
    $dig[9] = $dig[9] - $digd[9];

    $rr[10] = $rr[9] % 1;
    $digd[10] = $rr[10] * 1;
    $dig[10] = $rr[9] / 1;
    $dig[10] = $dig[10] - $digd[10];

    /* VALIDANDO */

    $tt = $dig[0] + $dig[1] + $dig[2] + $dig[3] + $dig[4] + $dig[5] + $dig[6] + $dig[7] + $dig[8] + $dig[9] + $dig[10];

    $tt2 = $tt % 10;
    $tt1 = ($tt / 10) - ($tt2 * 0.1);

    $vali[0] = ($dig[0] * 1) + ($dig[1] * 2) + ($dig[2] * 3) + ($dig[3] * 4) + ($dig[4] * 5) + ($dig[5] * 6) + ($dig[6] * 7) + ($dig[7] * 8) + ($dig[8] * 9);
    $valitt[0] = $vali[0] % 11;

    $vali[1] = ($dig[0] * 0) + ($dig[1] * 1) + ($dig[2] * 2) + ($dig[3] * 3) + ($dig[4] * 4) + ($dig[5] * 5) + ($dig[6] * 6) + ($dig[7] * 7) + ($dig[8] * 8) + ($dig[9] * 9);
    $valitt[1] = $vali[1] % 11;

    if ($valitt[0] < 3 || $valitt[0] > 9) {
        $valitt[0] = 0;
    }

    if ($valitt[1] < 3 || $valitt[1] > 9) {
        $valitt[1] = 0;
    }

    if ($dig[0] == $dig[1] && $dig[0] == $dig[2] && $dig[0] == $dig[3] && $dig[0] == $dig[4] && $dig[0] == $dig[5] && $dig[0] == $dig[6] && $dig[0] == $dig[7] && $dig[0] == $dig[8] && $dig[0] == $dig[9] && $dig[0] == $dig[10]) {
        $labelCpf = '<label for="cd_cpf"><a class="labelV">CPF inválido</a></label>';
        $validacao = 1;
    } elseif ($valitt[0] != $dig[9] && $valitt[1] != $dig[10]) {
        $labelCpf = '<label for="cd_cpf"><a class="labelV">CPF inválido</a></label>';
        $validacao = 1;
    } elseif ($tt1 != $tt2 && $tt != 10 && $tt != 12 && $tt != 21 && $tt != 23 && $tt != 32 && $tt != 34 && $tt != 43 && $tt != 45 && $tt != 54 && $tt != 56 && $tt != 65 && $tt != 67 && $tt != 76 && $tt != 78 && $tt != 87) {
        $labelCpf = '<label for="cd_cpf"><a class="labelV">CPF inválido</a></label>';
        $validacao = 1;
    } else {
        if ($dig[8] == 8 || ($dig[8] > 7.9999 && $dig[8] < 8)) {
            $labelCpf = FALSE;
        }
        if ($dig[8] == 1 || $dig[8] == 2 || $dig[8] == 3 || $dig[8] == 4 || $dig[8] == 5 || $dig[8] == 6 || $dig[8] == 7 || $dig[8] == 9 || $dig[8] == 0) {
            $labelCpf = FALSE;
        }
    }
}else {
    $labelCpf = '<label for="cd_cpf"><a class="labelV">CPF inválido</a></label>';
    $validacao = 1;
}

if ($validacao == 0){

    $nm_cliente = $_POST['nm_cliente'];
    $nm_sobrenome = $_POST['nm_sobrenome'];
    $cd_cpf = $_POST['cd_cpf'];
    $nm_usuariocliente = $_POST['nm_usuariocliente'];
    $nm_emailcliente = $_POST['nm_emailcliente'];
    $nm_senhacliente = $_POST['nm_senhacliente'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "db_eventalize";
    
    
    $conn = new mysqli($servername, $username, $password, $db_name);
    
    
    if($conn->connect_error){
        die("Falha na conexão: " . $conn->connect_error);
    }
    
    $sql = 'INSERT INTO tb_cliente (nm_cliente,cd_cpf, nm_usuariocliente, nm_emailcliente, nm_senhacliente) VALUES (' . "'" . $nm_cliente ."'" . ', ' . "'" . $cd_cpf . "'" . ',' . "'" . $nm_usuariocliente . "'" . ', ' . "'" . $nm_emailcliente . "'" . ', ' . "'" . $nm_senhacliente . "'" . ')';
    
    if(!isset($_POST['nm_cliente']) || !isset($_POST['nm_sobrenome']) ||!isset($_POST['cd_cpf']) ||!isset($_POST['nm_usuariocliente']) ||!isset($_POST['nm_emailcliente']) ||!isset($_POST['nm_senhacliente'])){
    
    }else{
        if($conn->query($sql)=== TRUE){
            $popup = "<div class='popupErro'><img src='../img/icones/exclamacao.svg' width='150px'><h2>Cliente cadastrada com sucesso! Agora, realize o login clicando em 'Entrar' na nossa <a href='../index.html'>página inicial</a>.</h2></div>";
        }
        else{
            $popup = "<div class='popupErro'><img src='../img/icones/exclamacao.svg' width='150px'><h2>Desculpe-nos! Algo deu errado no processamento dos dados. Por favor, tente novamente mais tarde ou tente <a href='cadastrandoCmpresa.php'>recarregar a página</a>.</h2></div>";
        }
    }
}

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
    <?php
        if($popup){
            echo $popup;
            $popup = FALSE;
        }
    ?>
    <div class="cont">
        <center>
        <div class="bigBoxCliente">
            <br>
        <div class="box">
                <h2 class="estiloFonte">EVENTALIZE</h2>
                <h3>Cadastre-se como Cliente</h3>
                <form action="" method="POST">              
                <div class="gridUmCadastro">
                    <input required type="text" value="<?php echo isset($_POST['nm_cliente']) ? $_POST['nm_cliente'] : ''; ?>" class="retangulo maior" placeholder="Nome" name="nm_cliente">
                    <div></div>
                    <input required type="text" value="<?php echo isset($_POST['nm_sobrenome']) ? $_POST['nm_sobrenome'] : ''; ?>" class="retangulo maior" placeholder="Sobrenome" name="nm_sobrenome">
                </div>
                <br>
                <div class="gridSegCadastro">
                    <input required type="email"  value="<?php echo isset($_POST['nm_emailcliente']) ? $_POST['nm_emailcliente'] : ''; ?>" class="retangulo maior" placeholder="E-mail" name="nm_emailcliente">
                </div>
                <br>
                <div class="gridSegCadastro">
                    <div class="inputs">
                        <input required type="number" value="<?php echo isset($_POST['cd_cpf']) ? $_POST['cd_cpf'] : ''; ?>" placeholder="CPF" name="cd_cpf" class="retangulo outrosInputs <?php echo $labelCpf ? $incorreto : ''; ?>">
                        <?php echo $labelCpf ? $labelCpf : ''; ?>
                    </div>
                </div>
                <br>
                <div class="gridUmCadastro">
                    <div class="inputs">
                    <input required type="password" value="<?php echo isset($_POST['nm_senhacliente']) ? $_POST['nm_senhacliente'] : ''; ?>" placeholder="Senha" name="nm_senhacliente" class="retangulo outrosInputs <?php echo $invalido ? $incorreto : ''; ?>">
                    <?php echo $invalido ? $invalido : ''; ?>
                    </div>
                    <div></div>
                    <div class="inputs">
                    <input required type="password" value="<?php echo isset($_POST['senha2']) ? $_POST['senha2'] : ''; ?>" name="senha2" placeholder="Repita a senha" class="retangulo outrosInputs <?php echo $diferente ? $incorreto : ''; ?>">
                    <?php echo $diferente ? $diferente : ''; ?>
                    </div>
                </div>
                <br>
                <div class="gridSegCadastro">
                    <input required type="text"  value="<?php echo isset($_POST['nm_usuariocliente']) ? $_POST['nm_usuariocliente'] : ''; ?>" class="retangulo maior" placeholder="Nome de usuário" name="nm_usuariocliente">
                </div>
                <div class="termos">
                    <input required type="checkbox">
                    <h4>Eu li e concordo com os 
                        <h4 class="rosaEstilo">termos de uso</h4>
                    </h4>
                </div> 
                <center>   
                    <input type="submit" id="buttonCadastro" value="Cadastrar">
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