<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/cliente/Style_Form_Login_cliente.css">
    <title>Login</title>
</head>
<body>
    <?php require '../../sources/navbar.php' ?>
    <div id="formulario">
        <h1>Login:</h1>
        <form action="teste_login.php" method="POST">
            <label for="email">E-mail: </label>
            <input type="text" id="email" name="Email">
            <label for="senha">Senha: </label>
            <input type="password" id="senha" name="Senha"  required>
            <input type="submit" name="submit" id="botao">
        </form>

    </div>
    <?php
    require "../../sources/footer.php"
    ?>
    <?php if(isset($_SESSION["faca_login"])): ?>
        <script>
            alert("Faça login!")
        </script>
    <?php 
    unset($_SESSION["faca_login"]);
    endif ?>
</body>
</html>