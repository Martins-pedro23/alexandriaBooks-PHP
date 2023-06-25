<?php
    require "../../sources/conexao.php";
    $id_venda = $_GET["id"]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/carrinho/Style_carrinho.css">
    <title>Document</title>
</head>
<body>
    <?php
    require "../../sources/navbar.php";
    ?>
    <div id="corpo_carrinho">
        <div class="lista_produtos">
            <table id="tabela_produtos">
                <tr>
                    <th>produto</th>
                    <th>quantidade</th>
                    <th>Valor</th>
                </tr>
                <?php
                    $sql_select = "SELECT * FROM Item_Venda ive INNER JOIN Produto p on ive.ID_Produto = p.ID_Produto where ive.ID_Venda = '$id_venda'";
                    $query_select = mysqli_query($conexao, $sql_select);
                    while($fecht = mysqli_fetch_assoc($query_select)):
                    $vlr_total = $fecht["Vlr_Unitario"]*$fecht["Quantidade"];
                ?>
                <tr>
                    <td>
                        <div class="produto_div">
                            <div>
                                <a href="../produto/Visualizar_Produto.php?id=<?=$fecht["ID_Produto"]?>" class="link_produto"><h4><?=$fecht["Nome"]?></h4></a>
                                    <p><?=$fecht["Descricao"]?></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?=$fecht["Quantidade"]?>
                    </td>
                        <td><?=$vlr_total?></td>
                    </tr>
                    <?php endwhile ?>
            </table>
        </div>
    </div>

    <?php
        require "../../sources/footer.php";
    ?>
</body>
</html>

 