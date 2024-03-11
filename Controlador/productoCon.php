<?php

require_once ("c://xampp/htdocs/ecommerce/Modelo/productoMod.php");
class ProductoCon {

    public function registrarNuevoProducto($datosProducto) {
        $productoModel = new Producto();
        
        // Inicializar la variable de la ruta de la imagen por defecto
        $ruta_imagen = 'Vista/User/assets/img/default.png';
    
        // Obtener la ruta de la imagen del formulario
        if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen_tmp = $_FILES['imagen']['tmp_name'];
            $nombre_imagen = $_FILES['imagen']['name'];
            $ruta_imagen = 'Vista/User/assets/img/producto-img/' . $nombre_imagen; // Ruta donde deseas guardar las imágenes
            move_uploaded_file($imagen_tmp, $ruta_imagen);
        }
    
        // Agregar la ruta de la imagen a los datos del producto
        $datosProducto['foto'] = $ruta_imagen;
    
        // Crear un nuevo producto con los datos del formulario, incluida la ruta de la imagen
        $nuevoProducto = new Producto(
            null,
            $datosProducto['nombre'],
            $datosProducto['precio'],
            $datosProducto['descripcion'],
            $datosProducto['foto'], // Aquí se pasa la ruta de la imagen
            $datosProducto['stock'],
            $datosProducto['talle'],
            $datosProducto['color'],
            null
        );
        
        // Insertar el nuevo producto en la base de datos
        $resultado = $productoModel->insertarDatos($nuevoProducto);
    
        if ($resultado) {
            $_SESSION['mensaje'] = "El nuevo producto se registró correctamente.";
            header("Location: /ecommerce/Vista/Admin/V-producto/index.php");
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









