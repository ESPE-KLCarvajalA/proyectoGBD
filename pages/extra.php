<?php
// tabla.php

include 'Conexion.php';

// Obtener la conexión utilizando el método estático de la clase
$conexion = Cconexion::ConexionBD();

if ($conexion) {
  $sql = "SELECT * FROM Yacimiento";
  $result = $conexion->query($sql);
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
  <link rel="icon" type="image/png" href="../assets/img/logo/logo_1.png">
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

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php include '../elements/aside.php'; ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="../pages/inicio.php">Inicio</a>
            </li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Trabajadores</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Trabajadores</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center"> </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Inicio Sesión</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Lista de Trabajadores</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nombre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Ubicación</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Fecha Descubrimiento</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td class='text-center text-xs'>{$fila['id_campo_pk']}</td>";
                    echo "<td class='text-center text-xs' opacity-7'>{$fila['nombre_campo']}</td>";
                    echo "<td class='text-center text-xs' opacity-7'>{$fila['ubicacion']}</td>";
                    echo "<td class='text-center text-xs' opacity-7'>{$fila['fecha_descubrimiento']}</td>";
                    echo "<td class='text-center text-xs' opacity-7'><a href='editar.php?id={$fila['id_campo_pk']}'>Editar</a> | <a href='eliminar.php?id={$fila['id_campo_pk']}'>Eliminar</a></td>";
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
      
          <a class="btn btn-raised btn-primary btn-lg" href="perfil.php"> 
            <span class="fa fa-plus-circle"></span>Agregar nuevo</a>
       
    </div>
  </main>
  <?php
  include '../elements/srcipts.php';
  ?>


</body>

</html>