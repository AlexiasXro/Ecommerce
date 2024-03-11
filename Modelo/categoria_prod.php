<?php

require_once 'c://xampp/htdocs/ecommerce/config/Conexion.php';

class Categoria {
    private $categoria_id;
    private $nombre;

    // Constructor
    public function __construct($categoria_id = null, $nombre = "") {
        $this->categoria_id = $categoria_id;
        $this->nombre = $nombre;
    }

    // Setters
    public function setCategoriaId($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Getters
    public function getCategoriaId() {
        return $this->categoria_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    // Método para insertar una nueva categoría en la base de datos
    public function insertarCategoria(Categoria $categoria) {
        try {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO categorias (nombre) VALUES (:nombre)";
            $stmt = $conexion->prepare($sql);
            $nombre = $categoria->getNombre();
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            return true; // La inserción fue exitosa
        } catch (PDOException $e) {
            echo "Error en la inserción de la categoría: " . $e->getMessage();
            return false;
        }
    }

    // Método para obtener todas las categorías de la base de datos
    public function obtenerTodasCategorias() {
        try {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM categorias";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categorias;
        } catch (PDOException $e) {
            echo "Error al obtener todas las categorías: " . $e->getMessage();
            return false;
        }
    }

    // Método para obtener una categoría por su ID
    public function obtenerCategoriaPorId($categoria_id) {
        try {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM categorias WHERE categoria_id = :categoria_id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
            $stmt->execute();
            $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
            return $categoria;
        } catch (PDOException $e) {
            echo "Error al obtener la categoría por ID: " . $e->getMessage();
            return false;
        }
    }

    // Método para actualizar el nombre de una categoría
    public function actualizarNombreCategoria($categoria_id, $nuevo_nombre) {
        try {
            $conexion = Conexion::conectar();
            $sql = "UPDATE categorias SET nombre = :nuevo_nombre WHERE categoria_id = :categoria_id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
            $stmt->bindParam(':nuevo_nombre', $nuevo_nombre);
            $stmt->execute();
            return true; // La actualización fue exitosa
        } catch (PDOException $e) {
            echo "Error al actualizar el nombre de la categoría: " . $e->getMessage();
            return false;
        }
    }

    // Método para eliminar una categoría por su ID
    public function eliminarCategoria($categoria_id) {
        try {
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM categorias WHERE categoria_id = :categoria_id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
            $stmt->execute();
            return true; // La eliminación fue exitosa
        } catch (PDOException $e) {
            echo "Error al eliminar la categoría: " . $e->getMessage();
            return false;
        }
    }
}

?>