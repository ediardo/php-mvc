
<div class="container">

    <form class="form-signin" action="index.php?controller=users&action=login" method="post">
        <h2 class="form-signin-heading">Inicia sesión</h2>
        <input type="text" class="input-block-level" placeholder="Usuario" name="username">
        <input type="password" class="input-block-level" placeholder="Contraseña" name="password">
        <div class="row-fluid">
            <div class="span6"><a href="index.php?controller=users&action=new_password">Olvide mi contraseña</a></div>
            <div class="span6"><a href="index.php?controller=users&action=add">Crear cuenta</a></div>
        </div>
        <button class="btn btn-large btn-primary" type="submit">Entrar</button>
    </form>

</div>