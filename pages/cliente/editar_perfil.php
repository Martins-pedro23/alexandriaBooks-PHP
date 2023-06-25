<?php
    session_start();
    require "../../sources/conexao.php";
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM Cliente WHERE ID_Cliente = $id";
    $resul = mysqli_query($conexao, $sql);
    $registro = mysqli_fetch_assoc($resul);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/cliente/Style_editar_perfil.css">
    <title>Editar Cadastro:</title>
</head>
<body>
<?php require "../../sources/navbar.php" ?>
<div id="form_cli">
        <div id="cabe_cli">
            <h2>Edite seu perfil</h2>
        </div>
        <div id="form_part">
            <form  action="atualizar_perfil.php" method="post" enctype="multipart/form-data">
                <h4 id="seus_dados">Seus dados:</h4>
                <input type="text" id="nome" value="<?=$registro["Nome"]?>" name="Nome"  required x-moz-errormessage="Ops.">
                <input type="email" id="email" value="<?=$registro["Email"]?>" name="Email" required x-moz-errormessage="Ops.">
                <input type="text"  id="cpf" value="<?=$registro["CPF"]?>" name="CPF" required x-moz-errormessage="Ops.">
                <input type="tel" id="telefone" value="<?=$registro["Telefone"]?>" name="Telefone" maxlength="15" required x-moz-errormessage="Ops.">
                <input type="text"  id="data" value="<?=$registro["DT_Nasc"]?>" name="DT_Nasc" required x-moz-errormessage="Ops.">
                <input type="password" id="senha" name="Senha" value="<?=$registro["Senha"]?>" required x-moz-errormessage="Ops.">
                
                <div class="end_div">
                    <h4 id="endereco">Endereço:</h4>
                </div>
                <input type="text" id="endereco_cli" value="<?=$registro["Endereco"]?>" name="endereco" required x-moz-errormessage="Ops.">

                <div class="end_div">
                    <h4 id="endereco">Imagem:</h4>
                </div>
                <input type="file" id="arqui" name="Imagem"><br>
                <button id="botao">Cadastrar</button>
            </form>
        </div>
    </div>
    <?php
        require "../../sources/footer.php";
    ?>
</body>
</html>