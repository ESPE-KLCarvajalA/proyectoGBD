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
                                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                            href="../pages/inicio.php">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Campos Petroleros</li>
                                </ol>
                                <h6 class="font-weight-bolder text-white mb-0">Campos Petroleros</h6>
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
                    <div class="main-content position-relative max-height-vh-100 h-100">
                        <div class="container-fluid py-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0">¡Agregar un nuevo Pozo!</p>
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
                                                        var nombreCampo = document.getElementById("idCampo").value;
                                                        var ubicacion = document.getElementById("nombre").value;
                                                        var profundidad = document.getElementById("profundidad").value;
                                                        var estado = document.getElementById("estado").value;

                                                        if (idCampo === "" || nombre === "" || profundidad === "" || estado === "") {
                                                            alert("Por favor, complete todos los campos antes de guardar.");
                                                            return false; // Evita que el formulario se envíe si hay campos vacíos
                                                        } else {
                                                            // Verifica si la profundidad es un número
                                                            if (isNaN(profundidad)) {
                                                                alert("La profundidad debe ser un número válido.");
                                                                return false; // Evita que el formulario se envíe si la profundidad no es un número
                                                            }
                                                            return true; // Permite que el formulario se envíe si todos los campos están llenos y la profundidad es un número
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