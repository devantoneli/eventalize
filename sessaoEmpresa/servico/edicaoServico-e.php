<?php

// AQUI ESTAREMOS SELCIONANDO AS INFORMAÇÕES DO SERVIÇO SELECIONADO, PARA QUE A EMPRESA POSSA EDITÁ-LOS

// if (isset($_GET['cd_servico'])) {
    // $cd_servico = $_GET['cd_servico'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "db_eventalize";

    $conn = new mysqli($servername, $username, $password, $db_name);

    $sql = "SELECT * FROM tb_servico WHERE cd_servico = 800";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    }
// }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloServico-e.css">
    <link rel="icon" href="imgCriandoServico/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <title>Criar Serviço/Pacote</title>
</head>
<body>

<!-- MENU -->
    <div class="menu"></div>
<!-- FIM MENU -->
<div class="centralizaSections">

    <h1 class="meioH1">Este é um</h1>
    <div class="cabecalho">
        <div>
        <label for="servico">
        <input type="radio" name="opcao" value="servico" id="" checked>
        Servico</label>
        </div>
        <hr>
        <div>
        <label for="pacote">
        <input type="radio" name="opcao" value="pacote" id="">
        <a>Pacote de serviços</a></label>
        </div>
    </div>

<!-- SESSAO SERVICO -->  
    <section class="servico">
        <form class="grid-Principal" action="atualizarServico-e.php" method="POST">
            <div class="digitacao">
                <input type="hidden" name="cd_servico" value="<?php echo($row["cd_servico"]);?>">
                <input class="input-Digita" type="text" placeholder="Título do serviço" name="nm_servico" value="<?php if (isset($row)) { echo $row['nm_servico']; } ?>">
                <input class="input-Digita" type="text" name="ds_servico" id="" placeholder="Descrição" value="<?php if (isset($row)) { echo $row['ds_servico']; } ?>">
                <select class="input-Selec" name="cd_tiposervico" id="">
                    <option value="" selected>Tipo de serviço</option>
                    <option value="1" <?php if(isset($row) && $row['cd_tiposervico'] == '1') echo 'selected'; ?>>Comida</option>
                    <option value="2" <?php if(isset($row) && $row['cd_tiposervico'] == '2') echo 'selected'; ?>>Fotografia</option>
                    <option value="3" <?php if(isset($row) && $row['cd_tiposervico'] == '3') echo 'selected'; ?>>Decoração</option>
                    <option value="4" <?php if(isset($row) && $row['cd_tiposervico'] == '4') echo 'selected'; ?>>Música</option>
                    <option value="5" <?php if(isset($row) && $row['cd_tiposervico'] == '5') echo 'selected'; ?>>Espaço</option>
                    <option value="6" <?php if(isset($row) && $row['cd_tiposervico'] == '6') echo 'selected'; ?>>Atração</option>
                    <option value="7" <?php if(isset($row) && $row['cd_tiposervico'] == '7') echo 'selected'; ?>>Equipamento</option>
                    <option value="8" <?php if(isset($row) && $row['cd_tiposervico'] == '8') echo 'selected'; ?>>Auxiliar</option>
                </select>
                <input class="input-Digita" type="text" name="vl_servico" id="" placeholder="Valor" value="<?php echo($row["vl_servico"]);?>">
<!-- RADIOS COMUNS -->
                <div class="radios">
                    <h1>Personalização</h1>
                    <div class="personalizacao">
                        <label class="sim" for="sim">
                        <input type="radio" name="cd_personaliz" value="1" id="" <?php if($row['cd_personaliz']==1)echo("checked"); ?> >
                        Sim</label>
                        
                        <label class="nao" for="nao">
                        <input type="radio" name="cd_personaliz" value="0" id="" <?php if($row['cd_personaliz']==0)echo("checked"); ?>>
                        <a>Não</a></label>
                    </div>
                    <hr>
                    <h1>Solicitação de orçamento</h1>
                    <div class="personalizacao">
                        <label class="sim" for="sim">
                        <input type="radio" name="cd_orcament" value="1" id="" <?php if($row['cd_orcament']==1)echo("checked"); ?>>
                        Sim</label>
                        
                        <label class="nao" for="nao">
                        <input type="radio" name="cd_orcament" value="0" id="" <?php if($row['cd_orcament']==0)echo("checked"); ?>>
                        <a>Não</a></label>
                    </div>
                    <hr>
                    <h1>Livre localização</h1>
                    <div class="personalizacao">
                        <label class="sim" for="sim">
                        <input type="radio" name="cd_local" value="1" id="" <?php if($row['cd_local']==1)echo("checked"); ?>>
                        Sim</label>
                        
                        <label class="nao" for="nao">
                        <input type="radio" name="cd_local" value="0" id="" <?php if($row['cd_local']==0)echo("checked"); ?>>
                        <a>Não</a></label>
                    </div>
                </div>
<!-- BOTAO DO FORM -->         
                <button class="criar" type="submit">Alterar Serviço</button>
            </div>
<!-- INPUT PARA IMAGENS -->
            <div class="imagens">
                <h1 class="">Imagem de capa</h1>
                <label class="cardCarregarG" for="img-inputCapa" id="img2">
                    <input hidden class="linkCapa" id="img-inputCapa" value="" type="file" name="imgCapa">
                    <input id="linkimgCapa" value="mudara" type="hidden" name="url_imgcapa">
                    <img id="preview-capa" style="opacity: 1;" src="<?php echo($row['url_imgcapa']) ?>" width="100%">
                </label>

                <h1>Outras imagens</h1>
                <div class="grid-imagens">
                        <div>
                        <label class="img2" for="img-input2">
                        <input class="link2" id="img-input2" value="" hidden type="file" name="img2">
                            <input id="linkimg2" value="mudara" type="hidden" name="url_img2">
                            <img style="opacity: 1;" id="preview-2" src="<?php echo($row['url_img2']) ?>" width="100%">
                        </label>
                    </div>
                    <div>
                        <label class="img3" for="img-input3">
                        <input hidden class="link3" id="img-input3" value="" type="file" name="img3">
                            <input id="linkimg3" value="mudara" type="hidden" name="url_img3">
                            <img style="opacity: 1;" id="preview-3" src="<?php echo($row['url_img3']) ?>" width="100%">
                        </label>
                    </div>
                </div>
        </form>
    </section>

<!-- SESSAO PACOTE -->
    <section class="pacote">

    </section>
   
</div>
    <script src="scriptServico-e.js"></script>
</body>
</html>
