<?php
session_start();
require "../../sources/conexao.php";
//require '../../sources/navbar.php';
$nome = $_POST["Nome"];
$cpf = $_POST["CPF"];
$data = $_POST["DT_Nasc"];
$tel = $_POST["Telefone"];
$email = $_POST["Email"];
$endereco = $_POST["endereco"];
$senha = $_POST["Senha"];
$id = $_SESSION['id'];

$sql = "UPDATE Cliente SET Nome = '$nome', CPF = '$cpf', DT_Nasc = '$data', Telefone = '$tel', Email = '$email', Endereco = '$endereco', Senha = '$senha' WHERE ID_Cliente = '$id'";
$query = mysqli_query($conexao, $sql);

$imagem = $_FILES["Imagem"];
$from = $imagem["tmp_name"];
$nomeImagem  = $imagem['name'];

$sql_select = "SELECT * FROM Cliente cl INNER JOIN Imagem_Cliente img on cl.ID_Cliente = img.ID_Cliente WHERE cl.ID_Cliente = '$id'";
$resul = mysqli_query($conexao, $sql_select);
$registro = mysqli_fetch_assoc($resul);

if(!$nomeImagem == ""){
    $to = "../../upload/Cliente/$nomeImagem";
        if(!$registro["Caminho_Img_Cliente"] == "../../upload/Cliente/icon.png"){
            $delet_img = unlink('../'.$registro["Caminho_Img_Cliente"]);
        }
    move_uploaded_file($from, $to);
    $sql_update = "UPDATE Imagem_Cliente SET Caminho_Img_Cliente = '$to' WHERE ID_Cliente = '$id'";
    $query_update = mysqli_query($conexao, $sql_update);
}

    

if ($query) {
        unset($_SESSION['Email']);
        unset($_SESSION['Senha']);
        header('Location: form_login_cliente.php');
}else{
    echo  mysqli_error($conexao);
}
