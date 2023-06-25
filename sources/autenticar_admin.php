<?php
session_start();

if(!isset($_SESSION["logado2"])) {
    header('Location: ../produto/index.php');
    die();
} else {

}
?>