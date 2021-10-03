<?php print view('layout.header'); ?>

<div class="content">            
    <div class="banner"></div>
    <div class="container">
        
<?php
    if (isset($errors)) {
    ?>
        <div class="errors">
            <ul>
                <?php
                foreach($errors as $erro) {
                    print "<li class='error'>" . $erro[0] . "</li>";
                }
                ?>
            </ul>
        </div>
    <?php
    }
?>

<div class="container" style="width: 600px">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Carrinho de compras</h2>
            <p class="text-center">Informe todos os dados necessarios para concluir a compra do evento</p>
        </div>
    </div>

    <form action="/compra" method="post">
        <div class="row separador">
            <div class="col-lg-12">
                <h3>Informacoes do pedido</h3>
                <table class="table-carrinho-compra">
                    <tr>
                        <td>Codigo</td>
                        <td>Nome do evento</td>
                        <td>Valor</td>
                    </tr>
                    <tr>
                        <td><?php print $data['eventos']['id']; ?></td>
                        <td><?php print $data['eventos']['st_nome']; ?></td>
                        <td><?php print $data['eventos']['vl_preco']; ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><strong>Valor total</strong></td>
                        <td><?php print $data['eventos']['vl_preco']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row separador">
            <div class="col-md-12">
                <h3>Informacoes pessoais</h3>
                <p>Nome:<br />
                    <input type="text" name="st_nome" value="<?php print $data['usuarios']['st_nome']; ?>" disabled/>
                </p>
                <p>RG:<br />
                    <input type="text" name="st_rg" value="<?php print $data['usuarios']['st_rg']; ?>" />
                </p>
            </div>
        </div>
        <div class="row separador">
            <div class="col-md-12">
                <h3>Forma de pagamento</h3>
                <p>Cartao de Credito:<br />
                <select name="forma-pagamento">
                    <option value="Visa">Visa</option>
                    <option value="Master">Master</option>
                </select></p>
            </div>
        </div>
        <div class="row separador">
            <div class="col-md-12">
                <h3>Dados do cartao de credito</h3>
                <table class="cartao-credito">
                    <tr>
                        <td colspan="3">
                            Nome completo:<br />
                            <input type="text" name="st_nome_cartao" value="<?php print strtoupper($data['usuarios']['st_nome']); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            Numero do cartao:<br />
                            <input type="text" name="st_numero_cartao" value="1234123412341234" />
                        </td>
                        <td style="border-left: solid 10px transparent;">
                            Vencimento do cartao:<br />
                            <input type="text" name="st_vencimento_cartao" value="12" />
                        </td>
                        <td style="border-left: solid 10px transparent;">
                            Codigo de seguranca:<br />
                            <input type="text" name="st_codigo_cartao" value="123" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: right; width: 100%; margin-top: 30px;">
                    <input type="hidden" name="id_evento" value="<?php print $data['eventos']['id']; ?>" />
                    <input type="hidden" name="id_usuario" value="<?php print $data['usuarios']['id']; ?>" />
                    <input type="submit" class="btn btn-success btn-comprar" value="Finalizar compra" />
                </div>
            </div>
        </div>
    </form>
</div>
    
<?php print view('layout.footer'); ?>