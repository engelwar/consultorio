<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataCliente['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #563d7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
          Actualizar Información
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="recib_Update.php">
        <input type="hidden" name="id" value="<?php echo $dataCliente['id']; ?>">

        <div class="modal-body" id="cont_modal">

          <div class="form-group">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" name="nombres" required='true' value="<?php echo $dataCliente['nombres']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" required='true' value="<?php echo $dataCliente['apellidos']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" name="correo" required='true' value="<?php echo $dataCliente['correo']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" name="direccion" required='true' value="<?php echo $dataCliente['direccion']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="enfermedad_base" class="form-label">Enfermedad de base</label>
            <input type="text" class="form-control" name="enfermedad_base" required='true' value="<?php echo $dataCliente['enfermedad_base']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" name="nacionalidad" required='true' value="<?php echo $dataCliente['nacionalidad']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="number" class="form-control" name="telefono" required='true' value="<?php echo $dataCliente['telefono']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="fecha_nacimiento" class="form-label">Fecha nacimiento</label>
            <input type="date" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" min="01-01-1990" max="31-12-2000" step="2" value="<?php echo $dataCliente['fecha_nacimiento']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="num_referencia" class="form-label">Numero de referencia</label>
            <input type="number" class="form-control" name="num_referencia" required='true' value="<?php echo $dataCliente['num_referencia']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="personal_referencia" class="form-label">Personal de referencia</label>
            <input type="text" class="form-control" name="personal_referencia" required='true' value="<?php echo $dataCliente['personal_referencia']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="profesion" class="form-label">Profesion</label>
            <input type="text" class="form-control" name="profesion" required='true' value="<?php echo $dataCliente['profesion']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="tipo_sangre" class="form-label">Tipo de sangre</label>
            <input type="text" class="form-control" name="tipo_sangre" required='true' value="<?php echo $dataCliente['tipo_sangre']; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="ci" class="form-label">Carnet de Identidad</label>
            <input type="number" class="form-control" name="ci" required='true' value="<?php echo $dataCliente['ci']; ?>" autofocus>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->