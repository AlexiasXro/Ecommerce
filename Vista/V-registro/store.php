/STORE/guarda y almacena los datos de create para poder almacenar en la base de datos
<?php

require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $direccion = $_POST['direccion'];
    $provincia = $_POST['provincia'];
    $postal = $_POST['postal'];
    $telefono = $_POST['telefono'];
    $admin = $_POST['admin'];

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
?>
