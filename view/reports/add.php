<h1>Reporta un número telefonico</h1>
<p>Ingresa los datos del número telefónico que deseas denunciar</p>
<div class="row">
    <div class="offset2">
        <form class="form-report form-horizontal" action="index.php?controller=reports&action=add" method="post">
            <?php
                echo $this->flash();
            ?>
            <div class="control-group">
              <label class="control-label" for="number_txt">Telefono que deseas denunciar</label>
              <div class="controls">
                <input type="number" id="number_txt" required placeholder="Telefono" name="number_txt" autocomplete="off" >
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="password_1">Poseedor de la linea</label>
              <div class="controls">
                <input type="text" required id="owner_txt" placeholder="Poseedor de la linea" name="poseedor_txt" >
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="description_txt">Descripción</label>
              <div class="controls">
                <textarea rows="7" cols="37" required placeholder="Breve descripción de lo que pasó"id="description_txt" name="description_txt" ></textarea>
              </div>
            </div>

             <div class="control-group">
                <label class="control-label" for="email">Notificaciones</label>
                <div class="controls">
                  <label class="checkbox">
                    <input type="checkbox" value="">
                    Alertarme si hay nuevas denuncias para este numero
                  </label>
                </div>
              </div>

            <div class="row">
                <div class="offset3">
                    <button class="btn btn-large btn-primary" type="submit">Reportar</button>
                </div>
            </div>
        </form>
    </div>
</div>