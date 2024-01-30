<?php

require_once __DIR__ . '/../Config/Conexion.php';


class Producto {
    private $id_producto;
    private $nombre;
    private $precio;
    private $descripcion;
    private $imagen_url;
    private $stock;
    private $fecha_creacion;

    // Constructor
    public function __construct($id_producto, $nombre, $precio, $descripcion, $imagen_url, $stock, $fecha_creacion) {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->imagen_url = $imagen_url;
        $this->stock = $stock;
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

    public function setImagenUrl($imagen_url) {
        $this->imagen_url = $imagen_url;
    }

    public function setStock($stock) {
        $this->stock = $stock;
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

    public function getImagenUrl() {
        return $this->imagen_url;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }

             //Metodo para insertar en la BD
            public function insertarDatos(){
                try {
                    $pdo = Conexion::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stm = $pdo->prepare("INSERT INTO productos (nombre, descripcion, precio, imagenurl, stock, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?)");
                    $stm->execute([$this->nombre, $this->descripcion, $this->precio, $this->imagen_url, $this->stock, $this->fecha_creacion]);
                    return true; // Indica éxito
                } catch (PDOException $e) {
                    return false; // Indica error
                }
            }

        
            //Metodo para traer todos los productos de la BD
            public static function traerTodos() {
                try {
                    $pdo = Conexion::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stm = $pdo->prepare("SELECT * FROM productos");
                    $stm->execute();
                    return $stm->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    return "Error al obtener todos los productos: " . $e->getMessage();
                }
            }
        
            //Metodo para buscar un producto por Nombre
            public function traerporNom(){
                try{
                    $pdo = Conexion::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

                    $stm = $pdo->prepare("SELECT * FROM productos WHERE nombre LIKE ?");
                    $stm->execute(["%" . $this->nombre . "%"]);
                    return $stm->fetchAll();
                }
                catch(Exception $e){
                    return "Error o Nombre inexistente: " . $e->getMessage();
                }
            }
        
        
            //Metodo para actualizar un producto
            public function actualizarP() {
                try {
                    $pdo = Conexion::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stm = $pdo->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, imagenurl=?, stock=?, fecha_creacion=? WHERE id_producto=?");
                    $stm->execute([$this->nombre, $this->descripcion, $this->precio, $this->imagen_url, $this->stock, $this->fecha_creacion, $this->id_producto]);
                    return true; // Indicates success
                } catch (PDOException $e) {
                    return "Error al actualizar producto: " . $e->getMessage();
                }
            }
            
        
            //Metodo para eliminar un producto
            public function eliminarP(){
                try{
                    $pdo = Conexion::conectar(); 
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stm = $pdo->prepare("DELETE FROM productos WHERE id_producto=?");
                    $stm->execute([$this->id_producto]);
                    return true;
                }
                catch(Exception $e){
                    return "Error al eliminar producto: " . $e->getMessage();
                }
            }

            //
            public static function obtenerPId($id_producto) {
                try {
                    $pdo = Conexion::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stm = $pdo->prepare("SELECT * FROM productos WHERE id_producto = ?");
                    $stm->execute([$id_producto]);
                    $producto = $stm->fetch(PDO::FETCH_ASSOC);
                
                    if ($producto) {
                        return $producto;
                    } else {
                        return null; // Si no se encuentra el producto, devolvemos null
                    }
                } catch (PDOException $e) {
                    throw new Exception("Error al obtener el producto por ID: " . $e->getMessage());
                }
            }

            public static function obtenerDatosProducto($id_producto) {
                try {
                    $pdo = Conexion::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $stm = $pdo->prepare("SELECT * FROM productos WHERE id_producto = ?");
                    $stm->execute([$id_producto]);
        
                    $datosProducto = $stm->fetch(PDO::FETCH_ASSOC) ?: [];

                    
        
                    return $datosProducto;
                } catch (Exception $e) {
                    throw new Exception("Error al obtener datos del producto: " . $e->getMessage());
                }
            }


}

        
        


?>
