<?php 
session_start();
if(isset($_POST['submit']) && !empty($_POST['Email']) && !empty($_POST['Senha']))
{
    include_once('../../sources/conexao.php');
    $email = $_POST['Email'];
    $senha = $_POST['Senha'];

    $sql = "SELECT * FROM cliente WHERE Email = '$email' AND Senha = '$senha'";

    $resul = $conexao ->query($sql);
    
    if(($email == "rubia@gmail.com" && $senha == "12345678")){
        echo "Bem vindo admin! ";
        $_SESSION["logado2"] = 12345;
        header("Location: ../produto");
    }else if(mysqli_num_rows($resul) < 1){
        unset($_SESSION['Email']);
        unset($_SESSION['Senha']);
        header('Location: form_login_cliente.php');

    }else{
        $_SESSION['Email'] = $email;
        $_SESSION['Senha'] = $senha;
       header("Location: sistema_login_cliente.php");
       $_SESSION["logado1"] = 12345;
    }
}else{
    header('Location: form_login_cliente.php');
}
?>