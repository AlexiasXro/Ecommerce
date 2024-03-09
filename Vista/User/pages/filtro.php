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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-xxxxxx" crossorigin="anonymous" />
        <!--STLYLE CSS-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'><!--STLYLE CSS iconos-->
        
            <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/carro.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">


    </head>

<body>
    <!--carrusel metodos de pagos-->
    <a href="../pages/tipopago.html" class="section-carrusel text-center">
        <div class="text-carousel  bg-dark bg-subtle">
            <div class="text-slide ">
                <i class='bx bxl-mastercard text-white' >&nbspTarjetas de credito</i>
            </div>
            <div class="text-slide ">
                <i class='bx bxs-discount text-white'>&nbspTransferencias Bancarias</i>
            </div>
            <div class="text-slide ">
                <i class='bx bx-money-withdraw text-white'>&nbspDescuentos en Efectivo</i> 
            </div>
            <div class="text-slide ">
                <i class='bx bxs-package text-white'>&nbspEnvios gratis desde $75.000</i>
            </div>
        </div>
    </a>
    <!--carrusel metodos de pagos-->

    <!--MENU con boostrap-->

    <header class="decoracion">

        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href=".././index.html">
                    <img src="../assets/logos/blanco.png" alt="Abba Shoes" >
                </a>
            </div>

            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav justify-content-center">
                            <li class="nav-item"><a class="nav-link" href="../pages/carro.html">CATALOGO</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/descuentos.html">OFERTAS</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/historia.html">NOSOTROS</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/Local.html">SUCURSALES</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/registro.html">REGISTRATE</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/inicio.html">INICIO</a></li>
                        </ul>

                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline" type="submit">Buscar</button>
                          </form>
                    </div>
                </div>
            </nav>
        </div>

    </header>

    <!--////////////////-->
        
            <!-- Segundo renglón del header -->
        
            <!-- Segundo navegador -->
            <nav class="navbar navbar-expand-md navbar-primary bg-subtlet">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-bs-toggle" href="#" id="caracteristicasDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <a class="nav-link dropdown-bs-toggle" href="#" id="filtrarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <form action="insertarOrdenproducto.html" method="post" class="OrdenProducto-form"></form>
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

<!--////////////////-->



        <section>
            <div class="container custom-container">
                <h1 class="text-center">En Construcción!!!</h1>
                <h1 class="text-center">Bienvenido [---]</h1>
                <!--sitio de bienvenida alos nuevos usuarios-->
<section>
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        ¡Registro exitoso!<br />
                        <span style="color: hsl(218, 81%, 75%)">Bienvenido a Abba Shoe </span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    ¡Gracias por registrarte! Esperamos que disfrutes de tu experiencia en nuestro sitio y aproveches al máximo nuestros increíbles descuentos.
                    </p>
                </div>
            </div>
            </div>
        </section>
    
    <?php
    require_once('c://xampp/htdocs/ecommerce/Vista/User/components/footer.php');
    ?>
               
                </div>
        </section>
       




<!--footer-->
<footer class="  text-left text-secondary mt-auto ">
    <div class="decoracionfooter pie-pagina">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-4">
                    <figure>
                        <a href="../index.html">
                            <img src="../assets/logos/logoBcuadro.png" alt="Logo de Abba Shoe" width="250px"
                                class="img-fluid">
                        </a>
                    </figure>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://www.instagram.com/abba.shoe/" class="redes-sociales" ><img src="../assets/logos/instagram.png"class="redes-img" alt="Instagram">Instagram AbbaShoes</a></li>
                            <li><a href="https://www.instagram.com/abba.shoe/" class="redes-sociales" ><img src="../assets/logos/facebook.png"class="redes-img" alt="Facebook">Facebook AbbaShoes</a></li>
                            <li><a href="https://web.whatsapp.com/" class="redes-sociales" ><img src="../assets/logos/messenger.png" class="redes-img" alt="WhatsApp">+543644xxxxxx</a></li>
                            <li><a href="#" class="text-secondary">Email: AbbaShoes@gmail.com</a></li>
                            <li><a href="../pages/preguntas.html" class="text-secondary" >Preguntas Frecuentes</a></li>

                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Horarios Abierto</h5>
                    <ul class="list-unstyled">
                        <li><a href="../pages/Local.html" class="text-secondary">Lunes a Miércoles de 08:30 a 12:00 hs</a></li>
                        <li><a href="../pages/Local.html" class="text-secondary">Jueves 12:30 a 18:30 hs</a></li>
                        <li><a href="../pages/Local.html" class="text-secondary">Viernes 14:30 a 20:30 hs</a></li>
                        <li><a href="../pages/Local.html" class="text-secondary">Sábado 09:00 a 11:00 hs</a></li>
                        <li><a href="../pages/Local.html" class="text-secondary">Domingo cerrado</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-20">
                <hr>
                <a href="https://www.instagram.com/arominaca?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                    <p class="text-secondary">Derechos Reservados © 2024 KNDAlexias</p>
                </a>
                
            </div>
        </div>
    </div>
</footer>

<!--js boostrap-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<!--js lieso-->
<script src="../assets/js/anuncio.js"></script>
<script src="../assets/js/cart.js"></script>
<script src="../assets/js/anuncio.js"></script>
<script src="../assets/js/carro.js"></script>

</body>

</html>