<?php
    // Incluye el encabezado y el menú
    require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');   
?>

<section class="fondo">
    <h2>Bienvenido</h2>

            <div class="mb-3">
                <a href="/ecommerce/Vista/V-registro/create.php" class="btn btn-primary mt-3">Agregar nuevo usuario</a>
                <a href="/ecommerce/Vista/V-producto/create.php" class="btn btn-primary mt-3">Agregar nuevo producto</a>
                <a href="/ecommerce/Vista/V-orden/create.php" class="btn btn-primary mt-3">Agregar nueva  orden  </a>
                <a href="/ecommerce/Vista/V-/create.php" class="btn btn-primary mt-3">Agregar nuevo orden/producto</a>
            </div>

</section>




<?php
    // Incluye el pie de página
    require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>