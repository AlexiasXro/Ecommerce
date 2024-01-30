<?php
require_once '../../Controlador/productoCon.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/includes/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/includes/menu.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear una instancia del controlador
    $productoController = new ProductoController();

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen_url = $_POST['imagen_url'];
    $stock = $_POST['stock'];
    $fecha_creacion = date('Y-m-d H:i:s'); // Puedes usar la fecha actual

    // Insertar el nuevo producto
    $resultado = $productoController->insertarP($nombre, $descripcion, $precio, $imagen_url, $stock, $fecha_creacion);

    // Mostrar mensaje al usuario
    echo '<div class="alert ' . ($resultado ? 'alert-success' : 'alert-danger') . '" role="alert">';
    echo $resultado;
    echo '</div>';

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ecommerce/includes/public/style.css">
    <title>Nuevo Producto</title>
</head>
<body>
    <div class="container mt-4">
    <h1>Nuevo Producto</h1>

    <!-- Formulario para ingresar los datos del nuevo producto -->
    <form action="nuevoProducto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" required><br>

        <label for="imagen_url">URL de la Imagen:</label>
        <input type="text" name="imagen_url" required><br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" required><br>

        <!---->

        <input type="submit" value="Guardar">
    </form>
   </div>
</body>
</html>
