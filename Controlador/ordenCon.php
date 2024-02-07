<?php
require_once ("c://xampp/htdocs/ecommerce/Modelo/ordenMod.php");

class OrdenCon {

    // Método para registrar una nueva orden(Create))
    public function registrarNuevaOrden($datosOrden) 
    {
        $ordenModel = new Orden();
        $nuevaOrden = new Orden(
            null,
            $datosOrden['id_usuario'],
            $datosOrden['id_producto'],
            $datosOrden['estado'],
            null
        );
        $resultado = $ordenModel->insertarOrden($nuevaOrden);

        if ($resultado) {
            header("Location: /ecommerce/Vista/V-orden/index.php");
            exit();
        } else {
            echo "Error al registrar la nueva orden.";
        }
    }

    // Método para mostrar los detalles de una orden(Show)
    public function mostrarDetallesOrden($idOrden) 
    {
        $ordenModel = new Orden();
        $orden = $ordenModel->obtenerOrdenPorId($idOrden);

        if ($orden) {
            return $orden;
        } else {
            return false;
        }
    }

    // Método para listar todas las órdenes(Index)
    public function listarOrdenes() 
    {
        $modeloOrden = new Orden();
        $ordenes = $modeloOrden->obtenerTodasOrdenes();

        if ($ordenes !== false) {
            return $ordenes;
        } else {
            return "Error al obtener todas las órdenes.";
        }
    }

    // Método para actualizar los datos de una orden(update)
    public function editarOrden($idOrden, $nuevosDatos) 
    {
        $ordenModel = new Orden();
        $orden = $ordenModel->obtenerOrdenPorId($idOrden);

        if ($orden) {
            $actualizacionExitosa = $ordenModel->actualizarOrden($idOrden, $nuevosDatos);
            return $actualizacionExitosa;
        } else {
            return false;
        }
    }

    // Método para eliminar una orden(delete)
    public function eliminarOrden($idOrden) 
    {
        $ordenModel = new Orden();
        $resultado = $ordenModel->eliminarOrden($idOrden);
        return $resultado;
    }
}
?>
