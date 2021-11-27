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
        <label for="" class="mr-4">
          <h4>Medicos:</h4>
        </label>
        <select class="form-select" multiple aria-label="multiple select example" id="idMedico" required>
          <?php
          while ($dataPersonal = mysqli_fetch_array($queryPersonal)) {
          ?>
            <option value="<?php echo $dataPersonal['CODIGO']; ?>"><?php echo $dataPersonal['NOMBRE'] . ' ' . $dataPersonal['APELLIDO']; ?></option>
          <?php } ?>
        </select>
        <label for="" class="mr-4">
          <h4>Fecha:</h4>
        </label>
        <input type="date" id="fecha_consulta" class="form-control" name="fecha_consulta" step="1" autofocus value="" required>

        <button type="button" id="actu" class="btn btn-info" onclick="select()">Consultar Horarios</button>

        <label for="" class="mr-4">
          <h4>Horarios:</h4>
        </label>
        <select class="form-select" multiple aria-label="multiple select example" name="id_horario" id="horas" required></select>
        <div class="col-md-12 mt-2">
          <button type="submit" class="btn btn-danger">Guardar Cambios</button>
        </div>
      </form>

    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script>
  function select() {
    var medico_array = $('#idMedico').val();
    var medico = medico_array[0];
    var fecha_consulta = $('#fecha_consulta').val();

    $.ajax({
      url: 'datos_horario.php',
      type: 'POST',
      // dataType: 'json',
      data: {
        dato1: medico,
        dato2: fecha_consulta
      },
      success: function(res) {
        var js = JSON.parse(res);
        var option;
        for (var i = 0; i < js.length; i++) {
          option += '<option value="' + js[i].CODIGO + '">' + js[i].INICIO + ' - ' + js[i].FIN + '</option>';
        }
        $('#horas').html(option);
      }
    });
  };
</script>
<!---fin ventana Update --->