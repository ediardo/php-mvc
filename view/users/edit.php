<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2>Editar mi info</h2>
<p>Aquí podrás modificar tu contraseña y correo electronico</p>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <ul class="nav nav-pills nav-stacked">
          <li><a href="index.php?controller=reports&action=my_reports">Ver mis reportes</a></li>
          <li><a href="index.php?controller=users&action=edit">Editar mi info</a></li>
          <li><a href="index.php?controller=users&action=drop">Dar de baja</a></li>
          
    </ul>

    </div>
    <div class="span10">
        <form class="form-signup form-horizontal" action="index.php?controller=users&action=edit" method="post">
            <?php
                echo $this->flash();
            ?>
            <div class="control-group">
              <label class="control-label" for="username">Nombre de usuario</label>
              <div class="controls">
                  <input type="text" id="username" required placeholder="Nombre de usuario" name="username" autocomplete="off" disabled="disabled" value="<?php echo $username; ?>" >
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="password_1">Contraseña</label>
              <div class="controls">
                <input type="password"  id="password_1" placeholder="Password" name="password_1" >
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="password_2">Confirmar contraseña</label>
              <div class="controls">
                <input type="password"  id="password_2" placeholder="Password" name="password_2" >
              </div>
            </div>

             <div class="control-group">
                <label class="control-label" for="email">Email</label>
                <div class="controls">
                  <input type="email"  id="email" placeholder="Email" name="email" value="<?php echo $email; ?>">
                </div>
              </div>


            <button class="btn btn-large btn-primary" type="submit">Modificar</button>
        </form>
        
        
        
    </div>
  </div>
</div>


    
