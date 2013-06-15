
        <form class="form-signup form-horizontal" action="index.php?controller=users&action=recover" method="post">
            <h2>Recuperar contraseñao</h2>
<p>Aquí podrás ajustar una contraseña, escribe tu email para enviarte instrucciones</p>


            <?php
                echo $this->flash();
            ?>
            <div class="control-group">
              <label class="control-label" for="username">Nombre de usuario</label>
              <div class="controls">
                  <input type="text" id="username" required placeholder="Nombre de usuario" name="username" autocomplete="off" >
              </div>
            </div>

            

            <button class="btn btn-large btn-primary" type="submit">Recuperar contraseña</button>
        </form>
        
        
        
    </div>
  </div>
</div>


    
