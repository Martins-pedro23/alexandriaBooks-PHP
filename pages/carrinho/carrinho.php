<?php
    require "../../sources/conexao.php";
    $valor_compra = 0;
    $itens = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/carrinho/Style_carrinho.css">
    <title>Document</title>
</head>
<body>
    <?php
    require "../../sources/navbar.php";
    if(isset($_SESSION["carrinho"])):
    ?>
    <div id="corpo_carrinho">
        <div class="lista_produtos">
            <table id="tabela_produtos">
                <tr>
                    <th>produto</th>
                    <th>quantidade</th>
                    <th>Valor</th>
                    <th>Remover</th>
                </tr>
            <?php 
                foreach($_SESSION["carrinho"] as $key => $value):
                    $sql_select = "SELECT * FROM Produto p INNER JOIN Imagem_Produto img ON p.ID_Produto = img.ID_Produto where p.ID_Produto = $key";
                    $query_select = mysqli_query($conexao, $sql_select);
                    $fecht = mysqli_fetch_assoc($query_select);
                    $vlr_total = $fecht["Vlr_Unitario"]*$value;
                    $valor_compra = $vlr_total + $valor_compra;
                    $itens = $value + $itens;
                    ?>
            
                        <tr>

                            <td>
                                <div class="produto_div">
                                    <img src="../<?=$fecht["Caminho_Img_Produto"]?>" alt="Card image cap">
                                    <div>
                                        <a href="../produto/Visualizar_Produto.php?id=<?=$fecht["ID_Produto"]?>" class="link_produto"><h4><?=$fecht["Nome"]?></h4></a>
                                        <p><?=$fecht["Descricao"]?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="quanti">
                                    <div class="botao_add_minus">
                                        <a href="/../Codigo/pages/carrinho/adicionar_carrinho.php?prod=<?=$key?>&meth=min" class="botao_add_minus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                        </svg></a>
                                    </div>
                                    <?=$value?>
                                    <div class="botao_add_minus">
                                        <a href="/../Codigo/pages/carrinho/adicionar_carrinho.php?prod=<?=$key?>&meth=add" class="botao_add_minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td><?=$vlr_total?></td>
                            <td class="remover">
                                <a href="/../Codigo/pages/carrinho/adicionar_carrinho.php?prod=<?=$key?>&meth=del">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                                </a>
                            </td>
                        </tr>
                        <?php
                endforeach;
                ?>
            </table>
            <div>
                <form action="" id="frete">
                    <div id="frete_calc">
                        <p>Calcule o frete:</p>
                        <input type="text" id="cep">
                        <button>OK</button>
                    </div>
                    <br>
                    <input type="radio" name="frete" id="gratis">
                    <label for="gratis">normal</label>
                    <br>
                    <input type="radio" name="frete" id="xpress">
                    <label for="xpress">expresso </label>
                    <br>
                    <input type="radio" name="frete" id="retirar">
                    <label for="retirar">Retirar</label>
                </form>
            </div>   
        </div>
        <div class="resumo_pedido">
            <h3>Resumo pedido</h3>
            <div class="li_p">
                <p><?=$itens?> produtos</p>
                <p><?=$valor_compra?></p>
            </div>
            <div class="li_p">
                <p>Frete</p>
                <p>Gratis</p>
            </div>
            <div id="total">
                <h4>Total</h4>
                <div>
                    <h5>R$ <?=$valor_compra?></h5>
                    <P>EM ATÉ 6X SEM JUROS</P>
                </div>
            </div>
            </ul>
            <ul>
                <li>R$<?=$valor_compra?> no boleto</li>
                <li> em 6X de R$ <?=round($valor_compra/6, 2)?> no carão de crédito</li>
                <li>R$<?=$valor_compra?> no PIX</li>
            </ul>
            <div id="finalizar">
                <a href="verificar_login.php">Finalizar compra</a>
            </div>
        </div>
    </div>
    <?php
        $_SESSION["valorTotal"] = $valor_compra;

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script> jQuery(function($){
        $("#cep").mask("99999-999");

        });
    </script>

    <?php
        else:
    ?>
        <h1 style="margin-top: 175px;">Não há produtos no carrinho</h1>
    <?php
        endif;
        require "../../sources/footer.php";
    ?>
</body>
</html>

 