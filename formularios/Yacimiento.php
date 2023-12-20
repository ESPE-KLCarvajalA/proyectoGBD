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

<?php include('../elements/head.php'); ?>

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
                  <p class="mb-0">¡Agregar un nuevo Yacimiento!</p>
                  <button class="btn btn-primary btn-sm ms-auto">
                    <a href="../pages/tabla.php">Regresar</a></button>
                </div>
              </div>
              <div class="card-body">
                <form id="frmAgrega" class="row" method="post" action="Yacimiento.php"
                  onsubmit="return guardarPerfil()">
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
                  <div class="boton">
                    <input class="btn btn-primary btn-sm ms-auto" type="submit" name="submit" value="Agregar">
                  </div>
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
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include '../elements/footer.php'; ?>
    </main>
  </div>
  <?php include '../elements/dependencias.php'; ?>
</body>

</html>
<?php
$conexion = null; // Cierra la conexión al final del script
?>