<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I

    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link hrel="stylesheet" href="/ecommerce/Vista/Admin/includes/public/style.css">


</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid bg-dark  mb-1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/ecommerce/admin.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown" data-bs-theme="dark">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Registro</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item " href="/ecommerce/Vista/V-registro/index.php">Usuarios</a></li>
                                <li><a class="dropdown-item" href="/ecommerce/Vista/V-registro/create.php">Agregar nuevos Usuarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" data-bs-theme="dark">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Producto</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/ecommerce/Vista/V-producto/index.php">Producto</a></li>
                                <li><a class="dropdown-item" href="/ecommerce/Vista/V-producto/create.php">Agregar nuevos </a></li>
                                <li><a class="dropdown-item" href="/ecommerce/Vista/V-producto/create.php">Categoria </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" data-bs-theme="dark">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Orden</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/ecommerce/Vista/V-orden/index.php">Orden</a></li>
                                <li><a class="dropdown-item" href="/ecommerce/Vista/V-orden/create.php">Agregar nuevos </a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown" data-bs-theme="dark">
                            <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Carrito</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/ecommerce/Vista/Admin/V-carrito/index.php">Carrito</a></li>
                                <li><a class="dropdown-item" href="/ecommerce/Vista/Admin/V-pagos/create.php">Producto/Carrito </a></li>
                                <li><a class="dropdown-item" href="/ecommerce/Vista/Admin/V-pagos/create.php">Producto/Orden </a></li>
                                <li><a class="dropdown-item" href="/ecommerce/Vista/Admin/V-pagos/create.php">Agregar carrito </a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown" data-bs-theme="dark">
                            <a class="nav-link   disabled dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pago</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/ecommerce/Vista/Admin/V-pagos/index.php">Orden/Producto</a></li>
                                <li><a class="dropdown-item" href="/ecommerce/Vista/Admin/V-pagos/create.php">Agregar nuevos </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid">

                <form action="busqueda.php" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Buscar">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
            </div>
            <div>
               
            </div>
    </div>
    </nav>
    </div>
    <!--Reloj-->

    </div>
    </nav>
    </div>

    <!--contenido principal-->
    <div class="container-fluid">