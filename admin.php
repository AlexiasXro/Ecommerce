<?php
    // Incluye el encabezado y el menú
    require_once('c://xampp/htdocs/ecommerce/Vista/Admin/includes/header.php');   
?>

<section class="fondo">
    <h2>Bienvenido</h2>

            <div class="mb-3">
                <a href="/ecommerce/Vista/Admin/V-registro/create.php" class="btn btn-primary mt-3">Agregar nuevo usuario</a>
                <a href="/ecommerce/Vista/Admin/V-producto/create.php" class="btn btn-primary mt-3">Agregar nuevo producto</a>
                <a href="/ecommerce/Vista/Admin/V-orden/create.php" class="btn btn-primary mt-3">Agregar nueva  orden  </a>
                <a href="/ecommerce/Vista/Admin/V-/create.php" class="btn btn-primary mt-3">Agregar nuevo orden/producto</a>
            </div>

</section>




<?php
    // Incluye el pie de página
    require_once('c://xampp/htdocs/ecommerce/Vista/Admin/includes/footer.php');
?>