<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2>Dar de bajao</h2>
<p>Aquí podrás dar de baja tu cuenta, solo confirma que lo deseas</p>

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
        <form class="form-signup form-horizontal" action="index.php?controller=users&action=drop" method="post">
            <?php
                echo $this->flash();
            ?>
            <p>Seguro que deseas dar de baja tu cuenta?</p>
            <p class="align-center">
                <input type="hidden" id="drop_key" name="drop_key" value="<?php echo $drop_key; ?>" >
            </p>


            <button class="btn btn-large btn-primary" type="submit">Si, dar de baja</button>
        </form>
        
        
        
    </div>
  </div>
</div>


    
