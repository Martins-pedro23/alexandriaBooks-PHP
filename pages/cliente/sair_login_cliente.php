<?php
session_start();
unset($_SESSION['Email']);
unset($_SESSION['Senha']);
unset($_SESSION['logado2']);
unset($_SESSION['logado1']);
header('Location: form_login_cliente.php');
?>