<?php 
require "../../sources/conexao.php";


$id = $_GET["id"];

$sql = "DELETE FROM Genero WHERE ID_Genero = '$id'";
$resul = mysqli_query($conexao, $sql);
if($resul){
    header("location: index.php");
}
else{
    echo "Erro: ".mysqli_error($conexao);
}
?>