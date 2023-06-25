<?php 
session_start();
if((!isset($_SESSION['Email']) == true) and (!isset ($_SESSION['Senha']) == true)){
    unset($_SESSION['Email']);
    unset($_SESSION['Senha']);
    header('Location: form_login_cliente.php');
}
$logado = $_SESSION['Email'];

require "../../sources/conexao.php";

$email = $_SESSION["Email"];
$senha = $_SESSION["Senha"];
$sql = "SELECT * FROM Cliente WHERE Email = '$email' AND Senha = '$senha'";
$resul = mysqli_query($conexao, $sql);
$registro = mysqli_fetch_assoc($resul);
$_SESSION["id"] = $registro["ID_Cliente"];

$id_Cliente = $registro["ID_Cliente"];
$_SESSION["nome_user"] = $registro["Nome"];

$sql_imagem = "SELECT * FROM Imagem_Cliente WHERE ID_Cliente = '$id_Cliente'";
$resul_imagem = mysqli_query($conexao, $sql_imagem);
$registro_img = mysqli_fetch_assoc($resul_imagem);


?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/cliente/Style_sistema_login_cliente.css">
    <title>Sistema Login</title>
    
</head>
<body>

<?php require "../../sources/navbar.php" ?>
    <div id="info_usuario">
        <div id="img_bot">
            <img id="img_user" src="<?=$registro_img['Caminho_Img_Cliente']?>" alt="">
            <div id="bot_cliente">
                <a href="../../pages/carrinho/carrinho.php">Carrinho</a>
                <a href="../../pages/carrinho/minhas_compras.php">Minhas Compras</a>
                <a href="meus_dados.php">Meus dados</a>
            </div>
        </div>
        <div id="links_cliente">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
            <button><a href="editar_perfil.php">Editar</a></button>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
            <button><a href="deletar_perfil.php">Deletar</a></button>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-door-open" viewBox="0 0 16 16">
                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
            </svg>
            <button><a href="sair_login_cliente.php">Sair</a></button> 
        </div>
    </div>
    <?php
        require "../../sources/footer.php";
    ?>
</body>
</html>
