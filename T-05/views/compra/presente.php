<?php print view('layout.header'); ?>

<div class="container" style="width: 900px">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Presentear evento</h2>
        </div>
    </div>

    <div class="container" style="width: 600px">
        <div class="row">
            <div class="col-md-12 login-form">
                <p>Informe o RG da pessoa que voce deseja presentear este evento</p>
                <form action="/compra/presente" method="post">
                    <div class="form-group">
                        <label>RG:</label>
                        <input type="text" class="form-control" name="st_rg">
                    </div>
                    
                    <input type="hidden" name="idCompra" value="<?php print $idCompra; ?>" />
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
<?php print view('layout.footer'); ?>