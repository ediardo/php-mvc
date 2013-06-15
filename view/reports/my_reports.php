<h2>Mis reportes</h2>
<p>Aquí podrás ver todos los reportes que has realizado</p>

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
            <?php
                echo $this->flash();
            ?>
    </div>
  </div>
</div>

