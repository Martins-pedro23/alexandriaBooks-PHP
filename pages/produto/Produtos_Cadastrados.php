<?php
    require "../../sources/autenticar_admin.php";
    require "../../sources/conexao.php";
    $sql = "SELECT * FROM Produto p INNER JOIN Imagem_Produto img on p.ID_Produto = img.ID_Produto";
    $query = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/produto/Style_Produtos_cadastrados.css">
    <title>Document</title>
</head>
<body>
    <?php
    require "../../sources/navbar.php"
    ?>
    <div id="corpo">
        <a id="bt_produto" href="form_cadastro_produto.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            Novo produto
        </a>
        <table id="tabela_produtos">
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Visualizar</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
            <?php while($resul = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><img src="../<?=$resul["Caminho_Img_Produto"]?>" class="imagem_produto" alt="Card image cap"></td>
                <td><?=$resul["Nome"]?></td>
                <td><a href="Visualizar_Produto_dashboard.php?id=<?=$resul["ID_Produto"]?>" class="btn btn-primary">Visualizar</a></td>
                <td><a href="Excluir_Produto.php?id=<?=$resul["ID_Produto"]?>" class="btn btn-primary">Excluir</a></td>
                <td><a href="Form_Editar_Produto.php?id=<?=$resul["ID_Produto"]?>" class="btn btn-primary">Editar</a></td>
            </tr>             
            <?php 
                endwhile;
            ?>
        </table>
    </div>
    <?php
        require "../../sources/footer.php";
    ?>
</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</html>
