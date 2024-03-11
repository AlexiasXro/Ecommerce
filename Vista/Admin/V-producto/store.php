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

    // Manejar la carga de la imagen
    $ruta_imagen = null;
    if (isset($_FILES['imagen'])) {
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $nombre_imagen = $_FILES['imagen']['name'];
        $ruta_imagen = __DIR__ . '/ecommerce/Vista/User/assets/img/producto-img/' . $nombre_imagen; // Ruta donde deseas guardar las imágenes
        
        error_log("Guardando Imagenes tmp: " . $imagen_tmp . "\n");
        error_log("Guardando Imagenes image: " . $nombre_imagen . "\n");

        // Mover la imagen a la ubicación deseada
        if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
            error_log("La imagen se ha guardado correctamente.\n");
        } else {
            error_log("Error al guardar la imagen.\n");
        }
    } else {
        error_log( "No se recibió ninguna imagen.\n");
    }

    // Crear un array con los datos
    $datosProducto = [
        'nombre' => $nombre,
        'precio' => $precio,
        'descripcion' => $descripcion,
        'stock' => $stock,
        'talle' => $talle,
        'color' => $color,
        'foto' => $ruta_imagen,
        
    ];

    $productoCon = new ProductoCon();
    $productoCon->registrarNuevoProducto($datosProducto);
}
?>
