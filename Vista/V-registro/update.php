<?php
// Incluye el encabezado y el menú
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');

// Asegúrate de tener el ID del usuario que deseas editar
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

// Obtiene los detalles del usuario por ID
$detallesUsuario = $usuarioController->mostrarDetallesUsuario($idUsuario);

// Verifica si se obtuvieron los detalles del usuario
if ($detallesUsuario !== false) {
    // Verifica si se envió un formulario de actualización
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene los nuevos datos desde el formulario
        $nuevosDatos = [
            'nombre' => $_POST["nombre"],
            'email' => $_POST["email"],
            'contrasena' => $_POST["contrasena"],
            'direccion' => $_POST["direccion"],
            'provincia' => $_POST["provincia"],
            'postal' => $_POST["postal"],
            'telefono' => $_POST["telefono"],
            
        ];

        // Llama al método del controlador para editar el usuario
        $actualizacionExitosa = $usuarioController->editarUsuario($idUsuario, $nuevosDatos);

        if ($actualizacionExitosa) {
            header("Location: show.php?id=" . $idUsuario);
            exit(); // Asegura que el script se detenga después de la redirección
        } else {
            echo "Error al actualizar los datos. Detalles: No hay detalles disponibles.";
        }
    }
}
?>
