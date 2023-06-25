<?php 
$conexao = mysqli_connect("localhost", "root", "", "alexandria_books", "3306");
if(!$conexao){
    echo "Erro:".mysqli_connect_error();
}

?>