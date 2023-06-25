<?php
    require "../../sources/autenticar_admin.php";
    require "../../sources/conexao.php";
    $id = $_GET["id"];

    $sql_select = "SELECT * FROM produto where ID_Produto = '$id'";
    $query = mysqli_query($conexao, $sql_select);
    $resul = mysqli_fetch_assoc($query);

    $sql_select_1 = "SELECT * FROM  Genero";
    $query_1 = mysqli_query($conexao, $sql_select_1);

    $sql_select_2 = "SELECT * FROM  Fornecedor";
    $query_2 = mysqli_query($conexao, $sql_select_2);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../Codigo/style/produto/Style_form_cadastro_produto.css">
    <title>Cadastrar Produto: </title>
</head>
<body>
    <?php
    require "../../sources/navbar.php"
    ?>
    <div id="corpo_form_produto">
        <form id="form_prod" action="editar_produto.php?id=<?=$resul['ID_Produto']?>" method="post" enctype="multipart/form-data">
            <h2>Cadastre um novo produto</h2>
            <div id="formulario_prod">
                <div class="form_prod_part">
                    <input class="Input_prod" value="<?=$resul['Nome']?>" type="text" placeholder="Título:" class="form-control" id="nome" aria-describedby="emailHelp" name="Nome" required x-moz-errormessage="Ops."> 
                </div>
                <div class="form_prod_part">
                    <textarea class="Input_prod"   name="Descricao" id="Descricao" placeholder="Descrição"  class="form-control" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <?=$resul['Descricao']?>"
                    </textarea>
                </div>
                <div class="form_prod_part">
                    <input class="Input_prod" value="<?=$resul['Vlr_Unitario']?>" type="text" placeholder="Valor:" class="form-control" id="valor" aria-describedby="emailHelp" name="Vlr_Unitario" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                    <select class="Input_prod" value="<?=$resul['Capa']?>"  class="form-select" aria-label="Default select example" name="Capa" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <option value="Digital">Digital</option>
                        <option value="Dura">Capa dura</option>
                        <option value="Comum">Capa comum</option>
                    </select>
                </div>
                <div class="form_prod_part">
                    <input class="Input_prod" value="<?=$resul['Num_Pag']?>"  type="text" placeholder="Número de páginas:" class="form-control" id="Num_Pag" aria-describedby="emailHelp" name="Num_Pag" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                    <select class="Input_prod" value="<?=$resul['Idioma']?>"  class="form-select" aria-label="Default select example" name="Idioma" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <option value="Português">Português</option>
                        <option value="Espanhol">Espanhol</option>
                        <option value="Inglês">Inglês</option>
                        <option value="Francês">Francês</option>
                        <option value="Italiano">Italiano</option>
                    </select>
                </div>
                <div class="form_prod_part">
                    <input class="Input_prod" value="<?=$resul['Formato']?>"  type="text" placeholder="Medidas:" class="form-control" id="Medidas" aria-describedby="emailHelp" name="Medidas" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                    <input class="Input_prod" value="<?=$resul['Peso']?>"  type="text" placeholder="Peso:" class="form-control" id="Peso" aria-describedby="emailHelp" name="Peso" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                </div>
                <div class="form_prod_part">
                    <input class="Input_prod" value="<?=$resul['Estoque']?>"  type="number" placeholder="Estoque:" class="form-control" id="estoque" name="Estoque" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                    <select class="Input_prod"  class="form-select" aria-label="Default select example" name="Genero" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <?php
                            while($resul = mysqli_fetch_assoc($query_1)): 
                        ?>
                        <option value="<?=$resul['ID_Genero']?>"><?=$resul['Nome_Genero']?></option>
                        <?php
                            endwhile
                        ?>
                    </select>
                    <select class="Input_prod"  class="form-select" aria-label="Default select example" name="Fornecedor" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <?php
                            while($resul_2 = mysqli_fetch_assoc($query_2)): 
                        ?>
                        <option value="<?=$resul_2['ID_Fornecedor']?>"><?=$resul_2['Nome_Fornecedor']?></option>
                        <?php
                            endwhile
                        ?>
                    </select>
                </div>
                <div class="end_div">
                    <h4 id="imagem">Imagem:</h4>
                </div>
                    <input class="Input_prod"  type="file" id="arqui" name="Imagem">
                <div id="botaozinho">
                    <button class="Input_prod"  id="botao" type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
    <?php
        require "../../sources/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>