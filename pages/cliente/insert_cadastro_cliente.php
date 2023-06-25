<?php 
    require "../../sources/conexao.php";
    $nome = $_POST["Nome"];
    $cpf = $_POST["CPF"];
    $nasc = $_POST["DT_Nasc"];
    $tel = $_POST["Telefone"];
    $email = $_POST["Email"];
    $senha = $_POST["Senha"];

    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["uf"];
    $numero = $_POST["numero"];

    $endereco = "CEP: ".$cep."Rua: ".$rua." | Bairro: ".$bairro." | Cidade: ".$cidade." | UF: ".$estado." | Número: ".$numero;

    $imagem = $_FILES["Imagem"];
    $from = $imagem["tmp_name"];
    $nomeImagem  = $imagem['name'];
    
    if($nomeImagem == ""){
        $to = "../../upload/Cliente/icon.png";
    }else{
        $to = "../../upload/Cliente/$nomeImagem";
        move_uploaded_file($from, $to);
    }
        
        
        $sql_insert_Cliente = "INSERT INTO Cliente (Nome, CPF, DT_Nasc, Endereco, Telefone, Email, Senha) VALUES ('$nome', '$cpf', '$nasc','$endereco', '$tel', '$email',  '$senha')";
        $resul_Cliente = mysqli_query($conexao, $sql_insert_Cliente);
        $sql_select = "SELECT * from Cliente ORDER BY ID_Cliente Desc";
        $resul_Select = mysqli_query($conexao, $sql_select);
        $fetch = mysqli_fetch_assoc($resul_Select);
        $id = $fetch["ID_Cliente"];
        
        
        $sql_insert_Img = "INSERT INTO Imagem_Cliente (Caminho_Img_Cliente, ID_Cliente) VALUES ('$to', '$id')";
        $resul_img = mysqli_query($conexao, $sql_insert_Img);

    if ($resul_Cliente and $resul_img){
        header("location: form_login_cliente.php");
    }else{
        echo mysqli_error($conexao);
    }
