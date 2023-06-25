<?php
    require "../../sources/autenticar_admin.php";
    require "../../sources/conexao.php";
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

    $imagem = $_FILES["Imagem"];
    $nomeImagem  = $imagem['name'];

    if($nomeImagem == ""){
        $to = "../upload/Produtos/icon.png";

    }else{
        $to = "../upload/Produtos/$nomeImagem";
        $from = $imagem["tmp_name"];
        $toSave = "../" . $to;
        move_uploaded_file($from, $toSave);
    }



    $sql = "INSERT INTO Produto(Nome, Descricao, Vlr_Unitario, Capa, Num_Pag, Idioma, Formato, Peso, Estoque, ID_Fornecedor, ID_Genero) VALUES ('$nome', '$desc', '$vlr','$Capa','$num_pag', '$idioma', '$medidas', '$peso', '$estoque', '$fornecedor', '$genero')";
    $resul = mysqli_query($conexao, $sql);
    $sql_select = "SELECT * from Produto ORDER BY ID_Produto Desc";
    $resul_Select = mysqli_query($conexao, $sql_select);
    $fetch = mysqli_fetch_assoc($resul_Select);
    $id = $fetch["ID_Produto"];

    $sql_insert_Img = "INSERT INTO Imagem_Produto (Caminho_Img_Produto, ID_Produto) VALUES ('$to', '$id')";
    $resul_img = mysqli_query($conexao, $sql_insert_Img);

    if($resul or $resul_img){
        header('Location: Produtos_Cadastrados.php');
    }
    else{
        echo "Erro: ".mysqli_error($conexao);
    }

?>