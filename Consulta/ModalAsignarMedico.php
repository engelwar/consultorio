<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataConsulta['CODIGO_RESERVA']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


      <form method="POST" action="recibEditConsulta.php">
        <input type="hidden" name="id" value="<?php echo $dataConsulta['CODIGO_RESERVA']; ?>">

        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="especialidad" class="form-label">Especialidad</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <button type="button" id="actu" class="btn btn-info" onclick="select()">Consultar Medicos</button>
          </div>
        </div>
        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="medicos" class="form-label">Medicos</label>
            <select class="form-select" multiple aria-label="multiple select example" name="idMedico" id="idMedico" required>
              <?php
              while ($dataPersonal = mysqli_fetch_array($queryPersonal)) {
              ?>
                <option value="<?php echo $dataPersonal['CODIGO']; ?>"><?php echo $dataPersonal['NOMBRE'] . ' ' . $dataPersonal['APELLIDO']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" id="fecha_consulta" class="form-control" name="fecha_consulta" step="1" autofocus value="" required>
            <button type="button" id="actu" class="btn btn-info" onclick="select()">Consultar Horarios</button>
          </div>
        </div>
        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="horas" class="form-label">Horarios:</label>
            <select class="form-select" multiple aria-label="multiple select example" name="id_horario" id="horas" required></select>
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