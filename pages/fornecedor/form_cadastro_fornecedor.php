<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/fornecedor/Style_form_cadastro_fornecedor.css">
    <title>Cadastro do Fornecedor:</title>
</head>
<body>
    <?php require "../../sources/navbar.php" ?>
    <div id="form">
        <div id="cabe_cli">
            <h2>Cadastrar Fornecedor:</h2>
        </div>
        <div id="form_cli">
            <form  action="insert_cadastro_fornecedor.php" method="post">
                <div id="seus_dados"><h4>Seus dados:</h4></div>
                <input type="text" name="Empresa"  placeholder="Empresa..." required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
               <input type="text" name="CNPJ_Fornecedor"  placeholder="CNPJ..." required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
              <input type="email" name="Email_Fornecedor"  placeholder="E-mail..." required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                <input type="tel" name="Tel_Fornecedor"  placeholder="Telefone:" required x-moz-errormessage="Ops.Não esqueça de preencher este campo."></div>
                <div class="end_div">
                    <h4 id="endereco">Endereço:</h4>
                </div>
                <input type="text" id="end" placeholder="Endereço..." name="Endereco_Fornecedor" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                <input type="text" id="desc" placeholder="Descrição..." name="Descricao" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                <div id="cep"><input type="text" placeholder="CEP..." name="CEP_Fornecedor" required x-moz-errormessage="Ops.Não esqueça de preencher este campo."></div>
                <div id="div_botao"><button id="botao">Cadastrar</button></div>
            </form>
        </div>
    <?php
        require "../../sources/footer.php";
    ?>
</body>
</html>