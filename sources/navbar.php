<?php
    session_start()
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="../../style/style.css">

<nav id="nav_bar" class="navbar bg-light fixed-top">
    <div class="container-fluid">
        <img src="../../scr/logos/Alexandria.png" style="max-width: 15em;" alt="">
        <form action="pesquisa_produto.php" method="get">
            <div class="Procura">
                <input type="text" name="pesquisa" placeholder="O que você procura?">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="align-self: end; margin:20px 20px 0 0;"></button>
            <div class="offcanvas-header">
                <img src="../../scr/logos/Alexandria_2.png" style="max-width: 15em;" style="margin:auto;" alt="">
            </div>
            <div id="apresentar">
                <?php
                    if(isset($_SESSION["logado2"])):
                ?>
                    <h3>Área Administrador:</h3>
                <?php
                    elseif (isset($_SESSION["logado1"])):
                ?>
                    <h3>Olá <?=$_SESSION["nome_user"]?></h3>
                <?php
                    endif;
                ?>
            </div>
            <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <div class="Nav-intem-parte">

                        <?php
                            if(isset($_SESSION["logado1"])):
                        ?>
                        <a  href="../../pages/cliente/sistema_login_cliente.php" class="btn btn-primary" style="width:10em;">
                            <img src="../../scr/logos/icone_cliente-1.png" style="max-width:3em;" alt=""> <br>
                            Sua conta
                        </a>
                        <a href="../../pages/carrinho/carrinho.php" class="btn btn-primary" style="width:10em;">
                            <img src="../../scr/logos/icone_carrinho-1.png" style="max-width:3em;" alt=""> <br>
                            carrinho
                        </a>
                        <?php
                            else:
                        ?>
                        <a  href="../../pages/cliente/form_cadastro_cliente.php" class="btn btn-primary" style="width:10em;">
                            <img src="../../scr/logos/icone_login_pagina.png" style="max-width:3em;" alt=""> <br>
                            Nova conta
                        </a>
                        <a href="../../pages/cliente/form_login_cliente.php" class="btn btn-primary" style="width:10em;">
                            <img src="../../scr/logos/icone_cliente-1.png" style="max-width:3em;" alt=""> <br>
                            Faça login
                        </a>
                        <?php
                            endif;
                        ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../produto/Index.php">
                        <img src="../../scr/logos/icone_pagina_inicial-1.png" style="max-width:2em;" alt="">
                        Página Inícial
                    </a>
                </li>
                <?php
                if(isset($_SESSION["logado2"])):
                ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../../pages/produto/form_cadastro_produto.php">
                        <img src="../../scr/logos/icone_cadastro_produto-1.png" style="max-width:2em;" alt="">
                        Cadastrar Produto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/produto/Produtos_Cadastrados.php">
                        <img src="../../scr/logos/icone_produtos_cadastrados-1.png" style="max-width:2em;" alt="">
                        Produtos Cadastrados
                    </a>
                </li>
                <?php
                    endif;
                ?>
            </ul>
            </div>
            <?php
                if(isset($_SESSION["logado1"]) or isset($_SESSION["logado2"])):
            ?>
                <a id="sair" href="../../pages/cliente/sair_login_cliente.php">Sair</a>
            <?php
                endif;
            ?>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>