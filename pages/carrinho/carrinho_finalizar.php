<?php
    session_start();
    require "../../sources/conexao.php";
    $vlr_total = $_SESSION["valorTotal"];
    $id_cliente = $_SESSION["id"];

    $sql_insert_venda = "INSERT INTO  Venda(data, Valor_Total, ID_Cliente) VALUES(NOW(), '$vlr_total', '$id_cliente')";
    $query_insert_venda = mysqli_query($conexao, $sql_insert_venda);
    $sql_select = "SELECT * FROM VENDA order by ID_Venda desc limit 1";
    $query_select = mysqli_query($conexao, $sql_select);
    $fecht = mysqli_fetch_assoc($query_select);
    $id_venda = $fecht['ID_Venda'];


    foreach($_SESSION["carrinho"] as $key => $value){
        $sql_insert_item_venda = "INSERT INTO Item_venda(Quantidade, ID_Venda, ID_Produto) VALUES('$value', '$id_venda', '$key')";
        $query_insert_item_venda = mysqli_query($conexao, $sql_insert_item_venda);
    };
    unset($_SESSION["carrinho"]);
    header('Location: minhas_compras.php');
?>