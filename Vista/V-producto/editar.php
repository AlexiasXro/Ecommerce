<?php
require_once '../../Controlador/productoCon.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/includes/header.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/includes/menu.php';

// Verificar si se proporciona un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idProductoEditar = $_GET['id'];

    // Crear una instancia del controlador
    $productoController = new ProductoController();

    // Obtener datos del producto por su ID
    $datosProducto = $productoController->obtenerPId($idProductoEditar);

    if (empty($datosProducto)) {
        // Si no se encuentra el producto, redirigir o mostrar mensaje de error
        echo "No se encontraron datos para editar el producto.";
        exit();
    }
} else {
    // Si no se proporciona un ID válido, redirigir o mostrar mensaje de error
    echo "ID de producto no válido.";
    exit();
}

// Manejar el formulario enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar_cambios'])) {
    try {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $imagen_url = $_POST['imagen_url'];
        $stock = $_POST['stock'];
        $fecha_creacion = $_POST['fecha_creacion'];

        // Llamada al método actualizar del controlador
        $resultado = $productoController->actualizarProducto($idProductoEditar, $nombre, $descripcion, $precio, $imagen_url, $stock, $fecha_creacion);

        if ($resultado === true) {
            // Redirigir a la página de lista de productos o mostrar un mensaje de éxito
            header("Location: listaProducto.php");
            exit();
        } else {
            // Mostrar un mensaje de error
            echo "Error al intentar actualizar el producto: " . $resultado;
        }
    } catch (Exception $e) {
        // Manejar el error
        echo "Error inesperado: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ecommerce/includes/public/style.css">
    <title>Editar Producto</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Producto</h1>

        <!-- Formulario para ingresar los datos del producto a editar -->
        <form action="editar.php?id=<?php echo $idProductoEditar; ?>" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required value="<?php echo htmlspecialchars($datosProducto['nombre']); ?>"><br>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required><?php echo htmlspecialchars($datosProducto['descripcion']); ?></textarea><br>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" required value="<?php echo htmlspecialchars($datosProducto['precio']); ?>"><br>

            <label for="imagen_url">URL de la Imagen:</label>
            <input type="text" name="imagen_url" required value="<?php echo isset($datosProducto['imagen_url']) ? htmlspecialchars($datosProducto['imagen_url']) : ''; ?>"><br>

            <label for="stock">Stock:</label>
            <input type="number" name="stock" required value="<?php echo htmlspecialchars($datosProducto['stock']); ?>"><br>
            
            <label for="fecha_creacion">Fecha creacion:</label>
            <input type="text" name="fecha_creacion" required value="<?php echo isset($datosProducto['fecha_creacion']) ? htmlspecialchars($datosProducto['fecha_creacion']) : ''; ?>"><br>

            <input type="submit" value="Guardar" name="guardar_cambios">
        </form>
    </div>

</body>
</html>