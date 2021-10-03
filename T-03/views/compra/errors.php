<?php print view('layout.header'); ?>

<div class="container" style="width: 900px">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Presentear evento</h2>
        </div>
    </div>

    <div class="container" style="width: 600px">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">Não foi possivel estornar ou presentear este evento pois o evento comecara em menos de 6 horas</div>
                <p>
                    <strong>Evento:</strong> <?php print $data['st_nome']; ?><br />
                    <strong>Data do evento:</strong>                     <?php print "Dia " . date("H:i", strtotime($data['dt_evento'])) . " as " . date("d/m/Y", strtotime($data['dt_evento'])); ?><br />
                    <strong>Descricao:</strong> <?php print $data['st_descricao']; ?>
                </p>
                <p>
                    <a href="/compra/minhas/" title="Minhas compras" class="btn btn-primary">Minhas compras</a>
                </p>
            </div>
        </div>
    </div>
</div>
    
<?php print view('layout.footer'); ?>