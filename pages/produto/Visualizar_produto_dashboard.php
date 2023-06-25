<?php
    require "../../sources/conexao.php";
    $id = $_GET["id"];

    $sql = "SELECT * FROM Produto p INNER JOIN Imagem_Produto img on p.ID_Produto = img.ID_Produto WHERE p.ID_Produto = '$id'";
    $registro = mysqli_query($conexao, $sql);
    $resul = mysqli_fetch_assoc($registro);
?>
<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/produto/Style_Visualizar_produto_dashboard.css">
    <title>Visualizar</title>
</head>
<body>
    <?php
    require "../../sources/navbar.php"
    ?>
    <div class="card">
        <h4 class="card-title"><?=$resul["Nome"]?></h4>
        <div class="card_1">
            <div class="card-img">
                <img class="card-img-top" src="../<?=$resul["Caminho_Img_Produto"]?>" alt="Card image cap">
            </div> 
            <div class="card-body">
                <p class="card-text"><b>Descrição:</b> <?=$resul["Descricao"]?></p>
                <p class="card-text"><b>Valor:</b> <?=$resul["Vlr_Unitario"]?></p>
                <p class="card-text"><b>Tipo de capa:</b> <?=$resul["Capa"]?></p>
                <p class="card-text"><b>Número de páginas:</b> <?=$resul["Num_Pag"]?></p>
                <p class="card-text"><b>Estoque:</b> <?=$resul["Estoque"]?></p>
            </div>
        </div>
    </div>
    <?php
    require "../../sources/footer.php"
    ?>
</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</html>