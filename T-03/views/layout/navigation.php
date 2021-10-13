<div class="col-md-7 menu-main-menu-container">
    <ul>
        <li><a href="/home" title="Home">Home</a></li>
        <li><a href="/ajuda" title="Ajuda">Ajuda</a></li>

        <?php if (isset($_SESSION["hash"])) { ?>
                <li><a href="/compra/minhas" title="Minhas Compras">Minhas Compras</a></li>
                <li><a href="/auditoria/historico" title="Historico">Historico</a></li>
                <li><a href="/usuario/logout" title="Logout">Logout</a></li>
            <?php } else { ?>
                <li><a href="/login" title="Login">Login</a></li>
                <li><a href="/registro" title="Registro">Registro</a></li>
        <?php } ?>
    </ul>
</div>