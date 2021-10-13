<?php print view('layout.header'); ?>

<div class="content">            
    <div class="banner"></div>
    <div class="container">

<?php
    if (isset($_SESSION["hash"])) {
        $btnComprar = [
            'path' => '/compra/carrinho/' . $data['id'],
            'msg' => 'Comprar'
        ];
    } else {
        $btnComprar = [
            'path' => '/login',
            'msg' => 'Login'
        ];
    }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2><?php print $data['st_nome']; ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="left-content-details">
                <img src="<?php print URL::asset('images/' . $data['st_image']); ?>" alt="" />
                <p>&nbsp;</p>
                <?php print $data['st_descricao']; ?>
            </div>
        </div>  
        <div class="col-md-4">
            <div class="right-content-details">
                <h2>Detalhes do evento</h2>
                <p><strong>Categoria:</strong> <?php print $data['st_categoria']; ?></p>
                <p><strong>Hora do evento:</strong> <?php print "Dia " . date("H:i", strtotime($data['dt_evento'])) . " as " . date("d/m/Y", strtotime($data['dt_evento'])); ?></p>
                <p><strong>Valor:</strong> R$ <?php print number_format($data['vl_preco'], 2); ?></p>
                <a class="btn btn-success" href="<?php print $btnComprar['path']; ?>" role="button"><?php print $btnComprar['msg']; ?></a>
            </div>
        </div>
    </div>
</div>
    
<?php print view('layout.footer'); ?>