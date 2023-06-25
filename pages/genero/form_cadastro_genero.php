<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/genero/Style_form_cadastro_genero.css"> 
    <title>Cadastro genêro:</title>
</head>
<body>
    <?php require "../../sources/navbar.php" ?>
    <div id="form">
            <h2>Adicione um novo genêro</h2>
            <form id="form_part"  action="insert_cadastro_genero.php" method="post">
                <input type="text" name="Nome_Genero" placeholder="Nome:" required x-moz-errormessage="Ops.">
                <button id="botao">Cadastrar</button>
            </form>
    </div>
    <?php
        require "../../sources/footer.php";
    ?>
</body>
</html>