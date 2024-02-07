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
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="text" name="precio" class="form-control" id="precio" step="0.01" pattern="[0-9]+([,\.][0-9]+)?" aria-describedby="precioHelp" required>
            </div>
            <div id="precioHelp" class="form-text">Ingresa el precio en formato decimal, por ejemplo: 10.50</div>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3" placeholder="Marca: Material: Características:"></textarea>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" id="quantity">
        </div>
        <div class="mb-3">
            <label for="talle" class="form-label">Talle</label>
            <select name="talle" class="form-select" id="talle">
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
            <select name="color" class="form-select" id="color">
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
            <input type="url" name="imagen_url" class="form-control" id="website">
        </div>
        <button type="submit" class="btn btn-primary" href="show.php">Guardar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
    </form>
</div>



<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>