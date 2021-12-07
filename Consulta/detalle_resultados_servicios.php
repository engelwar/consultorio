<?php include("../include/header.php") ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];
$rol = $_SESSION['rol'];

include("../config.php");

if (isset($_GET['nombre'])) {
  $nombrePaciente = $_REQUEST['nombre'];
  $apellidoPaciente = $_REQUEST['apellido'];
  $ciPaciente = $_REQUEST['ci'];

  $sqlConsulta = ("SELECT DISTINCT drs.NUMERO_SOLICITUD_SERVICIO, drs.DETALLE_RESULTADO_SERVICIO, r.CODIGO_RESERVA, pa.NOMBRE, pa.APELLIDO, pa.CI, pa.TIPO_SANGRE, pa.ENFERMEDAD_BASE, r.FECHA_RESERVA, GROUP_CONCAT(DISTINCT p.NOMBRE,' ',p.APELLIDO) AS personal, GROUP_CONCAT(DISTINCT t.INICIO,' ',t.FIN) AS turnos, c.DETALLE_CONSULTA FROM personal p, paciente pa, reservas r, turnos t, consulta_medica c, solicitud_servicios ss, detalle_resultados_servicios drs WHERE pa.NOMBRE = '$nombrePaciente' AND pa.APELLIDO = '$apellidoPaciente' AND pa.CI = $ciPaciente AND pa.CODIGO = r.CODIGO_PACIENTE AND p.CODIGO = r.CODIGO_PERSONAL AND r.CODIGO_RESERVA = c.CODIGO_RESERVA AND r.CODIGO_TURNOS = t.CODIGO AND r.CODIGO_RESERVA = c.CODIGO_RESERVA AND c.NUMERO_CONSULTA = ss.NUMERO_CONSULTA AND ss.NUMERO_SOLICITUD = drs.NUMERO_SOLICITUD_SERVICIO ");
  $queryConsulta = mysqli_query($con, $sqlConsulta);
} else {
  $sqlConsulta = ("SELECT NOMBRE FROM personal WHERE NOMBRE IS NULL ");
  $queryConsulta = mysqli_query($con, $sqlConsulta);
}

?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
  <!-- Navbar Brand-->
  <a class="navbar-brand ps-3" href="../index.php">CONSULTORIO</a>
  <!-- Navbar-->
  <span class="text-info fs-2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
    </svg><?php echo $nombres; ?></span>
  <div>
    <a class="navbar-brand ps-3" href="../logout.php">Cerrar Sesion</a>
  </div>
</nav>

<div class="jumbotron">
  <div class="container w-50">
    <div class="text-center mb-4">
      <h2>Resultado de Servicio</h2>
    </div>
    <form action="">
      <div class="border p-4">
        <h4 class="text-center">Datos del Paciente</h4>
        <div class="mb-3">
          <label for="" class="form-label">Nombres del Paciente</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php if(isset($_GET['nombre'])){
            echo $nombrePaciente;
          } else {
            echo "";
          } 
          ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Apellidos del Paciente</label>
          <input type="text" class="form-control" id="apellido" name="apellido" required value="<?php if(isset($_GET['apellido'])){
            echo $apellidoPaciente;
          } else {
            echo "";
          } 
          ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">CI</label>
          <input type="number" class="form-control" id="ci" name="ci" required value="<?php if(isset($_GET['ci'])){
            echo $ciPaciente;
          } else {
            echo "";
          } 
          ?>">
        </div>
        <div class="text-center">
          <button class="btn btn-danger">Consultar</button>
        </div>
      </div>
    </form>
  </div>

  <div class="mt-4">
    <div class="row clearfix flex-row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <div class="row clearfix">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-md-12 p-2">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Nombres</th>
                          <th scope="col">Apellidos</th>
                          <th scope="col">CI</th>
                          <th scope="col">Tipo de Sangre</th>
                          <th scope="col">Enfermedad de Base</th>
                          <th scope="col">Medico Asignado</th>
                          <th scope="col">Fecha Consulta</th>
                          <th scope="col">Hora Consulta</th>
                          <th scope="col">Detalle</th>
                          <th scope="col">Detalle Resultado de Servicio</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($dataConsulta = mysqli_fetch_array($queryConsulta)) {?>
                        <tr>
                          <td><?php echo $dataConsulta['NOMBRE']; ?></td>
                          <td><?php echo $dataConsulta['APELLIDO']; ?></td>
                          <td><?php echo $dataConsulta['CI']; ?></td>
                          <td><?php echo $dataConsulta['TIPO_SANGRE']; ?></td>
                          <td><?php echo $dataConsulta['ENFERMEDAD_BASE']; ?></td>
                          <td><?php echo $dataConsulta['personal'] ?></td>
                          <td><?php echo $dataConsulta['FECHA_RESERVA']; ?></td>
                          <td><?php echo $dataConsulta['turnos'] ?></td>
                          <td><?php echo $dataConsulta['DETALLE_CONSULTA']; ?></td>
                          <td><?php echo $dataConsulta['DETALLE_RESULTADO_SERVICIO']; ?></td>
                          <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataConsulta['NUMERO_SOLICITUD_SERVICIO']; ?>">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                              </svg>
                              Detalle
                            </button>
                          </td>
                        </tr>
                        <!--Ventana Modal para Actualizar--->
                        <?php include('ModalDetalleServicio.php'); ?>

                        <?php } ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("../include/footer.php") ?>