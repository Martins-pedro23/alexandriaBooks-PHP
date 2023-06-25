<?php
    require "../../sources/autenticar_admin.php";
    require "../../sources/conexao.php";
    $id = $_GET["id"];
    $sql_select = "SELECT * FROM Produto p INNER JOIN Imagem_Produto img on p.ID_Produto = img.ID_Produto WHERE p.ID_Produto = '$id'";
    $resul = mysqli_query($conexao, $sql_select);
    $registro = mysqli_fetch_assoc($resul);

    if($registro["Caminho_Img_Produto"] == "../../upload/Produtos/icon.png"){
        $sql_delete_img = "DELETE FROM Imagem_Produto  WHERE ID_Produto = '$id'";
        $delet_img = mysqli_query($conexao, $sql_delete_img);
        $sql_delete_Produto = "DELETE FROM Produto  WHERE ID_Produto = '$id'";
        $delet_Produto = mysqli_query($conexao, $sql_delete_Produto);
    }else{
        $delet_img = unlink("../".$registro["Caminho_Img_Produto"]);
        $sql_delete_img = "DELETE FROM Imagem_Produto  WHERE ID_Produto = '$id'";
        $delet_img = mysqli_query($conexao, $sql_delete_img);
        $sql_delete_Produto = "DELETE FROM Produto  WHERE ID_Produto = '$id'";
        $delet_Produto = mysqli_query($conexao, $sql_delete_Produto);
    }

    if($delet_Produto){
        header("location: Produtos_Cadastrados.php");
    }
    else{
        echo "Erro: ".mysqli_error($conexao);
    }

?>
