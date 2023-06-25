<?php
    require "../../sources/conexao.php";
    $genero = $_POST['Nome_Genero'];

    $sql_insert = "Insert into Genero (Nome_Genero) Values ('$genero')";
    $query = mysqli_query($conexao, $sql_insert);

    if ($query){
        header("location: index.php");
    }else{
        echo mysqli_error($conexao);
    }

?>