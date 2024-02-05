<?php
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/productoCon.php');


if (isset($_GET['id_producto'])) {
    $idProducto = $_GET['id_producto'];
} else {
    echo "ID de Producto no proporcionado.";
    exit();
}

$productoCon = new ProductoCon();

$detallesProducto = $productoCon->mostrarDetallesProducto($idProducto);

if ($detallesProducto !== false) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nuevosDatos = [
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'imagen_url' => $imagen_url,
            'stock' => ($stock != null) ? $stock : 0,
        ];

        // Llama al método del controlador para editar el producto
        $actualizado = $productoCon->editarProducto($idProducto, $nuevosDatos);

        if (!$actualizado) {
            echo "Error al actualizar los datos de producto.";
        }
    }
}
?>

<h3>Modificando Producto</h3>
<form action="update.php?id=<?= $idProducto ?>" method="post" autocomplete="off">

    <div class="pd-3">
        <a href="index.php" class="btn btn-primary">Regresar</a>
        <!-- Puedes añadir otros botones según sea necesario -->
    </div>
    <div class="mb-3 row">
    <label for="id" class="col-sm-2 col-form-label">Id</label>
    <div class="col-sm-10">
        <input type="text" name="id" class="form-control" id="id" value="<?= $detallesProducto['id_producto'] ?>" readonly>
    </div>
</div>
    <div class="mb-3 row">
        <label for="nombre" class="col-sm-2 col-form-label">Nuevo Nombre:</label>
        <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $detallesUsuario['nombre'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Nuevo Email:</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="email" value="<?= $detallesUsuario['email'] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="contrasena" class="col-sm-2 col-form-label">Nueva Contraseña:</label>
        <div class="col-sm-10">
            <input type="password" name="contrasena" class="form-control" id="contrasena">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="direccion" class="col-sm-2 col-form-label">Nueva Dirección:</label>
        <div class="col-sm-10">
            <input type="text" name="direccion" class="form-control" id="direccion" value="<?= $detallesUsuario['direccion'] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="provincia" class="col-sm-2 col-form-label">Nueva Provincia:</label>
        <div class="col-sm-10">
            <input type="text" name="provincia" class="form-control" id="provincia" value="<?= $detallesUsuario['provincia'] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="postal" class="col-sm-2 col-form-label">Nuevo Código Postal:</label>
        <div class="col-sm-10">
            <input type="text" name="postal" class="form-control" id="postal" value="<?= $detallesUsuario['postal'] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="telefono" class="col-sm-2 col-form-label">Nuevo Teléfono:</label>
        <div class="col-sm-10">
            <input type="text" name="telefono" class="form-control" id="telefono" value="<?= $detallesUsuario['telefono'] ?>">
        </div>
    </div>
    <!-- Agrega los demás campos aquí -->
    <input type="submit" class="btn btn-success" value="Actualizar">
    <a href="show.php?id=<?= $idUsuario ?>" class="btn btn-danger">Cancelar</a>
</form>

<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>