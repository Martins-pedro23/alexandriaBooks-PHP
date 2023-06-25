<?php 
require "../../sources/conexao.php";


$id = $_GET["id"];

$sql = "DELETE FROM Fornecedor WHERE ID_Fornecedor = '$id'";
$resul = mysqli_query($conexao, $sql);
if($resul){
    header("location: index.php");
}
else{
    echo "Erro: ".mysqli_error($conexao);
}
?>