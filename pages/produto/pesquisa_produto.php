<?php
    require "../../sources/conexao.php";
    $pesquisa = $_GET['pesquisa'];

    $sql_select = "SELECT * FROM Produto p INNER JOIN Imagem_Produto img on p.ID_Produto = img.ID_produto WHERE p.Nome LIKE '%$pesquisa%'";
    $query = mysqli_query($conexao, $sql_select);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/produto/Style_index.css">
    <title>Alexandria Books</title>
</head>
<body>
    <?php require '../../sources/navbar.php' ?>
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="../../scr/logos/banner1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="../../scr/logos/banner2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../../scr/logos/banner3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <div id="Corpo">
        <?php while($resul = mysqli_fetch_assoc($query)): ?>
            <div class="card" style="width: 20rem;">
                <div class="card-img">
                     <img class="card-img-top" src="../<?=$resul["Caminho_Img_Produto"]?>" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?=$resul["Nome"]?></h5>
                    <p class="card-text"><?=$resul["Descricao"]?></p>
                    <p class="card-text vlr"><s>R$: <?=$resul["Vlr_Unitario"]*1.10?></s></p>
                    <p class="card-text vlr">R$: <?=$resul["Vlr_Unitario"]?></p>
                    <a href="Visualizar_Produto.php?id=<?=$resul["ID_Produto"]?>" class="btn btn-primary">Comprar</a>
                </div>
            </div>          
        <?php endwhile;?>
    </div>
    <?php
        require "../../sources/footer.php";
    ?>
</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</html>