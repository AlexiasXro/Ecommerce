<?php

require_once('c://xampp/htdocs/ecommerce/Controlador/ordenCon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $idUsuario = $_POST['id_usuario'];
    $idProducto = $_POST['id_producto'];
    
    $estado = $_POST['estado'];
    

    // Crear un array con los datos de la orden
    $datosOrden = [
        'id_usuario' => $idUsuario,
        'id_producto' => $idProducto,
        
        'estado' => $estado,
    ];

    // Crear una instancia del controlador y registrar la nueva orden
    $ordenController = new OrdenCon();
    $ordenController->registrarNuevaOrden($datosOrden);
}
?>

