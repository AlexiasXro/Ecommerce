<?php
// Inicia la sesión
session_start();

require_once('c://xampp/htdocs/ecommerce/Controlador/productoCon.php');


if (isset($_GET['id_producto'])) {
    $idProducto = $_GET['id_producto'];

    if (!is_numeric($idProducto) || $idProducto <= 0) {
        echo "ID de Producto no válido.";
        exit();
    }
} else {
    echo "ID de Producto no proporcionado.";
    exit();
}


$productoCon = new ProductoCon();

$eliminacionExitosa = $productoCon->eliminarProducto($idProducto);

if ($eliminacionExitosa) {
    $_SESSION['mensaje'] = 'Producto eliminado exitosamente.';
} else {
    $_SESSION['mensaje'] = 'Error al eliminar el Producto.';
}
header("Location: index.php");
exit();
?>