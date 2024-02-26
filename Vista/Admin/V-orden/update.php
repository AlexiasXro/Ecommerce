<?php
// Asegúrate de tener el ID de la orden que deseas editar
if (isset($_GET['id'])) {
    $idOrden = $_GET['id'];
    if (!is_numeric($idOrden) || $idOrden <= 0) {
        echo "ID de orden no válido.";
        exit();
    }
} else {
    echo "ID de orden no proporcionado.";
    exit();
}

// Verifica si se envió un formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los nuevos datos desde el formulario
    $nuevosDatos = [
        'id_usuario' => $_POST["id_usuario"],
        'id_producto' => $_POST["id_producto"],
        'estado' => $_POST["estado"],
        // Agrega otros campos según sea necesario
    ];

    // Crear una instancia del controlador de órdenes
    $ordenController = new OrdenCon();

    // Llama al método del controlador para editar la orden
    $actualizacionExitosa = $ordenController->editarOrden($idOrden, $nuevosDatos);

    if ($actualizacionExitosa) {
        // Establece un mensaje de éxito 
        $_SESSION['mensaje'] = 'Orden actualizada exitosamente.';
        header("Location: show.php?id=" . $idOrden);
        exit(); 
    } else {
        // Establece un mensaje de error
        $_SESSION['mensaje'] = 'Error al actualizar la orden.';
    }
}
?>

