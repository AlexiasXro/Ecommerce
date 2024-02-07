<?php

require_once('c://xampp/htdocs/ecommerce/Controlador/productoCon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $talle = $_POST['talle'];
    $color = $_POST['color'];
    $imagen_url = $_POST['imagen_url'];

    // Crear un array con los datos
    $datosProducto = [
        'nombre' => $nombre,
        'precio' => $precio,
        'descripcion' => $descripcion,
        'stock' => $stock,
        'talle' => $talle,
        'color' => $color,
        'imagen_url' => $imagen_url,
        
    ];

    $productoCon = new ProductoCon();
    $productoCon->registrarNuevoProducto($datosProducto);
}
?>
