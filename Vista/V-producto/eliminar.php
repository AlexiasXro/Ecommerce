<?php
require_once '../../Controlador/productoCon.php';

// Verificar si se ha proporcionado un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idProductoAEliminar = $_GET['id'];

    // Crear una instancia del controlador
    $productoController = new ProductoController();

    // Llamada al método eliminarProducto del controlador
    $resultado = $productoController->eliminarP($idProductoAEliminar);

    // Mostrar el mensaje según el resultado
    echo '<div class="alert ' . ($resultado === true ? 'alert-success' : 'alert-danger') . '" role="alert">';
    echo $resultado;
    echo '</div>';

    if ($resultado === true) {
        // Redireccionar, según sea necesario
        header("Location: listaproductos.php");
        exit();
    }
} else {
    // Mostrar un mensaje de error si no se proporciona un ID válido
    echo '<div class="alert alert-danger" role="alert">ID de producto no válido.</div>';
}

?>
