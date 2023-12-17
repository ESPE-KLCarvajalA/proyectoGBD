<?php
include_once '../crud/insertar.php'; // Ajusta la ruta según tu estructura de archivos

// CREATE
if (isset($_POST['submit'])) {
  $nombreCampo = $_POST['nombreCampo'];
  $ubicacion = $_POST['ubicacion'];
  $fechaDescubrimiento = $_POST['fechaDescubrimiento'];

  // Llama a la función de inserción
  insertarYacimiento($nombreCampo, $ubicacion, $fechaDescubrimiento);
}

// READ
// Obtener la conexión utilizando el método estático de la clase
$conexion = Cconexion::ConexionBD();

if ($conexion) {
  $sql = "EXEC sp_GetYacimiento";
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
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>
    PetroCaSa
  </title>
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

<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0"
    style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <?php include '../elements/aside.php'; ?>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">¡Agregar un nuevo Pozo!</p>
                <!-- <button class="btn btn-primary btn-sm ms-auto" onclick="guardarPerfil()">Guardar</button> -->
              </div>
            </div>
            <div class="card-body">
              <form id="frmAgrega" class="row" method="post" action="Yacimiento.php" onsubmit="return guardarPerfil()">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nombreCampo" class="form-control-label">Nombre del Yacimiento:</label>
                    <input class="form-control" type="text" name="nombreCampo" id="nombreCampo">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ubicacion" class="form-control-label">Ubicación:</label>
                    <input class="form-control" type="text" name="ubicacion" id="ubicacion">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fechaDes" class="form-control-label">Fecha de descubrimiento:</label>
                    <input class="form-control" type="date" name="fechaDescubrimiento" id="fechaDes">
                  </div>
                </div>
                <!-- <div class="boton">
                  <input class="btn btn-primary btn-sm ms-auto" onclick="guardarPerfil()" type="submit" name="submit"
                    value="Agregar">
                </div> -->
                <!-- ... Otros elementos HTML ... -->
                <script>
                  function guardarPerfil() {
                    // Obtiene valores de los campos
                    var nombreCampo = document.getElementById("nombreCampo").value;
                    var ubicacion = document.getElementById("ubicacion").value;
                    var fechaDes = document.getElementById("fechaDes").value;

                    // Verifica si los campos están vacíos
                    if (nombreCampo === "" || ubicacion === "" || fechaDes === "") {
                      alert("Por favor, complete todos los campos antes de guardar.");
                      return false; // Evita que el formulario se envíe si hay campos vacíos
                    } else {
                      return true; // Permite que el formulario se envíe si todos los campos están llenos
                    }
                  }
                </script>
                <div class="boton">
                  <input class="btn btn-primary btn-sm ms-auto" type="submit" name="submit"
                    value="Agregar">
                </div>
              </form>
              <!-- ------ -->
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

  </div>
  </div>
  <?php include '../elements/dependencias.php'; ?>
</body>

</html>
<?php
$conexion = null; // Cierra la conexión al final del script
?>