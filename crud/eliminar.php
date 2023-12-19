<?php
include_once '../formularios/Conexion.php';

function eliminarYacimiento($idCampo)
{
    // Obtener la conexión utilizando el método estático de la clase
    $conexion = Cconexion::ConexionBD();

    // Verificar si la conexión es válida antes de realizar la consulta
    if ($conexion) {
        try {
            // Preparar la llamada al procedimiento almacenado
            $sql = "EXEC sp_DeleteYacimiento @IdCampo=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $idCampo, PDO::PARAM_INT);

            // Ejecutar el procedimiento almacenado
            $stmt->execute();

            // Verificar si se afectaron filas (si se eliminó algún registro)
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                echo "<script>
                        alert('Registro eliminado correctamente.');
                        window.location.href = '../pages/tabla.php'; // Redirige a la misma página
                      </script>";
            } else {
                echo "<script>
                        alert('No se encontró el registro para eliminar.');
                        window.location.href = '../pages/tabla.php'; // Redirige a la misma página
                      </script>";
            }
        } catch (PDOException $e) {
            echo "<script>
                    alert('Error al ejecutar la consulta: " . $e->getMessage() . "');
                    window.location.href = '../pages/tabla.php'; // Redirige a la misma página
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error al establecer la conexión a la base de datos.');
                window.location.href = '../pages/tabla.php'; // Redirige a la misma página
              </script>";
    }
}

// Uso de la función de eliminación
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idCampo = $_GET['id'];
    eliminarYacimiento($idCampo);
}

function eliminarPozo($idPozo)
{
    // Obtener la conexión utilizando el método estático de la clase
    $conexion = Cconexion::ConexionBD();

    // Verificar si la conexión es válida antes de realizar la consulta
    if ($conexion) {
        try {
            // Preparar la llamada al procedimiento almacenado
            $sql = "EXEC sp_DeletePozo @IdPozo=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $idPozo, PDO::PARAM_INT);

            // Ejecutar el procedimiento almacenado
            $stmt->execute();

            // Verificar si se afectaron filas (si se eliminó algún registro)
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                echo "<script>
                        alert('Registro de pozo eliminado correctamente.');
                        window.location.href = '../pages/tabla.php'; // Redirige a la misma página
                      </script>";
            } else {
                echo "<script>
                        alert('No se encontró el registro de pozo para eliminar.');
                        window.location.href = '../pages/tabla.php'; // Redirige a la misma página
                      </script>";
            }
        } catch (PDOException $e) {
            echo "<script>
                    alert('Error al ejecutar la consulta: " . $e->getMessage() . "');
                    window.location.href = '../pages/tabla.php'; // Redirige a la misma página
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error al establecer la conexión a la base de datos.');
                window.location.href = '../pages/tabla.php'; // Redirige a la misma página
              </script>";
    }
}

function eliminarTrabajador($idTrabajador)
{
    $conexion = Cconexion::ConexionBD();

    if ($conexion) {
        try {
            $sql = "EXEC sp_DeleteTrabajador @IdTrabajador=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $idTrabajador, PDO::PARAM_INT);
            $stmt->execute();

            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                echo "<script>
                        alert('Registro de trabajador eliminado correctamente.');
                        window.location.href = '../pages/tabla.php';
                      </script>";
            } else {
                echo "<script>
                        alert('No se encontró el registro de trabajador para eliminar.');
                        window.location.href = '../pages/tabla.php';
                      </script>";
            }
        } catch (PDOException $e) {
            echo "<script>
                    alert('Error al ejecutar la consulta: " . $e->getMessage() . "');
                    window.location.href = '../pages/tabla.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error al establecer la conexión a la base de datos.');
                window.location.href = '../pages/tabla.php';
              </script>";
    }
}


if (isset($_GET['idTrabajador']) && is_numeric($_GET['idTrabajador'])) {
    $idTrabajador = $_GET['idTrabajador'];
    eliminarTrabajador($idTrabajador);
}


// Uso de la función de eliminación de Yacimiento
if (isset($_GET['idYacimiento']) && is_numeric($_GET['idYacimiento'])) {
    $idYacimiento = $_GET['idYacimiento'];
    eliminarYacimiento($idYacimiento);
}

// Uso de la función de eliminación de Pozo
if (isset($_GET['idPozo']) && is_numeric($_GET['idPozo'])) {
    $idPozo = $_GET['idPozo'];
    eliminarPozo($idPozo);
}


?>