<?php print view('layout.header'); ?>   

<div class="content">            
    <div class="banner-home">
        <img src="<?php print URL::asset('images/breadcrumbs-bg.jpg'); ?>" alt="" />
    </div>
    <div class="container">

<h2 class="text-center">Proximos <span>Eventos</span></h2>
<div class="row">
    <?php foreach($data as $evento) { ?>
        <div class="col-md-4 evento">
            <div class="evento-image">
                <img src="<?php print URL::asset('images/' . $evento['st_image']); ?>" alt="" />
            </div>
            <div class="evento-wapper">
                <h3><?php print $evento['st_nome']; ?></h3>
                <div class="evento-categoria"><?php print $evento['st_categoria']; ?></div>
                <div class="evento-data"><strong><?php print "Dia " . date("d/m/Y", strtotime($evento['dt_evento'])) . " as " . date("H:i", strtotime($evento['dt_evento'])); ?>hr</strong></div>
                <div class="evento-conteudo">
                    <p><?php
                    if (strlen($evento['st_descricao']) > 160) {
                        print substr($evento['st_descricao'], 0, 161) . '...';
                    } else {
                        print $evento['st_descricao'];
                    }
                    ?></p>
                </div>
                <div class="evento-valor">
                    <div class="evento-preco">R$<?php print number_format($evento['vl_preco'],2); ?></div>
                    <div class="evento-detalhes"><a class="btn btn-success" href="/evento/detalhes/<?php print $evento['id']; ?>" role="button">Comprar</a></div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php print view('layout.footer'); ?>   
