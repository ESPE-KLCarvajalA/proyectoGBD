<?php
// autenticar.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado los datos del formulario
    if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
        // Obtener los valores del formulario
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        // Realizar la conexión a la base de datos (asegúrate de tener tu lógica de conexión aquí)
        include_once '../formularios/Conexion.php';
        $conexion = Cconexion::ConexionBD();

        if ($conexion) {
            // Consultar la base de datos para verificar las credenciales
            $sql = "SELECT id_trabajador_fk FROM Usuario WHERE usuario = ? AND contrasena = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $correo, PDO::PARAM_STR);
            $stmt->bindParam(2, $contrasena, PDO::PARAM_STR);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                // Si las credenciales son válidas, puedes redirigir al usuario a la página de inicio o realizar otras acciones necesarias
                header("Location: ../pages/inicio.php");
                exit();
            } else {
                // Si las credenciales son inválidas, puedes redirigir al usuario a la página de inicio de sesión con un mensaje de error
                header("Location: ../pages/acceso.php?error=1");
                exit();
            }
        } else {
            echo "Error al establecer la conexión a la base de datos.";
        }
    } else {
        // Si no se enviaron datos del formulario, puedes redirigir al usuario a la página de inicio de sesión con un mensaje de error
        header("Location: ../pages/acceso.php?error=2");
        exit();
    }
} else {
    // Si se accede a este script de alguna manera diferente a través de POST, puedes redirigir al usuario a la página de inicio de sesión con un mensaje de error
    header("Location: ../pages/acceso.php?error=3");
    exit();
}
?>
