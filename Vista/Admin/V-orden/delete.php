<?php


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
    echo '<div class="alert alert-danger" role="alert">exitosamente.</div>';
    
} else {
    // Error al eliminar la orden
    echo '<div class="alert alert-danger" role="alert">Error.</div>';
}

// Redirige a la página principal
header("Location: index.php");
exit();
?>
