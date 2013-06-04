<form class="form-signup form-horizontal" action="index.php?controller=users&action=add" method="post">
    <h2 class="form-signin-heading">Registrar una cuenta nueva</h2>
    <div class="control-group">
      <label class="control-label" for="username">Nombre de usuario</label>
      <div class="controls">
        <input type="text" id="username" required placeholder="Nombre de usuario" name="username">
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="password_1">Contraseña</label>
      <div class="controls">
        <input type="password" required id="password_1" placeholder="Password" name="password_1">
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="password_2">Confirmar contraseña</label>
      <div class="controls">
        <input type="password" required id="password_2" placeholder="Password" name="password_2">
      </div>
    </div>
    
     <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
          <input type="email" required id="email" placeholder="Email" name="email">
        </div>
      </div>
    
    
    <button class="btn btn-large btn-primary" type="submit">Registrar</button>
</form>