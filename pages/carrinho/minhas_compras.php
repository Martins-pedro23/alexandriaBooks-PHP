<?php
    require "../../sources/conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/carrinho/Style_minhas_compras.css">
    <title>Document</title>
</head>
<body>
    <?php   
    require "../../sources/navbar.php";
    echo $_SESSION["id"];
    $id_Cliente = $_SESSION["id"];
    $sql_venda = "SELECT * FROM Venda WHERE ID_Cliente = '$id_Cliente'";
    $query_venda = mysqli_query($conexao, $sql_venda);
    ?>
    <div id="corpo_compras">
        <table id="minhas_compras">
            <tr>
                <th>Data</th>
                <th>Valor</th>
                <th>Detalhes</th>
            </tr>
            <?php while($resul = mysqli_fetch_assoc($query_venda)):?>
                <tr>
                    <td><?=$resul["data"]?></td>
                    <td><?=$resul["Valor_Total"]?></td>
                    <td><a href="detalhes_venda.php?id=<?=$resul["ID_Venda"]?>">detalhes</a></td>
                </tr>
            <?php endwhile ?>     
        </table>
    </div>
    <?php
        require "../../sources/footer.php";
    ?>
</body>
</html>


    