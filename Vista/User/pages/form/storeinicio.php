<?php

require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
   

    // Crear un array con los datos del usuario
    $datosUsuario = [
        'email' => $email,
        'contrasena' => $contrasena,
        
        // Agrega otros campos según sea necesario
    ];
    var_dump($datosUsuario);
    // Crear una instancia del controlador y registrar el nuevo usuario
    $usuarioController = new UsuarioController();
    $usuarioController->verificarCredenciales($email, $contrasena);
}

?>