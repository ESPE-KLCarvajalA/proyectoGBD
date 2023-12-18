<?php
include_once '../formularios/Conexion.php';

//proceso_editar_pozo.php
// Verifica si se ha enviado un formulario válido
if (isset($_POST['submit'])) {
    // Obtener datos del formulario
    $idPozo = $_POST['idPozo'];
    $idCampo = $_POST['idCampo'];
    $nombre = $_POST['nombre'];
    $profundidad = $_POST['profundidad'];
    $estado = $_POST['estado'];

    // Obtén la conexión utilizando el método estático de la clase
    $conexion = Cconexion::ConexionBD();

    if ($conexion) {
        // Preparar la llamada al procedimiento almacenado de actualización
        $sql = "EXEC sp_UpdatePozo @IdPozo=?, @IdCampo=?, @Nombre=?, @Profundidad=?, @Estado=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $idPozo, PDO::PARAM_INT);
        $stmt->bindParam(2, $idCampo, PDO::PARAM_INT);
        $stmt->bindParam(3, $nombre, PDO::PARAM_STR);
        $profundidadStr = strval($profundidad);
        $stmt->bindParam(4, $profundidadStr, PDO::PARAM_STR);
        $stmt->bindParam(5, $estado, PDO::PARAM_STR);
        $stmt->execute();

        echo "Pozo actualizado correctamente.";

        // Puedes redirigir al usuario a la página de la tabla o a donde prefieras
        header("Location: ../pages/tabla.php");
    } else {
        echo "Error al establecer la conexión a la base de datos.";
    }
} else {
    echo "Formulario no válido.";
}
?>
