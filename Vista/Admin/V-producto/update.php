<?php
// Incluye el encabezado y el menú
require_once('c://xampp/htdocs/ecommerce/Vista/Admin/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/productoCon.php');

// Asegúrate de tener el ID del Producto que deseas editar
if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];
    if (!is_numeric($idProducto) || $idProducto <= 0) {
        echo "ID de producto no válido.";
        exit();
    }
} else {
    echo "ID de producto no proporcionado.";
    exit();
}

$productoCon = new ProductoCon();
$detallesProducto = $productoCon->mostrarDetallesProducto($idProducto);


// Verifica si se obtuvieron los detalles
if ($detallesProducto !== false) {
    // Verifica si se envió un formulario de actualización
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene los nuevos datos desde el formulario
        $nuevosDatos = [
            'nombre' => $_POST["nombre"],
            'descripcion' => $_POST["descripcion"],
            'precio' => $_POST["precio"],
            'foto' => $_POST["foto"],
            'stock' => $_POST["stock"],
            'talle' => $_POST["talle"],
            'color' => $_POST["color"],
        ];

        // Llama al método del controlador para editar el Producto
        $actualizacionExitosa = $ProductoCon->editarProducto($idProducto, $nuevosDatos);

        if ($actualizacionExitosa) {
        echo "<script>alert('Producto actualizado exitosamente.');</script>";
        header("Location: show.php?id=" . $idProducto);
        exit(); 
    } else {
        echo "<script>alert('Error al actualizar los datos.');</script>";
    }
}
}
?>
