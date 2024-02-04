<?php
// Incluye el encabezado y el menú
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');

// Asegúrate de tener el ID del usuario que deseas editar
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    if (!is_numeric($idUsuario) || $idUsuario <= 0) {
        echo "ID de usuario no válido.";
        exit();
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit();
}

$usuarioController = new UsuarioController();
$detallesUsuario = $usuarioController->mostrarDetallesUsuario($idUsuario);


// Verifica si se obtuvieron los detalles del usuario
if ($detallesUsuario !== false) {
    // Verifica si se envió un formulario de actualización
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene los nuevos datos desde el formulario
        $nuevosDatos = [
            'nombre' => $_POST["nombre"],
            'email' => $_POST["email"],
            'direccion' => $_POST["direccion"],
            'provincia' => $_POST["provincia"],
            'postal' => $_POST["postal"],
            'telefono' => $_POST["telefono"],
            
        ];

        // Llama al método del controlador para editar el usuario
        $actualizacionExitosa = $usuarioController->editarUsuario($idUsuario, $nuevosDatos);

        if ($actualizacionExitosa) {
        // Establece un mensaje de éxito 
        $_SESSION['mensaje'] = 'Usuario actualizado exitosamente.';
        header("Location: show.php?id=" . $idUsuario);
        exit(); 
    } else {
        // Establece un mensaje de error
        $_SESSION['mensaje'] = 'Error al actualizar los datos.';
    }
}
}
?>
