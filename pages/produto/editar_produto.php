<?php
    require "../../sources/autenticar_admin.php";
    require "../../sources/conexao.php";
    $id = $_GET["id"];
    $nome = $_POST["Nome"];
    $desc = $_POST["Descricao"];
    $vlr = $_POST["Vlr_Unitario"];
    $Capa = $_POST["Capa"];
    $num_pag = $_POST["Num_Pag"];
    $idioma = $_POST["Idioma"];
    $medidas = $_POST["Medidas"];
    $peso = $_POST["Peso"];
    $estoque = $_POST["Estoque"];
    $fornecedor = $_POST["Fornecedor"];
    $genero = $_POST["Genero"];

    $sql_update = "UPDATE produto SET Nome = '$nome', Descricao = '$desc', Vlr_Unitario = '$vlr', Capa = '$Capa', Num_Pag = '$num_pag', Idioma = '$idioma', Formato = '$medidas', Peso = '$peso', Estoque = '$estoque', ID_Fornecedor = '$fornecedor', ID_Genero = '$genero' WHERE ID_Produto = '$id'";
    $resul = mysqli_query($conexao, $sql_update);

    if ($resul) {
        header("location: Produtos_cadastrados.php");
    }else{
        echo "Erro ao editar" . mysqli_error($conexao);
    }
?>