<?php

require_once('c://xampp/htdocs/ecommerce/Controlador/productoCon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $imagen_url = $_POST['imagen_url'];
    $stock = $_POST['stock'];

    // Crear un array con los datos
    $datosProducto = [
        'nombre' => $nombre,
        'precio' => $precio,
        'descripcion' => $descripcion,
        'imagen_url' => $imagen_url,
        'stock' => ($stock != null) ? $stock : 0,
        // Agrega otros campos según sea necesario
    ];

    // Crear una instancia del controlador y registrar el nuevo producto
    $productoCon = new ProductoCon();
    $productoCon->registrarNuevoProducto($datosProducto);
}
?>
