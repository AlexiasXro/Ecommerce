
<?php

// Incluye el encabezado y el menú
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');

?>

<div class="container mt-3 row justify-content-center col-md-6">
    <h3>Nueva Orden</h3>
    <form action="store.php" method="POST" autocomplete="off">
        <div class="mb-3">
            <label for="id_usuario" class="form-label">ID de Usuario</label>
            <input type="text" class="form-control" id="id_usuario" name="id_usuario">
        </div>

        <div class="mb-3">
            <label for="id_producto" class="form-label">ID de Producto</label>
            <input type="text" class="form-control" id="id_producto" name="id_producto">
        </div>


        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado">
                <option value="Pendiente">Pendiente</option>
                <option value="En Proceso">En Proceso</option>
                <option value="Completada">Completada</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        </div>



        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
    </form>
</div>

<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>