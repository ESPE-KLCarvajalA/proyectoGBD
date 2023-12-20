<?php
// tabla.php

include_once '../formularios/Conexion.php';

// Obtener la conexión utilizando el método estático de la clase
$conexion = Cconexion::ConexionBD();

// Inicializar variables de búsqueda
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

if ($conexion) {
    // Obtener datos de Pozo
    $sqlPozo = "exec sp_GetPozoBusqueda @searchTerm = '{$searchTerm}'";
    $resultPozo = $conexion->query($sqlPozo);
} else {
    echo "Error al establecer la conexión a la base de datos.";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../elements/head.php'); ?>
<style>
    .table-container {
        max-height: 200px;
        overflow-y: auto;
    }
</style>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <?php include '../elements/aside.php'; ?>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <?php include '../elements/navbar.php'; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <!-- Formulario de búsqueda -->
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="get" class="form-inline">
                        <input type="text" name="search" class="form-control" placeholder="Buscar...">
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                    </form>
                </div>
            </div>

            <!-- TABLA POZO -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Registro de Pozos!</p>
                            </div>
                        </div>
                        <br>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0 table-container">
                                <table class="table align-items-center mb-0">
                                    <!-- Encabezado de la tabla -->
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nombre Pozo</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Profundidad</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Estado</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Yacimiento</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Trabajador</th>
                                            <!-- ... otras columnas si es necesario -->
                                        </tr>
                                    </thead>
                                    <!-- Cuerpo de la tabla -->
                                    <tbody>
                                        <?php
                                        while ($filaPozo = $resultPozo->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td class='text-center text-xs'>{$filaPozo['id_pozo_pk']}</td>";
                                            echo "<td class='text-center text-xs'>{$filaPozo['nombre_pozo']}</td>";
                                            echo "<td class='text-center text-xs'>{$filaPozo['profundidad']}</td>";
                                            echo "<td class='text-center text-xs'>{$filaPozo['estado']}</td>";
                                            echo "<td class='text-center text-xs'>{$filaPozo['nombre_yacimiento']}</td>";
                                            echo "<td class='text-center text-xs'>{$filaPozo['nombre_trabajador']}</td>";
                                            // ... otras columnas si es necesario
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
        </div>

        <?php include '../elements/footer.php'; ?>
    </main>
    <?php include '../elements/dependencias.php'; ?>
</body>
</html>
