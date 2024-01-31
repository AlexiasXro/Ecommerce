/DELETE/
//delete
<?php

require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');

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
$eliminacionExitosa = $usuarioController->eliminarUsuario($idUsuario);

if ($eliminacionExitosa) {
    header("Location: index.php");
    exit();
} else {
    echo "Error al eliminar el usuario.";
    exit();
}



?>