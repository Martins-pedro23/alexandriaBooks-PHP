<?php
    require "../../sources/conexao.php";
    $id = $_GET["id"];
    $sql_select = "SELECT * FROM Produto p INNER JOIN Imagem_Produto img ON p.ID_Produto = img.ID_Produto inner join Genero g on p.ID_Genero = g.ID_Genero where p.ID_Produto = '$id'";
    $query = mysqli_query($conexao, $sql_select);
    $resul = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/produto/Style_Visualizar_produto.css">
    <title>Visualizar</title>
</head>
<body>
    <?php
    require "../../sources/navbar.php"
    ?>

    <br>
    <br>
    <div class="cartao">
        <h4 class="card-title"><?=$resul["Nome"]?></h4>
        <div class="card">
            <div class="card-img">
                <img class="card-img-top" src="../<?=$resul["Caminho_Img_Produto"]?>" alt="Card image cap">
            </div>
            <div class="card-body">
                <div id="Vis_Pro_vlr">
                    <p class="card-text"><s>R$ <?=$resul["Vlr_Unitario"]*1.10?></S></p>
                    <p class="card-text"><b>R$</b> <?=$resul["Vlr_Unitario"]?></p>
                    <a href="/../Codigo/pages/carrinho/adicionar_carrinho.php?prod=<?=$resul["ID_Produto"]?>&meth=add" class="btn btn-primary">Comprar</a>
                </div>
            </div>
        </div>
    </div>
    <div id="Vis_Pro_Desc">
        <div class="barra">
            <img src="../../scr/logos/genero.png" alt="" class="img_barra">
            <p><b>Gênero</b></p>
            <p><?=$resul["Nome_Genero"]?></p>
        </div>
        <div class="barra">
            <img src="../../scr/logos/capa.png" alt="" class="img_barra">
            <p><b>Capa</b></p>
            <p><?=$resul["Capa"]?></p>
        </div>
        <div class="barra">
            <img src="../../scr/logos/pagina.png" alt="" class="img_barra">
            <p><b>Páginas</b></p>
            <p><?=$resul["Num_Pag"]?></p>
        </div>
        <div class="barra">
            <img src="../../scr/logos/idioma.png" alt="" class="img_barra">
            <p><b>Idioma</b></p>
            <p><?=$resul["Idioma"]?></p>
        </div>
        <div class="barra">
            <img src="../../scr/logos/tamanho.png" alt="" class="img_barra">
            <p><b>Formato</b></p>
            <p><?=$resul["Formato"]?></p>
        </div>
        <div class="barra">
            <img src="../../scr/logos/peso.png" alt="" class="img_barra">
            <p><b>Peso</b></p>
            <p><?=$resul["Peso"]?></p>
        </div>
        <div class="barra">
            <img src="../../scr/logos/caixa.png" alt="" class="img_barra">
            <p><b>Estoque</b></p>
            <p><?=$resul["Estoque"]?></p>
        </div>
    </div>
    <div id="Descri">
        <h2>Descrição:</h2>
        <p><?=$resul["Descricao"] ?></p>
    </div>
    <?php
        require "../../sources/footer.php";
    ?>
</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</html>