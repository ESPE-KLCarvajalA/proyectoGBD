<?php
// tabla.php

include_once '../formularios/Conexion.php';

// Obtener la conexión utilizando el método estático de la clase
$conexion = Cconexion::ConexionBD();

if ($conexion) {
  // Obtener datos de Yacimiento
  $sqlYacimiento = "exec sp_GetYacimiento";
  $resultYacimiento = $conexion->query($sqlYacimiento);

  // Muestra datos de Pozo
  $sqlPozo = "select * from vw_Pozo ";
  $resultPozo = $conexion->query($sqlPozo);

  // Muestra datos de Pozo
  $sqlTrabajador = "Select * from vw_Trabajador";
  $resultTrabajador = $conexion->query($sqlTrabajador);

    // Muestra datos de Material
  $sqlMaterial = "Select * from vw_Material";
  $resultMaterial = $conexion->query($sqlMaterial);
} else {
  echo "Error al establecer la conexión a la base de datos.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo/logo_2.png">
  <title>PetroCaSa</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />


</head>
<style>
    .table-container {
      max-height: 200px; /* Altura máxima del contenedor de la tabla */
      overflow-y: auto; /* Agrega un scrollbar vertical si es necesario */
    }
  </style>
<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php include '../elements/aside.php'; ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <?php include '../elements/navbar.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
<!-- ------------------------------TABLA YACIMIENTO----------------- -->

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Registro de Yacimientos!</p>
                <a class="btn btn-primary btn-sm ms-auto" href="../formularios/Yacimiento.php">
                <span class="fa fa-plus-circle"></span>Agregar nuevo</a>
              </div>
            </div>
            <br>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0 table-container" >
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nombre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Ubicación</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Fecha  Descubrimiento</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($filaYacimiento = $resultYacimiento->fetch(PDO::FETCH_ASSOC)) {
                      echo "<tr>";
                      echo "<td class='text-center text-xs'>{$filaYacimiento['id_campo_pk']}</td>";
                      echo "<td class='text-center text-xs' opacity-7'>{$filaYacimiento['nombre_campo']}</td>";
                      echo "<td class='text-center text-xs' opacity-7'>{$filaYacimiento['ubicacion']}</td>";
                      echo "<td class='text-center text-xs' opacity-7'>{$filaYacimiento['fecha_descubrimiento']}</td>";
                      echo "<td class='text-center text-xs' opacity-7'>
                      <a class='btn btn-link text-dark px-3 mb-0' href='../crud/editarYacimiento.php?id={$filaYacimiento['id_campo_pk']}'>
                      <span class='fas fa-pencil-alt text-dark me-2'></span> Editar</a> | 
                      <a class='btn btn-link text-danger text-gradient px-3 mb-0' href='../crud/eliminar.php?id={$filaYacimiento['id_campo_pk']}'>
                      <span  class='far fa-trash-alt me-2'></span>Eliminar</a></td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
<!-- ------------------------------TABLA POZO----------------- -->

<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Registro de Pozos</p>
                <a class="btn btn-primary btn-sm ms-auto" href="../formularios/Pozo.php">
                <span class="fa fa-plus-circle"></span>Agregar nuevo</a>
              </div>
            </div>
            <br>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0 table-container">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Yacimiento</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nombre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Profundidad</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Estado</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($filaPozo = $resultPozo->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td class='text-center text-xs'>{$filaPozo['IdPozo']}</td>";
                    echo "<td class='text-center text-xs'>{$filaPozo['NombreCampo']}</td>";
                    echo "<td class='text-center text-xs'>{$filaPozo['NombrePozo']}</td>";
                    echo "<td class='text-center text-xs'>{$filaPozo['Profundidad']}</td>";
                    echo "<td class='text-center text-xs'>{$filaPozo['Estado']}</td>";
                    echo "<td class='text-center text-xs'>
                          <a class='btn btn-link text-dark px-3 mb-0' href='../crud/editarPozo.php?id={$filaPozo['IdPozo']}'>
                          <span class='fas fa-pencil-alt text-dark me-2'></span> Editar</a> | 
                          <a class='btn btn-link text-danger text-gradient px-3 mb-0' href='../crud/eliminar.php?idPozo={$filaPozo['IdPozo']}'>
                          <span class='far fa-trash-alt me-2'></span>Eliminar</a></td>";
                    echo "</tr>";
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- ------------------------------------------------------ -->
<!-- ------------------------------TABLA TRABAJADORES----------------- -->

<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Registro de los Trabajadores</p>
                <a class="btn btn-primary btn-sm ms-auto" href="../formularios/Trabajador.php">
                <span class="fa fa-plus-circle"></span>Agregar nuevo</a>
              </div>
            </div>
            <br>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0 table-container">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nombre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Apellido</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tipo de Puesto</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Fecha contratacion</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($filaTrabajador = $resultTrabajador->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td class='text-center text-xs'>{$filaTrabajador['id_trabajador_pk']}</td>";
                    echo "<td class='text-center text-xs'>{$filaTrabajador['nombre']}</td>";
                    echo "<td class='text-center text-xs'>{$filaTrabajador['apellido']}</td>";
                    echo "<td class='text-center text-xs'>{$filaTrabajador['cargo']}</td>";
                    echo "<td class='text-center text-xs'>{$filaTrabajador['fecha_contratacion']}</td>";
                    echo "<td class='text-center text-xs'>
                          <a class='btn btn-link text-dark px-3 mb-0' href='../crud/editarTrabajador.php?id={$filaTrabajador['id_trabajador_pk']}'>
                          <span class='fas fa-pencil-alt text-dark me-2'></span> Editar</a> | 
                          <a class='btn btn-link text-danger text-gradient px-3 mb-0' href='../crud/eliminar.php?idTrabajador={$filaTrabajador['id_trabajador_pk']}'>
                          <span class='far fa-trash-alt me-2'></span>Eliminar</a></td>";
                    echo "</tr>";
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- ------------------------------------------------------ -->
<!-- ------------------------------TABLA MATERIAL----------------- -->

<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Registro de Material</p>
              </div>
            </div>
            <br>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0 table-container">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nombre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tipo de Material</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($filaMaterial = $resultMaterial->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td class='text-center text-xs'>{$filaMaterial['IdMaterial']}</td>";
                    echo "<td class='text-center text-xs'>{$filaMaterial['NombreMaterial']}</td>";
                    echo "<td class='text-center text-xs'>{$filaMaterial['TipoMaterial']}</td>";
                    
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- ------------------------------------------------------ -->




    </div>
    <?php include '../elements/footer.php';?>
  </main>
  <?php
  include '../elements/dependencias.php';
  ?>


</body>

</html>