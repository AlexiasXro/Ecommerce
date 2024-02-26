<?php
session_start();
?>


<!DOCTYPE html>
<html lang="es">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Caceres Romina">
        <meta name="description"
            content="Zapatería Abba Shoe: Encuentra el calzado perfecto para hombres, mujeres y niños. Variedad de estilos y tallas.">
        <meta name="keywords" content="zapatería, calzado, zapatos, botas, zapatillas, moda, calidad">
        <meta name="robots" content="index, follow">
        <title>AbbaShoe</title>
        <!--icono bx y Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-xxxxxx" crossorigin="anonymous" />
            <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
        <!--STLYLE CSS-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'><!--STLYLE CSS iconos-->
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/header.css">
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/footer.css">
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/inicio.css">
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/carro.css">
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/pedido.css">
        <link rel="stylesheet" href="/ecommerce/Vista/User/assets/css/preguntasfrecuentes.css">
        <link rel="stylesheet" href="/ecommerce./Vista/User/assets/css/sucursal.css">

    </head>

<body>
   
    <!--carrusel metodos de pagos-->
    <a href="../Vista/User/pages/tipopago.html" class="section-carrusel text-center">
        <div class="text-carousel text-bg-dark">
            <div class="text-slide ">
                <i class='bx bxl-mastercard' >&nbspTarjetas de credito</i>
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
                        <img src="/ecommerce/Vista/User/assets/img/logos/logo_p.png" alt="Abba Shoes">
                    </a>
                </div>
        
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link" href="/ecommerce/Vista/User/pages/carro.php">CATALOGO</a></li>
                                <li class="nav-item"><a class="nav-link" href="/ecommerce/Vista/User/pages/sale.html">OFERTAS</a></li>
                                <li class="nav-item"><a class="nav-link" href="/ecommerce/Vista/User/pages/contactanos.html">NOSOTROS</a></li>
                                <li class="nav-item"><a class="nav-link" href="/ecommerce/Vista/User/pages/Local.html">SUCURSALES</a></li>
                                <li class="nav-item"><a class="nav-link" href="/ecommerce/Vista/User/pages/form/registro.php">REGISTRATE</a></li>
                                <li class="nav-item"><a class="nav-link" href="/ecommerce/Vista/User/pages/form/inicio.php">INICIO</a></li>
                            </ul>
        
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        
        
            <!-- Segundo renglón del header -->
        
            <!-- Segundo navegador -->
            <nav class="navbar navbar-expand-md navbar-primary bg-subtlet">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="caracteristicasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-category-alt' ></i> Categoria
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="caracteristicasDropdown">
                                    <li><button class="dropdown-item">Zapatos</button></li>
                                    <li><button class="dropdown-item">Zapatillas</button></li>
                                    <li><button class="dropdown-item">Sandalias</button></li>
                                    <li><button class="dropdown-item">Botas</button></li>
                                    <li><button class="dropdown-item">Accesorios</button></li>
                                    <li><button class="dropdown-item">Sale</button></li>
                                    <li><button class="dropdown-item">2x1</button></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class='bx bx-user-circle' id=""></i> Usuario
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class='bx bx-message-rounded-detail' ></i> Contactanos
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="filtrarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-filter'></i> Filtrar
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="filtrarDropdown">
                                    <li><button class="dropdown-item">Precio Menor</button></li>
                                    <li><button class="dropdown-item">Precio Mayor</button></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Icono del carrito -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class='bx bxs-cart'id="cart-icon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                 <!--Cart-->
                 <div class="cart">
                    <h2 class="cart-title">Compra</h2>
                    <form action="insertarOrdenproducto.php" method="post" class="OrdenProducto-form"></form>
                    <!--Content-->
                    <div class="cart-content">
        
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
            </nav>
            
    
        </header>