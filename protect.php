<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['cd_empresa'])){
    die(header("Location: /sistema/eventalize/index.html"));
};

?>