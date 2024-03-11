<?php

require_once 'c://xampp/htdocs/ecommerce/Modelo/categoria_prod.php';
require_once 'c://xampp/htdocs/ecommerce/Modelo/productoMod.php';

class CategoriaCon {

    public function filtrarProductosPorCategoria($categoria) {
        
        if (!empty($categoria)) {// Verificar si se ha proporcionado una categoría válida
            
            $productoModel = new Producto();// Instanciar el modelo de Producto
            // Llamar al método del modelo para obtener productos de la categoría seleccionada
            $productos = $productoModel->obtenerProductosPorCategoria($categoria);
            // Pasar los productos a la vista para su presentación
            // Aquí se renderizaría la vista correspondiente, pasando los datos de los productos
        } else {
            // Redirigir o mostrar un mensaje de error, ya que no se proporcionó una categoría válida
        }
    }

    // Método para mostrar todas las categorías
    public function mostrarTodasCategorias() {
        $categoriaModel = new Categoria();
        $categorias = $categoriaModel->obtenerTodasCategorias();

        // Aquí deberías llamar a la vista correspondiente para mostrar las categorías
        // Por ejemplo: include 'vista/categorias.php';
        // Y pasarle las categorías como parámetro para que las muestre en la vista
    }

    // Método para agregar una nueva categoría
    public function agregarCategoria($nombre) {
        $categoriaModel = new Categoria();
        $categoria = new Categoria(null, $nombre);
        $resultado = $categoriaModel->insertarCategoria($categoria);

        if ($resultado) {
            // La categoría se agregó correctamente, redireccionar a la página de categorías
            // Por ejemplo: header('Location: categorias.php');
        } else {
            // Error al agregar la categoría, mostrar mensaje de error o manejar de otra forma
        }
    }

    // Método para eliminar una categoría
    public function eliminarCategoria($categoria_id) {
        $categoriaModel = new Categoria();
        $resultado = $categoriaModel->eliminarCategoria($categoria_id);

        if ($resultado) {
            // La categoría se eliminó correctamente, redireccionar a la página de categorías
            // Por ejemplo: header('Location: categorias.php');
        } else {
            // Error al eliminar la categoría, mostrar mensaje de error o manejar de otra forma
        }
    }

    // Método para actualizar el nombre de una categoría
    public function actualizarNombreCategoria($categoria_id, $nuevo_nombre) {
        $categoriaModel = new Categoria();
        $resultado = $categoriaModel->actualizarNombreCategoria($categoria_id, $nuevo_nombre);

        if ($resultado) {
            // El nombre de la categoría se actualizó correctamente, redireccionar a la página de categorías
            // Por ejemplo: header('Location: categorias.php');
        } else {
            // Error al actualizar el nombre de la categoría, mostrar mensaje de error o manejar de otra forma
        }
    }
}

?>
