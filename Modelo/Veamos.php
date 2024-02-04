//veamossss 
<?php
require_once 'c://xampp/htdocs/ecommerce/config/Conexion.php';
        $conexion = Conexion::conectar();

        // Realiza una operación de prueba, por ejemplo, una consulta simple.
        $consulta = $conexion->query("SELECT 1");
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        // Muestra el resultado para confirmar que la conexión funciona.
        var_dump($resultado);
?>