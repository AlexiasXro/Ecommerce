<?php
require_once 'c://xampp/htdocs/ecommerce/Modelo/user_session.php';
// Inicia la sesión o crea una instancia de UserSession para gestionar la sesión
$userSession = new UserSession();

// Obtén el nombre de usuario actual
$nombreUsuario = $userSession->getCurrentUser();

if (isset($_POST['cerrar_sesion'])) {
    $userSession->closeSession();
    header("Location: http://localhost/ecommerce/index.html");
    exit();
}

// Obtener el filtro de categoría o filtro de la URL
$categoria = $_GET['categoria'] ?? null;
$filtro = $_GET['filtro'] ?? null;

if ($categoria) {
    // Aplicar filtro por categoría
    // Llamar al método del modelo para obtener productos de la categoría seleccionada
} elseif ($filtro) {
    // Aplicar filtro por precio menor o precio mayor
    // Llamar al método del modelo para obtener productos filtrados por precio
} else {
    // Obtener todos los productos sin filtro
    // Llamar al método del modelo para obtener todos los productos
}

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Caceres Romina">
        <meta name="description" content="Zapatería Abba Shoe: Encuentra el calzado perfecto para hombres, mujeres y niños. Variedad de estilos y tallas.">
        <meta name="keywords" content="zapatería, calzado, zapatos, botas, zapatillas, moda, calidad">
        <meta name="robots" content="index, follow">
        <title>AbbaShoe</title>
        <link rel="icon" href="../../../ASico.ico">
        <!--icono bx y Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-xxxxxx" crossorigin="anonymous" />
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" href="/ecommerce/Vista/User/assets/logo/ASico.ico">
        <!--STLYLE CSS-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'><!--STLYLE CSS iconos-->
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/header.css">
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/footer.css">
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/inicio.css">
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/carro.css">
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/pedido.css">
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/preguntas.css">
        <link rel="stylesheet" href="/ecommerce./Vista/User/assets/css/sucursal.css">

    </head>

<body>

    <!--carrusel metodos de pagos-->
    <a href="../Vista/User/pages/tipopago.html" class="section-carrusel text-center">
        <div class="text-carousel text-bg-dark">
            <div class="text-slide ">
                <i class='bx bxl-mastercard'>&nbspTarjetas de credito</i>
            </div>
            <div class="text-slide ">
                <i class='bx bxs-discount'>&nbspTransferencias Bancarias</i>
            </div>
            <div class="text-slide ">
                <i class='bx bx-money-withdraw'>&nbspDescuentos en Efectivo</i>
            </div>
            <div class="text-slide ">
                <i class='bx bxs-package'>&nbspEnvios gratis desde $75.000</i>
            </div>
        </div>
    </a>
    <!--carrusel metodos de pagos-->

    <!--MENU con boostrap-->
    <header class="decoracion">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="../../../index.html">
                    <img src="../assets/logos/blanco.png" alt="Abba Shoes">
                </a>
            </div>

            <!-- Primera barra de navegación -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="../pages/carro.php">CATALOGO</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/descuentos.php">OFERTAS</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/historia.php">NOSOTROS</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/Local.php">SUCURSALES</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/registro.php">REGISTRATE</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/inicio.php">INICIAR SECIÓN</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Fin de la primera barra de navegación -->

        <!-- Segunda barra de navegación-->
        <nav id="secondNav" class="navbar navbar-expand-lg  flex-column">
            <div class="container justify-content-between align-items-center">
                <!-- Aquí comienza el bloque que deseas agregar -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="filtrarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bx-user-circle' id=""></i> Usuario: <?php echo $nombreUsuario; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="caracteristicasDropdown">
                            <form action="" method="post">
                                <button type="submit" class="cerrarsession-button" name="cerrar_sesion">Cerrar Sesión</button>
                            </form>
                            <li><a class="dropdown-item" href="../pages/preguntas.php">Ayuda</a></li>
                        </ul>
                    </li>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="filtrarDropdownCategoria" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-category-alt'></i> Categoria
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="filtrarDropdownCategoria">
                                <li><a class="dropdown-item" href="?categoria=Zapatos">Zapatos</a></li>
                                <li><a class="dropdown-item" href="?categoria=Zapatillas">Zapatillas</a></li>
                                <li><a class="dropdown-item" href="?categoria=Sandalias">Sandalias</a></li>
                                <li><a class="dropdown-item" href="?categoria=Botas">Botas</a></li>
                                <li><a class="dropdown-item" href="?categoria=Accesorios">Accesorios</a></li>
                                <li><a class="dropdown-item" href="?categoria=Sale">Sale</a></li>
                                <li><a class="dropdown-item" href="?categoria=2x1">2x1</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="filtrarDropdownFiltrar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-filter'></i> Filtrar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="filtrarDropdownFiltrar">
                                <li><a class="dropdown-item" href="?filtro=precio_menor">Precio Menor</a></li>
                                <li><a class="dropdown-item" href="?filtro=precio_mayor">Precio Mayor</a></li>
                            </ul>
                        </li>
                    </ul>

                    <li class="nav-item dropdown">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" readonly>
                            <button class="btn btn-outline btn btn-custom mx-2" type="submit">Buscar</button>
                        </form>
                    </li>

                </ul>


                <!-- Icono del carrito -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class='bx bxs-cart' id="cart-icon"></i>
                        </a>
                    </li>
                </ul>
                <!--Cart-->
                <div class="cart opacity-70" style="background-color: hsl(218, 81%, 85%)">
                    <h2 class="cart-title">Compra</h2>
                    <form action="insertarOrdenproducto.php" method="post" class="OrdenProducto-form"></form>
                    <!--Content-->
                    <div class="cart-content ">

                    </div>

                    <!-- Total -->
                    <div class="total">
                        <div class="total-title">Total</div>
                        <div class="total-price">$0</div>
                    </div>

                    <!-- Buy Button -->
                    <button type="button" class="btn-buy" value="Comprar" name="Comprar">Compra Ahora</button>
                    <!-- Cart Close -->
                    <i class="bx bx-x" id="close-cart"></i>
                </div>
                <!-- Aquí termina el bloque que deseas agregar -->
            </div>
        </nav>

        </div>
        <!-- Fin de la segunda barra de navegación -->
        </div>
    </header>