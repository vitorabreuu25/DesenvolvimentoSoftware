<?php print view('layout.header'); ?>

<div class="content">            
    <div class="banner"></div>
    <div class="container">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Minhas compras</h2>
        </div>
    </div>
    
    <?php
    if ($status == 500) { ?>
        <p class="text-center"><?php print $msg; ?></p>
    <?php } else { ?>

    <table class="table table-bordered minhas-compras">
        <thead>
            <tr>
                <th scope="col" class="center">#</th>
                <th scope="col">Evento</th>
                <th scope="col" class="center">Data do evento</th>
                <th scope="col" class="center">Data da compra</th>
                <th scope="col" class="center">Valor</th>
                <th scope="col" class="center">Estornado</th>
                <th scope="col" class="center">Acoes</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $dataAtual = date("Y-m-d h:i:s");
                
                foreach($data as $compra) {
                    $dataEvento = "";
                    
                    if ($compra->dt_estorno) {
                        $dataEvento = date("d/m/Y", strtotime($compra->dt_estorno));
                    } elseif ($compra->dt_evento <= $dataAtual) {
                        $dataEvento = "Realizado";
                    }
                ?>
                <tr>
                    <th scope="row"><?php print $compra->id_compra; ?></th>
                    <td><?php print $compra->st_nome; ?></td>
                    <td align="center"><?php print date("H:i - d/m/Y", strtotime($compra->dt_evento)); ?></td>
                    <td align="center"><?php print date("d/m/Y", strtotime($compra->dt_compra)); ?></td>
                    <td align="center"><?php print "R$ " . number_format($compra->vl_preco, 2); ?></td>
                    <td align="center"><?php print $dataEvento; ?></td>
                    <td align="center">
                        <?php
                        if (!$dataEvento) { ?>
                            <a href="/compra/estornar/<?php print $compra->id_compra; ?>" class="btn btn-danger btn-sm" title="Estornar evento">Estornar</a>
                            <a href="/compra/presente/<?php print $compra->id_compra; ?>" title="Presentear evento" class="btn btn-primary btn-sm">Presentear</a>
                        <?php } ?>            
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    <?php } ?>
    </table>
</div>
    
<?php print view('layout.footer'); ?>