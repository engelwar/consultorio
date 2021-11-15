<?php include("../include/header.php") ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$nombres = $_SESSION['nombres'];

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

<div class="p-5">

  <?php
  include('../config.php');

  $sqlCliente   = ("SELECT * FROM paciente ORDER BY id DESC ");
  $queryCliente = mysqli_query($con, $sqlCliente);
  $cantidad     = mysqli_num_rows($queryCliente);
  ?>



  <h4 class="text-center">
    <a href="registrarCliente.php" class="btn btn-primary mb-4">Registrar Paciente</a>
    <br>
    Pacientes Registrados
  </h4>
  <hr>

  <div class="text-center" style="background-color: #cecece">
    <div class="">
      <strong>Lista de Pacientes <span style="color: crimson"> ( <?php echo $cantidad; ?> )</span> </strong>
    </div>
  </div>

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
                        <th scope="col">Correo</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Enfermedad de base</th>
                        <th scope="col">Nacionalidad</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Fecha nacimiento</th>
                        <th scope="col">Numero de referencia</th>
                        <th scope="col">Personal de referencia</th>
                        <th scope="col">Profesion</th>
                        <th scope="col">Tipo de sangre</th>
                        <th scope="col">CI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                        <tr>
                          <td><?php echo $dataCliente['nombres']; ?></td>
                          <td><?php echo $dataCliente['apellidos']; ?></td>
                          <td><?php echo $dataCliente['correo']; ?></td>
                          <td><?php echo $dataCliente['direccion']; ?></td>
                          <td><?php echo $dataCliente['enfermedad_base']; ?></td>
                          <td><?php echo $dataCliente['nacionalidad']; ?></td>
                          <td><?php echo $dataCliente['telefono']; ?></td>
                          <td><?php echo $dataCliente['fecha_nacimiento']; ?></td>
                          <td><?php echo $dataCliente['num_referencia']; ?></td>
                          <td><?php echo $dataCliente['personal_referencia']; ?></td>
                          <td><?php echo $dataCliente['profesion']; ?></td>
                          <td><?php echo $dataCliente['tipo_sangre']; ?></td>
                          <td><?php echo $dataCliente['ci']; ?></td>

                          <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataCliente['id']; ?>">
                              Eliminar
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['id']; ?>">
                              Modificar
                            </button>
                          </td>
                        </tr>


                        <!--Ventana Modal para Actualizar--->
                        <?php include('ModalEditar.php'); ?>

                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('ModalEliminar.php'); ?>


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

<?php include("../include/footer.php") ?>