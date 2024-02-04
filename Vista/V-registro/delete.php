<?php
// Inicia la sesión
session_start();

require_once('<link rel="stylesheet" href="./ecommerce/Vista/includes/public/style.css">');

// Asegúrate de tener el ID del usuario que deseas eliminar
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    // Verifica si $idUsuario es un número entero válido
    if (!is_numeric($idUsuario) || $idUsuario <= 0) {
        echo "ID de usuario no válido.";
        exit();
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit();
}

// Crea una instancia del controlador de usuario
$usuarioController = new UsuarioController();

// Elimina el usuario
$eliminacionExitosa = $usuarioController->eliminarUsuario($idUsuario);

if ($eliminacionExitosa) {
    // Usuario eliminado exitosamente
    $_SESSION['mensaje'] = 'Usuario eliminado exitosamente.';
} else {
    // Error al eliminar el usuario
    $_SESSION['mensaje'] = 'Error al eliminar el usuario.';
}

// Redirige a la página principal
header("Location: index.php");
exit();
?>