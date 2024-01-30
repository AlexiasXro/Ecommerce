/CREATE/agregar nuevos usuarios
<?php

// Incluye el encabezado y el menú
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Vista/includes/menu.php');
?>
<div class="container mt-3 row justify-content-center col-md-6">
    <form action="store.php" method="POST" autocomplete="off">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre y Apellido</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo</label>
            <input type="email" class="form-control" id="exampleInputEmail1"name="email" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena">
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
        </div>

        <div class="mb-3">
            <label for="provincia" class="form-label">Provincia</label>
            <input type="text" class="form-control" id="provincia" name="provincia">
        </div>

        <div class="mb-3">
            <label for="postal" class="form-label">Código Postal</label>
            <input type="text" class="form-control" id="postal" name="postal">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="mb-3">
            <label for="admin" class="form-label">Administrador</label>
            <select class="form-select" id="admin" name="admin">
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"href="show.php">Guardar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
    </form>
</div>



<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>