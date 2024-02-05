/CREATE/agregar nuevos usuarios
<?php

// Incluye el encabezado y el menú
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');

?>
<div class="container mt-3 row justify-content-center col-md-6">
    <h3>Nuevo Producto</h3>
    <form action="store.php" method="POST" autocomplete="off">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" class="form-control" id="precio" step="0.01" min="0">

        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="website" class="form-label">Imagen Url</label>
            <input type="url" name="imagen_url" class="form-control" id="website">
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" id="quantity">
        </div>


        <button type="submit" class="btn btn-primary"href="show.php">Guardar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
    </form>
</div>



<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>