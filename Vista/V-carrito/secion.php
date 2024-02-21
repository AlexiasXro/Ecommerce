<?php
session_start();

// Agregar un producto al carrito
if(isset($_POST['agregar'])) {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    
    // Crear o actualizar el carrito en la sesión
    if(!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    
    $_SESSION['carrito'][$producto] = $cantidad;
}

// Eliminar un producto del carrito
if(isset($_GET['eliminar'])) {
    $producto = $_GET['eliminar'];
    unset($_SESSION['carrito'][$producto]);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras con Secciones</title>
</head>
<body>
    <h1>Carrito de Compras con Secciones</h1>
    
    <!-- Formulario para agregar productos -->
    <form action="" method="post">
        <label for="producto">Producto:</label>
        <select name="producto" id="producto">
            <option value="frutas">Frutas</option>
            <option value="verduras">Verduras</option>
            <option value="carnes">Carnes</option>
        </select>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" value="1" min="1">
        <button type="submit" name="agregar">Agregar al Carrito</button>
    </form>
    
    <!-- Mostrar el contenido del carrito -->
    <h2>Carrito de Compras</h2>
    <?php
    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        foreach($_SESSION['carrito'] as $producto => $cantidad) {
            echo "<p>$cantidad x $producto <a href='?eliminar=$producto'>Eliminar</a></p>";
        }
    } else {
        echo "<p>El carrito está vacío</p>";
    }
    ?>
</body>
</html>
