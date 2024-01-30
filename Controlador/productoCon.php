<?php

require_once __DIR__ . '/../Modelo/productoMod.php';



class ProductoController {
    //guarda en la base de datos
    public function insertarP($nombre, $descripcion, $precio, $imagen_url, $stock, $fecha_creacion) {
        try {
            $nuevoProducto = new Producto(null, $nombre, $descripcion, $precio, $imagen_url, $stock, $fecha_creacion);
            $resultado = $nuevoProducto->insertarDatos();

            if ($resultado) {
                return "Éxito: Producto insertado correctamente.";
            } else {
                return "Error: No se pudo insertar el producto.";
            }
        } catch (Exception $e) {
            return "Error inesperado: " . $e->getMessage();
        }
    }
    //lista todo
    public function listarProductos() {
        try {
            $todosLosProductos = Producto::traerTodos();
            return $todosLosProductos;
        } catch (Exception $e) {
            return "Error al obtener todos los productos: " . $e->getMessage();
        }
    }
    //optener por nombre
    public function buscarPNom($nombre) {
        try {
            $productoBuscado = (new Producto(null, $nombre, null, null, null, null, null))->traerporNom();

            if (!empty($productoBuscado)) {
                return $productoBuscado;
            } else {
                return "Producto no encontrado o nombre inexistente.";
            }
        } catch (Exception $e) {
            return "Error inesperado al buscar producto: " . $e->getMessage();
        }
    }

    //actualizar
    public function actualizarProducto($nombre, $descripcion, $precio, $imagen_url, $stock, $fecha_creacion) {
        try {
         //Crear una instancia de la clase Producto
        $producto = new Producto(null, $nombre, $descripcion, $precio, $imagen_url, $stock, $fecha_creacion);
       
       //Llamada al método actualizarP del modelo
        $resultado = $producto->actualizarP();
       
       if ($resultado === true) {
        return true; //Indica éxito
        } else {
        return "Error al actualizar el producto: " . $resultado;
        }
        } catch (Exception $e) {
        return "Error inesperado al actualizar el producto: " . $e->getMessage();
        }
       }


    // eliminar
    public function eliminarP($id_producto) {
        try {
            // Crear una instancia de la clase Producto
            $producto = new Producto($id_producto, null, null, null, null, null, null);

            // Llamada al método eliminar del modelo Producto
            $resultado = $producto->eliminarP();

            if ($resultado === true) {
                // Redirigir a la página anterior (asumiendo que la página anterior es "lista_productos.php")
                header("Location: /ecommerce/Vista/V-producto/listaproducto.php?mensaje=Producto eliminado con éxito");
                exit();
            } else {
                return "Error al eliminar el producto: " . $resultado;
            }
        } catch (Exception $e) {
            return "Error al eliminar el producto: " . $e->getMessage();
        }
    }

    //
    public function obtenerPId($id_producto) {
        try {
            // Crear una instancia de la clase Producto
            $producto = new Producto(null, null, null, null, null, null, null);
    
            // Llamada al método obtenerProductoPorId del modelo Producto
            $resultado = $producto->obtenerPId($id_producto);
    
            return $resultado;
        } catch (Exception $e) {
            return "Error al obtener el producto por ID: " . $e->getMessage();
        }
    }

    //editar
    public function editarProducto($id_producto) {
        try {
            // Obtener datos del producto por su ID
            $datosProducto = Producto::obtenerDatosProducto($id_producto);
    
            // Verificar si se encontraron datos
            if (!empty($datosProducto)) {
                // Renderizar el formulario de edición
                include_once ' /ecommerce/Vista/V-producto/editar.php';
            } else {
                // Mostrar mensaje de error (por ejemplo, producto no encontrado)
                echo "No se encontraron datos para editar el producto.";
            }
        } catch (Exception $e) {
            // Manejar el error
            echo "Error al intentar editar el producto: " . $e->getMessage();
        }
    }
}
?>









