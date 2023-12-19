<?php
//editar_Trabajador.php

include_once '../formularios/Conexion.php';

// Verifica si se ha enviado un ID válido por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idTrabajador = $_GET['id'];

    // Obtén la conexión utilizando el método estático de la clase
    $conexion = Cconexion::ConexionBD();

    if ($conexion) {

        $sql = "SELECT * FROM Trabajador WHERE id_trabajador_pk = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $idTrabajador, PDO::PARAM_INT);
        $stmt->execute();

        $trabajador = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($trabajador) {
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
                                                <p class="mb-0">¡Agregar un nuevo Trabajador!</p>
                                                <button class="btn btn-primary btn-sm ms-auto">
                                                    <a href="../pages/tabla.php">Regresar</a></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form id="frmAgrega" class="row" method="post" action="Trabajador.php"
                                                onsubmit="return guardarPerfil()">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input type="hidden" name="idTrabajador" value="<?= $trabajador['id_trabajador_pk'] ?>">
                                                        <label for="nombre" class="form-control-label">Nombre:</label>
                                                        <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $trabajador['nombre'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="apellido" class="form-control-label">Apellido:</label>
                                                        <input class="form-control" type="text" name="apellido" id="apellido" value="<?= $trabajador['apellido'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tipo_puesto" class="form-control-label">Tipo de Puesto:</label>
                                                        <input class="form-control" type="text" name="tipo_puesto" id="tipo_puesto" value="<?= $trabajador['id_tipo_cargo_fk'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="fecha_contratacion" class="form-control-label">Fecha de
                                                            Contrato:</label>
                                                        <input class="form-control" type="date" name="fecha_contratacion"
                                                            id="fecha_contratacion" value="<?= $trabajador['fecha_contratacion'] ?>">
                                                    </div>
                                                </div>
                                                <div class="boton">
                                                    <input class="btn btn-primary btn-sm ms-auto" type="submit" name="submit"
                                                        value="Agregar">
                                                </div>
                                                <script>
                                                    function guardarPerfil() {
                                                        var nombre = document.getElementById("nombre").value;
                                                        var apellido = document.getElementById("apellido").value;
                                                        var tipo_puesto = document.getElementById("tipo_puesto").value;
                                                        var fecha_contratacion = document.getElementById("fecha_contratacion").value;

                                                        if (nombre === "" || apellido === "" || tipo_puesto === "" || fecha_contratacion === "") {
                                                            alert("Por favor, complete todos los campos antes de guardar.");
                                                            return false;
                                                        } else {
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
                        <?php include('../elements/footer.php'); ?>
                    </main>
                </div>
                <?php include '../elements/dependencias.php'; ?>
            </body>

            </html>
            <?php
        } else {
            echo "No se encontró el trabajador para editar.";
        }
    } else {
        echo "Error al establecer la conexión a la base de datos.";
    }
} else {
    echo "ID no válido.";
}
?>