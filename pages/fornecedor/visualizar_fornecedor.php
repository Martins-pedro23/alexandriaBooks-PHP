<?php 
    require "../../sources/conexao.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM Fornecedor WHERE ID_Fornecedor = '$id'";
    $query = mysqli_query($conexao, $sql);
    $resul = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/fornecedor/Style_visualizar_fornecedor.css">
    <title>Alexandria</title>
</head>
<body>
    <?php require '../../sources/navbar.php' ?>
    <div id="corpo_1">
        <h3 ><?=$resul["Nome_Fornecedor"]?></h3>
        <div id="corpo_part">
            <div>
                <p><b>CNPJ:</b><?=$resul["CNPJ_Fornecedor"]?></p>
                <p><b>Email:</b><?=$resul["Email_Fornecedor"]?></p>
                <p><b>Telefone:</b><?=$resul["Tel_Fornecedor"]?></p>
            </div>
            <div>
                <p><b>Endereço:</b><?=$resul["Endereco_Fornecedor"]?></p>
                <p><b>Descrição:</b><?=$resul["Descricao"]?></p>
                <p><b>CEP:</b><?=$resul["CEP_Fornecedor"]?></p>
            </div>
        </div>
    </div>
    <?php require "../../sources/footer.php";?>
</body>
</html>