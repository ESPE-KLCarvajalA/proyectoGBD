<?php
include_once '../crud/insertar.php'; // Ajusta la ruta según tu estructura de archivos

// CREATE
if (isset($_POST['submit'])) {
  $idCampo = $_POST['idCampo'];
  $nombre = $_POST['nombre'];
  $profundidad = $_POST['profundidad'];
  $estado = $_POST['estado'];

  // Llama a la función de inserción
  insertarPozo($idCampo, $nombre, $profundidad, $estado);
}

// READ
// Obtener la conexión utilizando el método estático de la clase
$conexion = Cconexion::ConexionBD();

if ($conexion) {
  $sql = "EXEC sp_GetPozo";
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
  <link rel="icon" type="image/png" href="../assets/img/logo/logo_2.png">
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
  <div class="main-content position-relative max-height-vh-100 h-100">
    <?php include '../elements/navbar.php'; ?>
    <main class="main-content position-relative border-radius-lg ">
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <p class="mb-0">¡Agregar un nuevo Pozo!</p>
                  <button class="btn btn-primary btn-sm ms-auto">
                    <a href="../pages/tabla.php">Regresar</a></button>
                </div>
              </div>
              <div class="card-body">
                <form id="frmAgrega" class="row" method="post" action="Pozo.php" onsubmit="return guardarPerfil()">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="idCampo" class="form-control-label">ID del Yacimiento:</label>
                      <input class="form-control" type="text" name="idCampo" id="idCampo">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre" class="form-control-label">Nombre del Pozo:</label>
                      <input class="form-control" type="text" name="nombre" id="nombre">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="profundidad" class="form-control-label">Profundidad:</label>
                      <input class="form-control" type="number" step="any" name="profundidad" id="profundidad">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="estado" class="form-control-label">Estado:</label>
                      <select class="form-control" name="estado" id="estado">
                        <option value="A">Activo</option>
                        <option value="I">Inactivo</option>
                      </select>
                    </div>
                  </div>
                  <div class="boton">
                    <input class="btn btn-primary btn-sm ms-auto" type="submit" name="submit" value="Agregar">
                  </div>
                  <script>
                    function guardarPerfil() {
                      // Obtiene valores de los campos
                      var idCampo = document.getElementById("idCampo").value;
                      var nombre = document.getElementById("nombre").value;
                      var profundidad = document.getElementById("profundidad").value;
                      var estado = document.getElementById("estado").value;

                      // Verifica si los campos están vacíos
                      if (idCampo === "" || nombre === "" || profundidad === "" || estado === "") {
                        alert("Por favor, complete todos los campos antes de guardar.");
                        return false; // Evita que el formulario se envíe si hay campos vacíos
                      } else {
                        // Verifica si la profundidad es un número y no es negativa
                        if (isNaN(profundidad) || profundidad < 0) {
                          alert("La profundidad debe ser un número válido y no puede ser negativa.");
                          return false; // Evita que el formulario se envíe si la profundidad no es válida
                        }

                        // Aquí puedes agregar más validaciones según sea necesario

                        return true; // Permite que el formulario se envíe si todos los campos están llenos y la profundidad es válida
                      }
                    }
                  </script>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('../elements/footer.php'); ?>
    </main>
  </div>
  <?php include '../elements/dependencias.php'; ?>
</body>

</html>
<?php
$conexion = null; // Cierra la conexión al final del script
?>