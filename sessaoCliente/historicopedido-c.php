<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/index/logo.png">
    <link rel="stylesheet" href="css/historicopedido-c.css">
    <link rel="stylesheet" href="css/menu-c.css">
    <title>Histórico de Pedidos - Eventalize</title>
</head>
<body>

<!-- INICIO MENU -->
    <div class="grid-container">
        <div class="header">
            <div class="logo">
            <img src="../img/icones/logoBranca.svg" alt="">
            </div>
            <div class="menu">
                <a href="">Início</a>
                <a href="../sessaoUsuario/explore.php">Feed</a>
                <a href="chatCliente.php">Mensagens</a>
                <a href="">Seus Pedidos</a>
            </div>

            <div class="headerPesquisa">
                <form action="index-c.php" method="get">
                <input type="text" style="padding: 2.5%;" placeholder="Procure Serviços" name="nm_tiposervico">
                    <img src="../img/icones/icon-lupa.svg" alt="" width="30px">
                </form>
            </div>
            <div class="headerClientePerfil" >
                <!-- <div class="iconCliente"> -->
                <a href="#" class="carrinho"><img src="../img/icones/icon-carrinho.svg" alt="Carrinho"></a>
                <a href="#" class ="notificacao"><img src="../img/icones/icon-notificacao.svg" alt="Notificações"></a>
                <!-- </div> -->
                <button class="menuIcon2" onclick="menuOpen()"><img  src="../img/icones/vector.svg" style="height: 50px;" width="30px"></button>
            </div>
            <section class="menuPerfil">
                <a href="">Perfil</a>
                <a href="">Postagens</a>
                <!-- <a href="" style="margin-bottom: 20%">Histórico de Compras</a> -->
                <a href="">Configurações</a>
                <a href="historicopedido-c.php">Histórico de Pedidos</a>
                <a href="../logout.php">Sair</a>
            </section>
        </div>
    </div>
<!-- FIM MENU -->

    <div class="gridHistorico">
        <div class="titulo">
            <h2>Histórico de Pedidos</h2>
        </div>

        <div class="infoPedido">
            <div class="alinhaPedido">
                <li>Nº:0543255</li>
                <li>Pedido realizado em</li>
                <li>Este é um</li>
                <li>Pacote Personalizado</li>
                <li>Situação</li>
                <li>Status</li>
            </div>

            <div class="alinhaInfoPedido">
                <li>Aline Silva</li>
                <li>10/05/2023</li>
                <li>Pacote</li>
                <li id="pacotePersonalizado">Não</li>
                <li class="status">Aprovado</li>
                <li class="status">Pagamento realizado</li>
            </div>
        </div>

        <div class="imgHistoricoPedido">
            <img src="../bancoImagens/clientes/casaEventos.jpg" alt="">
        </div>

        <div class="textoHistorico">
                <h2 class="estiloEmpresa">Empresa: Smash Party</h2><br>
                <h3>Aluguel: casa noturna de 10 horas, no dia 30 de Junho.</h3>
        </div>

        <div class="textoValor">
            <h2>Valor</h2><br>
            <h3>R$ 850,00</h3>
        </div>

        <hr>
    </div>


<script src="js/menu-c.js"></script>

</body>
</html>