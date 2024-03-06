<?php
require_once('c://xampp/htdocs/ecommerce/Vista/Admin/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/productoCon.php');


if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];
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
            'foto' => $foto, //relación de aspecto común es 4:3 o 3:2,IMAGEN
            'stock' => ($stock != null) ? $stock : 0,
            'talle' => $talle,
            'color' => $color,
        ];

        // Llama al método del controlador para editar el producto
        $actualizado = $productoCon->editarProducto($idProducto, $nuevosDatos);

        if (!$actualizado) {
            echo '<div class="alert alert-danger" role="alert">Error al actualizar los datos de producto.</div>';
        }
    }
}
?>


<div class="container border p-1 mb-1">
    <h3>Modificando Producto</h3>
</div>

<div class="container border p-4">
    <form action="update.php?id=<?= $idProducto ?>" method="post" autocomplete="off">

        <div class="pd-3">
            <a href="index.php" class="btn btn-primary">Regresar</a>

            <!-- otros botones -->
            <hr>
        </div>
        <div class="mb-3">
    <label for="nombre" class="form-label">Nombre del producto</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required>
</div>
<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="text" name="precio" class="form-control" id="precio" step="0.01" pattern="[0-9]+([,\.][0-9]+)?" aria-describedby="precioHelp" required>
    </div>
    <div id="precioHelp" class="form-text">Ingresa el precio en formato decimal, por ejemplo: 10.50</div>
</div>
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripcion</label>
    <textarea name="descripcion" class="form-control" id="descripcion" rows="3" placeholder="Marca: Material: Características:" required></textarea>
</div>
<div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" name="stock" class="form-control" id="quantity" required>
</div>
<div class="mb-3">
    <label for="talle" class="form-label">Talle</label>
    <select name="talle" class="form-select" id="talle" required>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <!-- más opciones -->
    </select>
</div>
<div class="mb-3">
    <label for="color" class="form-label">Color</label>
    <select name="color" class="form-select" id="color" required>
        <option value="rojo">Rojo</option>
        <option value="azul">Azul</option>
        <option value="verde">Verde</option>
        <option value="amarillo">Amarillo</option>
        <option value="caqui">caqui</option>
        <!--  más opciones -->
    </select>
</div>

        <div class="mb-3">
            <label for="website" class="form-label">Imagen Url</label>
            <input type="url" name="foto" class="form-control" id="website">
        </div>
        <button type="submit" class="btn btn-primary" href="show.php">Guardar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
    </form>
</div>


<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/Admin/includes/footer.php');
?>