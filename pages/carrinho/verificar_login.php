<?php
session_start();

if(!isset($_SESSION["logado1"])) {
    header('Location: ../cliente/form_login_cliente.php');
    $_SESSION["faca_login"] = "123";
} else {
    header('Location: carrinho_finalizar.php');
}
?>