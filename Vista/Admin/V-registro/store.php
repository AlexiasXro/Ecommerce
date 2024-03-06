<?php

require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');

//Menejo de formulario registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : '';
    $postal = isset($_POST['postal']) ? $_POST['postal'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $admin = isset($_POST['admin']) ? $_POST['admin'] : '';

    // Crear un array con los datos del usuario
    $datosUsuario = [
        'nombre' => $nombre,
        'email' => $email,
        'contrasena' => $contrasena,
        'direccion' => $direccion,
        'provincia' => $provincia,
        'postal' => $postal,
        'telefono' => $telefono,
        'admin' => $admin,
        // Agrega otros campos según sea necesario
    ];

    // Crear una instancia del controlador y registrar el nuevo usuario
    $usuarioController = new UsuarioController();
    $usuarioController->registrarNuevoUsuario($datosUsuario);
}
