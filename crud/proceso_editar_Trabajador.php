<?php
include_once '../formularios/Conexion.php';

// Verifica si se ha enviado un formulario válido
if (isset($_POST['submit'])) {
    // Obtener datos del formulario
    $idTrabajador = $_POST['idTrabajador'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id_asignacion_fk = $_POST['id_asignacion_fk'];
    $id_tipo_cargo_fk = $_POST['id_tipo_cargo_fk'];
    $fechaContratacion = $_POST['fecha_contratacion'];

    // Obtén la conexión utilizando el método estático de la clase
    $conexion = Cconexion::ConexionBD();

    if ($conexion) {
        // Preparar la llamada al procedimiento almacenado de actualización
        $sql = "EXEC sp_UpdateTrabajador @IdTrabajador=?, @Nombre=?, @Apellido=?, @IdAsignacion=?, @IdTipoCargo=?, @FechaContratacion=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $idTrabajador, PDO::PARAM_INT);
        $stmt->bindParam(2, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(3, $apellido, PDO::PARAM_STR);
        $stmt->bindParam(4, $id_asignacion_fk, PDO::PARAM_INT);
        $stmt->bindParam(5, $id_tipo_cargo_fk, PDO::PARAM_INT);
        $stmt->bindParam(6, $fechaContratacion, PDO::PARAM_STR);
        $stmt->execute();

        echo "Trabajador actualizado correctamente.";

        // Puedes redirigir al usuario a la página de la tabla o a donde prefieras
        header("Location: ../pages/tabla.php");
    } else {
        echo "Error al establecer la conexión a la base de datos.";
    }
} else {
    echo "Formulario no válido.";
}
?>
