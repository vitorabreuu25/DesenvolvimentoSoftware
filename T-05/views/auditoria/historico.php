<?php print view('layout.header'); ?>

<div class="content">            
    <div class="banner"></div>
    <div class="container">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Historico</h2>
        </div>
    </div>
    
    <?php
    if ($status == 500) { ?>
        <p class="text-center"><?php print $msg; ?></p>
    <?php } else { ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
                <th scope="col">Mensagem</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $historico) { ?>
                <tr>
                    <th scope="row"><?php print $historico['id']; ?></th>
                    <td><?php print date("d/m/Y", strtotime($historico['dt_historico'])); ?></td>
                    <td><?php print date("H:i", strtotime($historico['dt_historico'])); ?></td>
                    <td><?php print $historico['st_mensagem']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    <?php } ?>
    </table>
</div>
    
<?php print view('layout.footer'); ?>