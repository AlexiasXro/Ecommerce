<?php
// Inicia la sesión
session_start();

require_once('c://xampp/htdocs/ecommerce/Controlador/OrdenController.php');

// Asegúrate de tener el ID de la orden que deseas eliminar
if (isset($_GET['id'])) {
    $idOrden = $_GET['id'];
    // Verifica si $idOrden es un número entero válido
    if (!is_numeric($idOrden) || $idOrden <= 0) {
        echo "ID de orden no válido.";
        exit();
    }
} else {
    echo "ID de orden no proporcionado.";
    exit();
}

// Crea una instancia del controlador de orden
$ordenController = new OrdenCon();

// Elimina la orden
$eliminacionExitosa = $ordenController->eliminarOrden($idOrden);

if ($eliminacionExitosa) {
    // Orden eliminada exitosamente
    $_SESSION['mensaje'] = 'Orden eliminada exitosamente.';
} else {
    // Error al eliminar la orden
    $_SESSION['mensaje'] = 'Error al eliminar la orden.';
}

// Redirige a la página principal
header("Location: index.php");
exit();
?>
