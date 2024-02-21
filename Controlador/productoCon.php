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
            $datosProducto['foto'],
            $datosProducto['stock'],
            $datosProducto['talle'],
            $datosProducto['color'],
            null, 
        );
        $resultado = $productoModel->insertarDatos($nuevoProducto);

        if ($resultado) {
            $_SESSION['mensaje'] = "El nuevo producto se registró correctamente.";
            header("Location: /ecommerce/Vista/V-producto/index.php");
            exit();
        } else {
            $_SESSION['mensaje'] = "Error al registrar el nuevo producto.";
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

    //P A G I N A D O

    public function mostrarProductos($pagina) {
        // Llamar a la función obtenerProductosPaginados del modelo
        $productosModel = new Producto(); // Suponiendo que tengas un modelo llamado ProductosModel
        $productos = $productosModel->obtenerProductosPaginados($pagina);
        
        // Aquí podrías pasar los datos de los productos a una vista para renderizarlos en la interfaz de usuario
        // Por simplicidad, asumiré que simplemente los imprimirás aquí
        
        if ($productos !== false) {
            foreach ($productos as $producto) {
                echo $producto['nombre'] . '<br>'; // Suponiendo que el nombre del producto se encuentra en la columna 'nombre'
                // Puedes imprimir más detalles del producto según tu estructura de datos
            }
        } else {
            echo "Ha ocurrido un error al cargar los productos.";
        }
        
        // También podrías incluir lógica para mostrar los controles de paginación en la interfaz de usuario
        // Por ejemplo, enlaces para ir a la página siguiente, anterior, etc.
    }

}

?>









