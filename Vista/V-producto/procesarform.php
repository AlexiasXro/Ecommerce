<?php
// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once '../Modelo/productoMod.php';

    // Recuperamos los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen_url = $_POST['imagen_url'];
    $stock = $_POST['stock'];
    $fecha_creacion = $_POST['fecha_creacion'];

    // Creamos una instancia de Producto y configuramos los valores
    $nuevoProducto = new Producto();
    $nuevoProducto->setNombre($nombre);
    $nuevoProducto->setDescripcion($descripcion);
    $nuevoProducto->setPrecio($precio);
    $nuevoProducto->setImagenUrl($imagen_url);
    $nuevoProducto->setStock($stock);
    $nuevoProducto->setFechaCreacion($fecha_creacion);

    // Llamamos al método insertarDatos para agregar el nuevo producto a la base de datos
    $resultado = $nuevoProducto->insertarDatos();

    // Verificamos el resultado
    if ($resultado === true) {
        echo "Producto agregado exitosamente.";
    } else {
        echo "Error al agregar el producto: " . $resultado;
    }
} else {
    // Si no se ha enviado el formulario, redirigimos al formulario
    header("Location: nuevoProducto.php");
    exit();
}
?>

