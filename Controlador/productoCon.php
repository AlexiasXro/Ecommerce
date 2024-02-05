<?php

require_once ("c://xampp/htdocs/ecommerce/Modelo/productoMod.php");
class ProductoCon {

    public function registrarNuevoProducto($datosProducto) {
        $productoModel = new Producto();
        $nuevoProducto = new Producto(
            null,
            $datosProducto['nombre'],
            $datosProducto['precio'],
            $datosProducto['descripcion'],
            $datosProducto['imagen_url'],
            $datosProducto['stock'],
            $datosProducto['postal'],
            null, 
        );
        $resultado = $productoModel->insertarDatos($nuevoProducto);

        if ($resultado) {
            header("Location: /ecommerce/Vista/V-producto/index.php");
            exit();
        } else {
            echo "Error al registrar el nuevo producto.";
        }
    }
    //SHOW
    public function mostrarDetallesProducto($idProducto)
    {
        $productoModel = new Producto();

        $registro = $productoModel->obtenerProductoPorId($idProducto);

        if ($registro) {
            return $registro;
        } else {
            return false;
        }
    }

    //INDEX
    public function listarProducto()
    {    
        $modelProducto = new Producto(); 
        $producto = $modelProducto->obtenerTodosProductos();
        if ($producto !== false) {
            
            return $producto;
        } else {
            return "Error al obtener todos los producto.";
        }
    }

// update: Método para actualizar los datos de un usuario
    public function editarProducto($idProducto, $nuevosDatos)
{
    $productoModel = new Producto();
    $registro = $productoModel->obtenerProductoPorId($idProducto);
    if ($registro) {
        $actualizado = $productoModel->actualizarDatos($idProducto, $nuevosDatos);

        return $actualizado;
    } else {
        return false;
    }
}

// Función para eliminar un producto
    public function eliminarProducto($idProducto) {
        $productoModel = new Producto();
        $result = $productoModel->eliminarProducto($idProducto);

        return $result;
    }


}

?>









