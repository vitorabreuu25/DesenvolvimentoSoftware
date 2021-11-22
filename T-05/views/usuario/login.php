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
        <div class="col-md-12 login-form">
            <h2>Login</h2>
            <p>Se voce ainda nao tem conta, <a href="/registro">clique aqui e cadastre-se</a></p>
            <form action="/usuario/login" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">RG:</label>
                    <input type="text" class="form-control" name="st_rg" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha:</label>
                    <input type="password" class="form-control" name="st_senha" value="">
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>
</div>
    
<?php print view('layout.footer'); ?>