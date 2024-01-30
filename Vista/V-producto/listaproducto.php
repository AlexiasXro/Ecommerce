<?php
require_once '../../Controlador/productoCon.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/includes/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/includes/menu.php';

$productoController = new ProductoController();

// Inicializar la variable $productos
$productos = [];

// Verificar si se ha enviado el formulario de búsqueda
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre_busqueda'])) {
    // Obtener el nombre de búsqueda desde el formulario
    $nombreBusqueda = isset($_POST['nombre_busqueda']) ? htmlspecialchars($_POST['nombre_busqueda']) : '';

    // Realizar la búsqueda
    $productos = $productoController->buscarPNom($nombreBusqueda);
} else {
    // Si no se ha enviado el formulario, obtener todos los productos
    $productos = $productoController->listarProductos();
}


?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #bfbdbd;
            margin: 0;
            display: flex;
        }

        .contenedor-vacio {
            width: 200px;
            height: 100vh;

        }

        .contenedor-resto {
            flex: 1;
            padding: 10px;


        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #050505;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #685d26;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>

<body>
    <div class="contenedor-vacio">

    </div>
    <div class="contenedor-resto">
        <h1>Lista de Productos</h1>

        <form action="" method="post">
            <label for="nombre_busqueda">Buscar por Nombre:</label>
            <input type="text" name="nombre_busqueda" id="nombre_busqueda" required>
            <button type="submit">Buscar</button>
            <a href="../V-producto/nuevoProducto.php" class="btn-2">Nuevo Producto</a>
        </form>
        

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    
                    <th>Stock</th>
                    <th>Fecha-creado</th>
                    <th>Imagen</th>
                    <th>ACCION</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
// Resto de tu código para mostrar los productos en la vista

// Verificar si hay productos y si $productos es un array
if (!empty($productos) && is_array($productos)) {
    foreach ($productos as $producto) :
?>
        <tr>
            <td><?= isset($producto['id_producto']) ? $producto['id_producto'] : 'N/A' ?></td>
            <td><?= isset($producto['nombre']) ? $producto['nombre'] : 'N/A' ?></td>
            <td><?= isset($producto['descripcion']) ? $producto['descripcion'] : 'N/A' ?></td>
            <td><?= isset($producto['precio']) ? $producto['precio'] : 'N/A' ?></td>
            <td><?= isset($producto['stock']) ? $producto['stock'] : 'N/A' ?></td>
            <td><?= isset($producto['fecha_creacion']) ? $producto['fecha_creacion'] : 'N/A' ?></td>
            <td><?= isset($producto['imagen_url']) ? $producto['imagen_url'] : 'N/A' ?></td>
            <td>
                <a href="eliminar.php?id=<?= $producto['id_producto'] ?>&req=delete" class="btn-1">Eliminar</a>
                <a href="editar.php?id=<?= $producto['id_producto'] ?>" class="btn-2">Editar</a>
            </td>
        </tr>
<?php
    endforeach;
} else {
    // Mostrar un mensaje si no hay productos
    echo '<tr><td colspan="8">No se encontraron productos.</td></tr>';
}

// Mostrar mensajes según la URL
if (isset($_GET['mensaje'])) {
    $mensaje = htmlspecialchars($_GET['mensaje']);
    $tipoMensaje = isset($_GET['tipo']) ? $_GET['tipo'] : 'info'; // Por defecto, se asume un mensaje informativo

    // Agregar clases de alerta de Bootstrap según el tipo de mensaje
    $clasesAlerta = 'alert alert-' . ($tipoMensaje === 'error' ? 'danger' : ($tipoMensaje === 'success' ? 'success' : 'info'));

    echo "<p class=\"$clasesAlerta\">Mensaje: $mensaje</p>";
}
?>
            </tbody>
        </table>
        
    </div>
</body>

</html>