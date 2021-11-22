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
        <div class="col-md-12 registrar-form">
            <h2>Registrar</h2>
            <p>Se voce ja tem cadastro, <a href="/login">clique aqui para logar</a></p>
            <form action="/usuario/registro" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome:</label>
                    <input type="text" class="form-control" name="st_nome" id="exampleInputEmail1">                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">RG:</label>
                    <input type="text" class="form-control" name="st_rg" id="exampleInputEmail1">                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha:</label>
                    <input type="password" class="form-control" name="st_senha" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha novamente:</label>
                    <input type="password" class="form-control" name="st_senha_confirmacao" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </form>
        </div>
    </div>
</div>
    
<?php print view('layout.footer'); ?>