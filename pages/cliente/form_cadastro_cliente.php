<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/cliente/Style_Form_Cadastro_cliente.css"> 
    <title>Cadastro do Cliente:</title>
</head>
<body>
    <?php require "../../sources/navbar.php" ?>
    <div id="corpo_cli">
            <div id="form_cli">
                <div id="cabe_cli">
                    <h2>Criar uma nova conta</h2>
                    <h4>É rápido e fácil!</h4>
                </div>
                <div id="form_part">
                    <form  action="insert_cadastro_cliente.php" method="post" enctype="multipart/form-data">
                        <h4 id="seus_dados">Seus dados:</h4>
                        <input type="text" id="nome" name="Nome" placeholder="Nome:" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <input type="email" id="email" placeholder="Email:" name="Email" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <input type="text"  id="cpf" placeholder="CPF:" name="CPF" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <input type="tel" id="telefone" placeholder="Telefone:" name="Telefone" maxlength="15" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <input type="text"  id="Data" placeholder="Data de nascimento" name="DT_Nasc" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <input type="password" id="senha" name="Senha" placeholder="Senha:" required x-moz-errormessage="Ops.Não esqueça de preencher este campo." required>
                        
                        <div class="end_div">
                            <h4 id="endereco">Endereço:</h4>
                        </div>
                        <input type="text" id="cep" placeholder="CEP..." name="cep" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <input type="text" id="rua" placeholder="Rua..." name="rua" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                        <input type="text" id="bairro" placeholder="Bairro..." name="bairro" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                    <input type="text" id="cidade" placeholder="Cidade..." name="cidade" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                    <input type="text" id="uf" placeholder="Estado..." name="uf" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                    <input type="text" id="numero" placeholder="Número" name="numero" required x-moz-errormessage="Ops.Não esqueça de preencher este campo.">
                    
                    <div class="end_div">
                        <h4 id="endereco">Imagem:</h4>
                    </div>
                    <input type="file" id="arqui" name="Imagem"><br>
                    <button id="botao">Cadastrar</button>
                </form>
            </div>
        </div>
        <a href="form_login_cliente.php" id="bt_cli">Já possui uma conta?</a>
    </div>
    <?php
        require "../../sources/footer.php";
        ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script> jQuery(function($){
        $("#cpf").mask("999.999.999-99");
        $("#Data").mask("99/99/9999");
        $("#telefone").mask("(99) 99999-9999");
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.0.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js" type="text/javascript"></script>
    <script type="text/javascript" src="../../js/form.js"></script>
</body>
</html>