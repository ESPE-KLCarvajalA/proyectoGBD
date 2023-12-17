<?php
include_once '../formularios/Conexion.php';

// Verifica si se ha enviado un formulario válido
if (isset($_POST['submit'])) {
    // Obtener datos del formulario
    $idCampo = $_POST['idCampo'];
    $nombreCampo = $_POST['nombreCampo'];
    $ubicacion = $_POST['ubicacion'];
    $fechaDescubrimiento = $_POST['fechaDescubrimiento'];

    // Obtén la conexión utilizando el método estático de la clase
    $conexion = Cconexion::ConexionBD();

    if ($conexion) {
        // Preparar la llamada al procedimiento almacenado de actualización
        $sql = "EXEC sp_UpdateYacimiento @IdCampo=?, @Nombre_campo=?, @Ubicacion=?, @Fecha_descubrimiento=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $idCampo, PDO::PARAM_INT);
        $stmt->bindParam(2, $nombreCampo, PDO::PARAM_STR);
        $stmt->bindParam(3, $ubicacion, PDO::PARAM_STR);
        $stmt->bindParam(4, $fechaDescubrimiento, PDO::PARAM_STR);
        $stmt->execute();

        echo "Yacimiento actualizado correctamente.";

        // Puedes redirigir al usuario a la página de la tabla o a donde prefieras
        header("Location: ../pages/tabla.php");
    } else {
        echo "Error al establecer la conexión a la base de datos.";
    }
} else {
    echo "Formulario no válido.";
}
?>
