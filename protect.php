<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['cd_empresa']) && !isset($_SESSION['cd_cliente'])){
    die(header("Location: /sistema/eventalize/index.html"));
}

?>