<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['cd_empresa'])){
    die("Você não tem acesso a essa página");
};

?>