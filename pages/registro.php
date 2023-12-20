<?php
// tabla.php

include_once '../formularios/Conexion.php';

// Obtener la conexión utilizando el método estático de la clase
$conexion = Cconexion::ConexionBD();

if ($conexion) {
  // Obtener datos de Yacimiento
  $sqlExtraccion = "Select * from vw_ExtraccionConGrupos";
  $resultExtracion = $conexion->query($sqlExtraccion);

} else {
  echo "Error al establecer la conexión a la base de datos.";
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('../elements/head.php'); ?>
<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php include('../elements/aside.php'); ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <?php include ('../elements/navbar.php');?>
    <!-- End Navbar -->

  <div class="container-fluid py-4">

    <div class="row">
      <div class="col-md-12 mt-4">
        <div class="card">
          <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Información de Extracciones a los Pozos</h6>
          </div>
          <div class="card-body pt-4 p-3">
            <ul class="list-group">

              <?php
              while ($extraccion = $resultExtracion->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm"><?= $extraccion['nombre'] ?></h6>
                    <span class="mb-2 text-xs">Yacimiento Perteneciente: <span class="text-dark font-weight-bold ms-sm-2"><?= $extraccion['nombre_campo'] ?></span></span>
                    <span class="mb-2 text-xs">Grupo: <span class="text-dark font-weight-bold ms-sm-2"><?= $extraccion['nombre_grupo'] ?></span></span>
                    <span class="mb-2 text-xs">Fecha de Extracción: <span class="text-dark ms-sm-2 font-weight-bold"><?= $extraccion['fecha_extraccion'] ?></span></span>
                    <span class="mb-2 text-xs">Volumen Extraído: <span class="text-dark ms-sm-2 font-weight-bold"><?= $extraccion['volumen_extraido'] ?></span></span>
                    <span class="text-xs">Horas Trabajadas: <span class="text-dark ms-sm-2 font-weight-bold"><?= number_format($extraccion['n_horas_trabajo'], 1) ?></span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <!-- Aquí puedes agregar enlaces o botones según tus necesidades -->
                  </div>
                </li>
                <?php
              }
              ?>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include '../elements/footer.php';?>
  </main>
  <?php include('../elements/dependencias.php'); ?>
</body>

</html>