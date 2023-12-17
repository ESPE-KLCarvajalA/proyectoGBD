<?php
// InsertarYacimiento.php
include_once('../formularios/Conexion.php');

function insertarYacimiento($nombreCampo, $ubicacion, $fechaDescubrimiento) {
  // Obtener la conexión utilizando el método estático de la clase
  $conexion = Cconexion::ConexionBD();

  // Verificar si la conexión es válida antes de realizar la consulta
  if ($conexion) {
    // Preparar la llamada al procedimiento almacenado
    $sql = "EXEC sp_InsertYacimiento @Nombre_campo=?, @Ubicacion=?, @Fecha_descubrimiento=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(1, $nombreCampo, PDO::PARAM_STR);
    $stmt->bindParam(2, $ubicacion, PDO::PARAM_STR);
    $stmt->bindParam(3, $fechaDescubrimiento, PDO::PARAM_STR);

    // Ejecutar el procedimiento almacenado
    $stmt->execute();
    
    // Puedes obtener el ID del último registro insertado si es necesario
    $nuevoID = $conexion->lastInsertId();

    // Cerrar la conexión
    $conexion = null;

    // Devolver el ID del nuevo registro insertado
    return $nuevoID;
  } else {
    echo "Error al establecer la conexión a la base de datos.";
    return false;
  }
}
?>
