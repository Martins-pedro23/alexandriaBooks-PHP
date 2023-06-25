<?php
require "../../sources/conexao.php";

$empresa = $_POST["Nome_Fornecedor"];
$cnpj = $_POST["CNPJ_Fornecedor"];
$email = $_POST["Email_Fornecedor"];
$tel = $_POST["Tel_Fornecedor"];
$endereco = $_POST["Endereco_Fornecedor"];
$descricao = $_POST["Descricao"];
$cep = $_POST["CEP_Fornecedor"];
$id = $_GET["id"];

$sql = "UPDATE Fornecedor SET Nome_Fornecedor = '$empresa', CNPJ_Fornecedor = '$cnpj', Email_Fornecedor = '$email', Tel_Fornecedor = '$tel', Endereco_Fornecedor = '$endereco', Descricao = '$descricao', CEP_Fornecedor = '$cep' WHERE ID_Fornecedor = $id";

if (mysqli_query($conexao, $sql)){
    header("location: index.php");
}else{
    echo "Erro: ".mysqli_error($conexao);

}
?>