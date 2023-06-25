<?php 
$i = 0;
$j = 0;
session_start();
require "../../sources/conexao.php";

$id = $_SESSION["id"];

$sql_select = "SELECT * FROM Cliente WHERE ID_Cliente = '$id'";
$resul = mysqli_query($conexao, $sql_select);
$registro = mysqli_fetch_assoc($resul);
$id_cliente = $registro['ID_Cliente'];


$sql_select_venda = "SELECT * FROM Venda where ID_Cliente = '$id_cliente'";
$resul_venda = mysqli_query($conexao, $sql_select_venda);
$registro_venda = mysqli_fetch_assoc($resul_venda);

$id_vendas = $registro_venda["ID_Venda"];

$sql_select_img = "SELECT * FROM Imagem_Cliente where ID_Cliente = '$id_cliente'";
$resul_img = mysqli_query($conexao, $sql_select);
$registro_img = mysqli_fetch_assoc($resul);

$sql_delete_item = "DELETE FROM Item_Venda WHERE ID_Venda = '$id_vendas'";
$delet_item = mysqli_query($conexao, $sql_delete_item);
echo $delet_item;
$sql_delete_venda = "DELETE FROM Venda WHERE ID_Cliente = '$id_cliente'";
$delet_venda = mysqli_query($conexao, $sql_delete_venda);
echo $delet_venda;


if(isset($registro_img["Caminho_Img_Cliente"]) or $registro_img["Caminho_Img_Cliente"] == "../../upload/Cliente/icon.png"){
    $sql_delete_img = "DELETE FROM Imagem_Cliente  WHERE ID_Cliente = '$id'";
    $delet_img = mysqli_query($conexao, $sql_delete_img);
    $sql_delete_cliente = "DELETE FROM Cliente  WHERE ID_Cliente = '$id'";
    $delet_cliente = mysqli_query($conexao, $sql_delete_cliente);


}else{
    $delet_img = unlink($registro_img["Caminho_Img_Cliente"]);
    $sql_delete_img = "DELETE FROM Imagem_Cliente  WHERE ID_Cliente = '$id'";
    $delet_img = mysqli_query($conexao, $sql_delete_img);
    $sql_delete_cliente = "DELETE FROM Cliente  WHERE ID_Cliente = '$id'";
    $delet_cliente = mysqli_query($conexao, $sql_delete_cliente);
}

unset($_SESSION["logado1"]);

if ($delet_cliente) {
    header("location: form_login_cliente.php");
}else{
    echo "Erro ao deletar o perfil" . mysqli_error($conexao);
}

