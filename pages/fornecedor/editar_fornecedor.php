<?php
    require "../../sources/conexao.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM Fornecedor WHERE ID_Fornecedor = $id";
    $resul = mysqli_query($conexao, $sql);
    $registro = mysqli_fetch_assoc($resul);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/fornecedor/Style_form_editar_fornecedor.css">
    <title>Editar Fornecedor:</title>
</head>
<body>
    <?php require "../../sources/navbar.php" ?>
    <div id="form">
            <h2>Atualize os dados</h2>
            <form id="form_part"  action="atualizar_fornecedor.php?id=<?=$registro['ID_Fornecedor']?>" method="post">
                <h3>Dados:</h3>
                <div>
                    <input type="text" value="<?=$registro['Nome_Fornecedor']?>" name="Nome_Fornecedor" placeholder="Nome:" required x-moz-errormessage="Ops.">
                    <input type="text" value="<?=$registro['CNPJ_Fornecedor']?>" name="CNPJ_Fornecedor" placeholder="CNPJ:" required x-moz-errormessage="Ops.">
                    <input type="text" value="<?=$registro['Email_Fornecedor']?>" name="Email_Fornecedor" placeholder="Email:" required x-moz-errormessage="Ops.">
                    <input type="text" value="<?=$registro['Tel_Fornecedor']?>" name="Tel_Fornecedor" placeholder="Telefone:" required x-moz-errormessage="Ops.">
                    <input type="text" value="<?=$registro['Descricao']?>" name="Descricao" placeholder="Descrição:" required x-moz-errormessage="Ops.">
                </div>
                
                <h3>Endereço</h3>
                <div>
                    <input type="text" value="<?=$registro['Endereco_Fornecedor']?>" name="Endereco_Fornecedor" placeholder="Endereço:" required x-moz-errormessage="Ops.">
                    <input type="text" value="<?=$registro['CEP_Fornecedor']?>" name="CEP_Fornecedor" placeholder="CEP:" required x-moz-errormessage="Ops.">
                </div>
                <button id="botao">Atualizar</button>
            </form>
    </div>
    <?php
        require "../../sources/footer.php";
    ?>
</body>
</html>