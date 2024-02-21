<?php

require_once 'c://xampp/htdocs/ecommerce/config/Conexion.php';


class Producto {
    private $id_producto;
    private $nombre;
    private $precio;
    private $descripcion;
    private $foto;
    private $stock;
    private $talle;
    private $color;
    private $fecha_creacion;

    // Constructor
    public function __construct($id_producto = null, $nombre = "", $precio = "", $descripcion = "", $foto = "", $stock = "",$talle = "", $color = "", $fecha_creacion = null) {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->foto = $foto;
        $this->stock = $stock;
        $this->talle = $talle;
        $this->color = $color;
        $this->fecha_creacion = $fecha_creacion;
    }

    // Setters

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setStock($stock) {
        $this->stock += $stock;
    }
    public function setTalle($talle) {
        $this->talle = $talle;
    }
    public function setColor($color) {
        $this->talle = $color;
    }

    public function setFechaCreacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    // Getters

    public function getIdProducto() {
        return $this->id_producto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getStock() {
        return $this->stock;
    }
    public function getTalle() {
        return $this->talle;
    }
    public function getColor() {
        return $this->color;
    }

    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }

    //Metodo para insertar en la BD
    public function insertarDatos(Producto $producto)
    {
        try {
            $conexion = Conexion::conectar();
            $rutaBase = 'ecommerce/Vista/public/producto-img/';
            $nombreImagen = "1.png"; // Nombre de la imagen
            $rutaCompleta = $rutaBase . $nombreImagen;
            
            $sql = "INSERT INTO productos (nombre, descripcion, precio, foto, stock, talle, color)
                                    VALUES( :nombre, :descripcion, :precio, :foto, :stock, :talle, :color)";

            $stmt = $conexion->prepare($sql);

            $nombre = $producto->getNombre();
            $descripcion = $producto->getDescripcion();
            $precio = $producto->getPrecio();
            $stock = $producto->getStock();
            $talle = $producto->getTalle();
            $color = $producto->getColor();
            $foto = $rutaCompleta;
            //vincular los parametros
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':talle', $talle);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':foto', $foto);
            $stmt->execute();

            return true; // La inserción fue exitosa
        } catch (PDOException $e) {
            echo "Error en la inserción: " . $e->getMessage();
            return false;
        }
    }
    //Metodo para traer un productos de la BD(SHOW)
    public function obtenerProductoPorId($idProducto)
    {
        try {
            $conexion = Conexion::conectar();

            $sql = "SELECT * FROM productos WHERE id_producto = :id_producto LIMIT 1";

            $stmt = $conexion->prepare($sql);

            // Vincular los parámetros
            $stmt->bindParam(':id_producto', $idProducto, PDO::PARAM_INT);
            $stmt->execute();
            $unProducto = $stmt->fetch(PDO::FETCH_ASSOC);

            return $unProducto;
        } catch (PDOException $e) {
            error_log("Error al obtener el registro por ID: " . $e->getMessage());
            return false;
        }
    }

    //Metodo para traer todos los productos de la BD(INDEX)
    public function obtenerTodosProductos()
    {
        try {
            $conexion = Conexion::conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM productos";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $listProducto = $stmt->fetchAll(PDO::FETCH_ASSOC);



            return $listProducto;
        } catch (PDOException $e) {
            echo "Error al obtener todos los productos: " . $e->getMessage();
            return false;
        }
    }

    //Método para actualizar los datos de un usuario(update)
    public function actualizarDatos($id, $nuevosDatos)
    {
        try {
            $conexion = Conexion::conectar();

            //consulta SQL
            $sql = "UPDATE usuarios SET 
                    nombre = :nombre, 
                    detalles = :detalles, 
                    precio = :precio, 
                    foto = :foto, 
                    stock = :stock, 
                    talle = :talle,
                    color = :color,  
                    WHERE id = :id_producto";

            $stmt = $conexion->prepare($sql);

            // Vincular los parámetros
            $stmt->bindParam(':id_producto', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nuevosDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':detalles', $nuevosDatos['detalles'], PDO::PARAM_STR);
            $stmt->bindParam(':precio', $nuevosDatos['precio'], PDO::PARAM_INT);
            $stmt->bindParam(':precio', $nuevosDatos['precio'], PDO::PARAM_STR); 
            $stmt->bindParam(':stock', $nuevosDatos['stock'], PDO::PARAM_STR); 
            $stmt->bindParam(':talle', $nuevosDatos['talle'], PDO::PARAM_STR);  
            $stmt->bindParam(':foto', $nuevosDatos['foto'], PDO::PARAM_STR);
            

            $stmt->execute();


            return true;
        } catch (PDOException $e) {
            error_log("Error al actualizar datos del producto: " . $e->getMessage());
            return false;
        }
    }

    // metodo para eliminar
    public function eliminarProducto($idProducto)
    {
        $conexion = Conexion::conectar(); 

        // Preparar la consulta SQL
        $query = "DELETE FROM productos WHERE id_producto = :id_producto";
        $statement = $conexion->prepare($query);

        // Vincular parámetros
        $statement->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);

        // Ejecutar la consulta
        $result = $statement->execute();

        // Cerrar la conexión
        $conexion = null;

        return $result;
    }

    //PAGINADO 8productos
    public function obtenerProductosPaginados($pagina)
    {
        try {
            $conexion = Conexion::conectar();
            $porPagina = 8; // Número de productos por página
            $inicio = ($pagina - 1) * $porPagina;

            $sql = "SELECT * FROM productos LIMIT :inicio, :porPagina";

            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
            $stmt->bindParam(':porPagina', $porPagina, PDO::PARAM_INT);
            $stmt->execute();

            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $productos;
        } catch (PDOException $e) {
            error_log("Error al obtener los productos paginados: " . $e->getMessage());
            return false;
        }
    }


}

?>
