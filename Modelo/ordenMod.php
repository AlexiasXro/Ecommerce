<?php
require_once 'c://xampp/htdocs/ecommerce/config/Conexion.php';

class Orden {
    private $id_orden;
    private $id_usuario;
    private $id_producto;
   
    private $estado;
    private $fecha_creacion;

    public function __construct($id_orden = null, $id_usuario = "", $id_producto = "", $estado = "", $fecha_creacion = null) {
        $this->id_orden = $id_orden;
        $this->id_usuario = $id_usuario;
        $this->id_producto = $id_producto;
        
        $this->estado = $estado;
        $this->fecha_creacion = $fecha_creacion;
    }

    // Setters
    public function setIdOrden($id_orden) {
        $this->id_orden = $id_orden;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }


    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function setFechacreacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    // Getters
    public function getIdOrden() {
        return $this->id_orden;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getIdProducto() {
        return $this->id_producto;
    }


    public function getEstado() {
        return $this->estado;
    }
    public function getFechacreacion() {
        return $this->fecha_creacion;
    }
 
        // Método para insertar una orden en la BD
    public function insertarOrden(Orden $orden) {
            try {
                $conexion = Conexion::conectar();
                
                $sql = "INSERT INTO ordenes (id_usuario, id_producto,  estado)
                        VALUES (:id_usuario, :id_producto,  :estado)";
    
                $stmt = $conexion->prepare($sql);
    
                $id_usuario = $orden->getIdUsuario();
                $id_producto = $orden->getIdProducto();
                
                $estado = $orden->getEstado();
                
    
                $stmt->bindParam(':id_usuario', $id_usuario);
                $stmt->bindParam(':id_producto', $id_producto);
                
                $stmt->bindParam(':estado', $estado);
                
                $stmt->execute();
    
                return true; 
            } catch (PDOException $e) {
                echo "Error en la inserción: " . $e->getMessage();
                return false;
            }
        }
    
        // Método para obtener una orden por su ID(SHOW)
        public function obtenerOrdenPorId($idOrden) {
            try {
                $conexion = Conexion::conectar();
    
                $sql = "SELECT * FROM ordenes WHERE id_orden = :id_orden LIMIT 1";
    
                $stmt = $conexion->prepare($sql);
    
                $stmt->bindParam(':id_orden', $idOrden, PDO::PARAM_INT);
                $stmt->execute();
                $orden = $stmt->fetch(PDO::FETCH_ASSOC);
    
                return $orden;
            } catch (PDOException $e) {
                error_log("Error al obtener la orden por ID: " . $e->getMessage());
                return false;
            }
        }
    
        // Método para obtener todas las órdenes(INDEX)
        public function obtenerTodasOrdenes() {
            try {
                $conexion = Conexion::conectar();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sql = "SELECT * FROM ordenes";
                $stmt = $conexion->prepare($sql);
                $stmt->execute();
                $ordenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $ordenes;
            } catch (PDOException $e) {
                echo "Error al obtener todas las órdenes: " . $e->getMessage();
                return false;
            }
        }
    
        // Método para actualizar los datos de una orden(UPDATE)
        public function actualizarOrden($idOrden, $nuevosDatos) {
            try {
                $conexion = Conexion::conectar();
    
                $sql = "UPDATE ordenes SET 
                        id_usuario = :id_usuario, 
                        id_producto = :id_producto, 
                        
                        estado = :estado, 
                        fecha_creacion = :fecha_creacion
                        WHERE id_orden = :id_orden";
    
                $stmt = $conexion->prepare($sql);
    
                $stmt->bindParam(':id_orden', $idOrden, PDO::PARAM_INT);
                $stmt->bindParam(':id_usuario', $nuevosDatos['id_usuario'], PDO::PARAM_INT);
                $stmt->bindParam(':id_producto', $nuevosDatos['id_producto'], PDO::PARAM_INT);
                
                $stmt->bindParam(':estado', $nuevosDatos['estado'], PDO::PARAM_STR);
                $stmt->bindParam(':fecha_creacion', $nuevosDatos['fecha_creacion'], PDO::PARAM_STR);
    
                $stmt->execute();
    
                return true;
            } catch (PDOException $e) {
                error_log("Error al actualizar datos de la orden: " . $e->getMessage());
                return false;
            }
        }
    
        // Método para eliminar una orden(DELETE)
        public function eliminarOrden($idOrden) {
            try {
                $conexion = Conexion::conectar(); 
    
                $query = "DELETE FROM ordenes WHERE id_orden = :id_orden";
                $statement = $conexion->prepare($query);
    
                $statement->bindParam(":id_orden", $idOrden, PDO::PARAM_INT);
    
                $result = $statement->execute();
    
                return $result;
            } catch (PDOException $e) {
                error_log("Error al eliminar la orden: " . $e->getMessage());
                return false;
            }
        }
    }

?>    