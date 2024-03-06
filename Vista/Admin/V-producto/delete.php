<?php

require_once('c://xampp/htdocs/ecommerce/Vista/Admin/includes/header.php');;


if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];

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
    echo '<div class="alert alert-danger" role="alert">Producto eliminado exitosamente.</div>';
} else {
    echo '<div class="alert alert-danger" role="alert">Error al eliminar el Producto.</div>';
}
header("Location: index.php");
exit();
?>