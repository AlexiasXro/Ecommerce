<?php

// Incluye el encabezado y el menú
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/productoCon.php.php');

// Pasando el número de página deseado como un parámetro en la URL
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$controlador = new productoCon();
$controlador->mostrarProductos($pagina);
?>


CARRO


<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>