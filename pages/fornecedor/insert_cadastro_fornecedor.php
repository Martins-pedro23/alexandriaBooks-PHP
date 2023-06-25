<?php 
require "../../sources/conexao.php";

$empresa = $_POST["Empresa"];
$cnpj = $_POST["CNPJ_Fornecedor"];
$email = $_POST["Email_Fornecedor"];
$tel = $_POST["Tel_Fornecedor"];
$endereco = $_POST["Endereco_Fornecedor"];
$descricao = $_POST["Descricao"];
$cep = $_POST["CEP_Fornecedor"];

$sql = "INSERT INTO Fornecedor (Nome_Fornecedor, CNPJ_Fornecedor, Email_Fornecedor, Tel_Fornecedor, Endereco_Fornecedor, Descricao, CEP_Fornecedor) VALUES ('$empresa', '$cnpj', '$email', '$tel', '$endereco', '$descricao', '$cep')";
$resul = mysqli_query($conexao, $sql);

if($resul){
    header('Location: index.php');
}else{
    echo "Erro: ".mysqli_error($conexao);

}
?>