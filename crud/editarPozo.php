<?php
//editarPozo.php

include_once '../formularios/Conexion.php';

// Verifica si se ha enviado un ID válido por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idPozo = $_GET['id'];

    // Obtén la conexión utilizando el método estático de la clase
    $conexion = Cconexion::ConexionBD();

    if ($conexion) {

        $sql = "SELECT * FROM Pozo WHERE id_pozo_pk = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $idPozo, PDO::PARAM_INT);
        $stmt->execute();

        $pozo = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pozo) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <?php include '../elements/head.php';?>
            <body class="g-sidenav-show   bg-gray-100">
                <div class="min-height-300 bg-primary position-absolute w-100"></div>
                <?php include '../elements/aside.php'; ?>
                <main class="main-content position-relative border-radius-lg ">
                    <!-- Navbar -->
                    <?php include('../elements/navbar.php'); ?>
                    <!-- End Navbar -->
                    <div class="main-content position-relative max-height-vh-100 h-100">
                        <div class="container-fluid py-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0">¡Actualizar Datos del Pozo!</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form id="frmAgrega" class="row" method="post" action="proceso_editar_Pozo.php"
                                                onsubmit="return guardarPerfil()">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input type="hidden" name="idPozo" value="<?= $pozo['id_pozo_pk'] ?>">
                                                        <label for="idCampo" class="form-control-label">ID del Yacimiento:</label>
                                                        <input class="form-control" type="text" name="idCampo" id="idCampo" value="<?= $pozo['id_campo_fk'] ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nombre" class="form-control-label">Nombre del Pozo:</label>
                                                        <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $pozo['nombre'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="profundidad" class="form-control-label">Profundidad:</label>
                                                        <input class="form-control" type="number" step="any" name="profundidad" value="<?= $pozo['profundidad'] ?>"
                                                            id="profundidad">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="estado" class="form-control-label">Estado:</label>
                                                        <select class="form-control" name="estado" id="estado" value="<?= $pozo['estado'] ?>">
                                                            <option value="A">Activo</option>
                                                            <option value="I">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="boton">
                                                    <input class="btn btn-primary btn-sm ms-auto" onclick="guardarPerfil()"  href="../pages/tabla.php"
                                                        type="submit" name="submit" value="Actualizar">
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
                                                            // Verifica si el nombre contiene números
                                                            if (/\d/.test(nombre)) {
                                                                alert("El nombre no debe contener números.");
                                                                return false;
                                                            }
                                                            return true; 
                                                        }
                                                    }
                                                </script>

                                            </form>
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
        } else {
            echo "No se encontró el pozo para editar.";
        }
    } else {
        echo "Error al establecer la conexión a la base de datos.";
    }
} else {
    echo "ID no válido.";
}
?>