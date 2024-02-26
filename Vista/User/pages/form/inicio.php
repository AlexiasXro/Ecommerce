<?php


require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');
require_once('c://xampp/htdocs/ecommerce/Vista/User/components/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['contrasena'];

    // Verificar las credenciales
    $usuarioController = new UsuarioController();
    $usuario = $usuarioController->verificarCredenciales($email, $contrasena);

    // Si las credenciales son válidas
    if ($usuario) {
        // Verificar si el usuario es un administrador
        if ($usuario['admin'] == 1) {
            // Usuario es administrador, redirigir a admin.php
            header('Location: admin.php');
            exit;
        } else {
            // Usuario no es administrador, redirigir a otra página (p. ej., página de inicio)
            header('Location: inicio.php');
            exit;
        }
    } else {
        // Credenciales inválidas, mostrar mensaje de error
        echo "Credenciales inválidas. Por favor, inténtelo de nuevo.";
    }
}

?>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">


        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Inicio <br />
                        <span style="color: hsl(218, 81%, 75%)">Abba shoes tienda online</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Temporibus, expedita iusto veniam atque, magni tempora mollitia
                        dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                        ab ipsum nisi dolorem modi. Quos?
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                        <form action="storeinicio.php" method="POST">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="form3Example3"name="email" class="form-control" />
                                    <label class="form-label" for="form3Example3">Email</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4"name="contrasena" class="form-control" />
                                    <label class="form-label" for="form3Example4">Contraseña</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-center mb-4">
                                    <input class="form-check-input me-2" type="checkbox" name="newsletter" value="" id="form2Example33"
                                        checked />
                                    <label class="form-check-label" for="form2Example33">
                                        Suscríbete a nuestro boletín
                                    </label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-dark btn-block mb-4"href="">
                                    Inicio
                                </button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>o inicia con:</p>
                                    <button type="button" class="btn btn-dark btn-floating mx-1">
                                        <i class='bx bxl-facebook-circle'></i>
                                    </button>

                                    <button type="button" class="btn btn-dark btn-floating mx-1">
                                        <i class='bx bxl-google' ></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    </section>




<?php
require_once('c://xampp/htdocs/ecommerce/Vista/User/components/footer.php');

?>