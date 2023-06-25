<?php
    session_start();
    $id = $_GET["prod"];
    $metodo = $_GET["meth"];
    

    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }

    if($metodo == "add"){
        if(!isset($_SESSION['carrinho'][$id])){
            $_SESSION['carrinho'][$id] = 1;
        }else{
            $_SESSION['carrinho'][$id] += 1;
        };
    }elseif($metodo == "del"){
        unset($_SESSION['carrinho'][$id]);
        header('Location: carrinho.php');
    }else{
        $quant = $_SESSION['carrinho'][$id] - 1;
        if($quant == 0){
            unset($_SESSION['carrinho'][$id]);
            header('Location: carrinho.php');
        }else{
            $_SESSION['carrinho'][$id] -= 1;  
        };
    }

    print_r($_SESSION["carrinho"]);
    header('Location: carrinho.php');
?>