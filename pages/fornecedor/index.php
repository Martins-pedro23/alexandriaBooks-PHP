<?php 
require "../../sources/conexao.php";


$sql = "SELECT * FROM Fornecedor";
$query = mysqli_query($conexao, $sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/fornecedor/Style_fornecedores.css">
    <title>Alexandria Books</title>
</head>
<body>
    <?php require '../../sources/navbar.php' ?>
    <div id="corpo">
        <div id="corpo_parte">
            <a class="bt_fornecedor" href="../produto/form_cadastro_produto.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                </svg>
                Voltar
            </a>
            <a class="bt_fornecedor" href="form_cadastro_fornecedor.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Novo fornecedor
            </a>
        </div>
        <table id="tabela_produtos">
            <tr>
                <th>Nome</th>
                <th>Visualizar</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
            <?php while($resul = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?=$resul["Nome_Fornecedor"]?></td>
                <td><a href="visualizar_fornecedor.php?id=<?=$resul["ID_Fornecedor"]?>" class="btn btn-primary">Visualizar</a></td>
                <td><a href="deletar_fornecedor.php?id=<?=$resul["ID_Fornecedor"]?>" class="btn btn-primary">Excluir</a></td>
                <td><a href="editar_fornecedor.php?id=<?=$resul["ID_Fornecedor"]?>" class="btn btn-primary">Editar</a></td>
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
</html>