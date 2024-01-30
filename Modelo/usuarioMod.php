<?php

require_once 'c://xampp/htdocs/ecommerce/config/Conexion.php';

class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $contrasena;
    private $direccion;
    private $provincia;
    private $postal;
    private $telefono;
    private $fecha_registro;
    private $ultimo_acceso;
    private $admin;
  



    // Constructor
    public function __construct($id = null, $nombre = "", $email = "", $contrasena = "", $direccion = "", $provincia = "", $postal = "", $telefono = "", $fecha_registro = null, $ultimo_acceso = null, $admin = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this->direccion = $direccion;
        $this->provincia = $provincia;
        $this->postal = $postal;
        $this->telefono = $telefono;
        $this->fecha_registro = $fecha_registro;
        $this->ultimo_acceso = $ultimo_acceso;
        $this->admin = $admin;
    }

    
    // Setters

    public function setIdUsuario($id_usuario)
    {
        $this->id = $id_usuario;
    }

    public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function setContrasena($contrasena)
        {
            $this->contrasena = $contrasena;
        }

        public function setDireccion($direccion)
        {
            $this->direccion = $direccion;
        }

        public function setProvincia($provincia)
        {
            $this->provincia = $provincia;
        }

        public function setPostal($postal)
        {
            $this->postal = $postal;
        }

        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }

        public function setFechaRegistro($fecha_registro)
        {
            $this->fecha_registro = $fecha_registro;
        }

        public function setUltimoAcceso($ultimo_acceso)
        {
            $this->ultimo_acceso = $ultimo_acceso;
        }

        public function setAdmin($admin)
        {
            $this->admin = $admin;
        }

        // Getters

        public function getIdUsuario()
        {
            return $this->id;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getContrasena()
        {
            return $this->contrasena;
        }

        public function getDireccion()
        {
            return $this->direccion;
        }

        public function getProvincia()
        {
            return $this->provincia;
        }

        public function getPostal()
        {
            return $this->postal;
        }

        public function getTelefono()
        {
            return $this->telefono;
        }

        public function getFechaRegistro()
        {
            return $this->fecha_registro;
        }

        public function getUltimoAcceso()
        {
            return $this->ultimo_acceso;
        }

        public function isAdmin()
        {
            return $this->admin;
        }
        
            //insert
            public function insertarUsuario(Usuario $usuario)
            {
                try {
                    // Establecer la conexión
                    $conexion = Conexion::conectar();

                    // Construir la consulta SQL
                    $sql = "INSERT INTO usuarios (nombre, email, contrasena, direccion, provincia, postal, telefono, fecha_registro, ultimo_acceso, admin)
                                    VALUES (:nombre, :email, :contrasena, :direccion, :provincia, :postal, :telefono, :fecha_registro, :ultimo_acceso, :admin)";

                // Preparar la declaración
                $stmt = $conexion->prepare($sql);

                // Crear variables temporales
                $nombre = $usuario->getNombre();
                $email = $usuario->getEmail();
                $contrasena = $usuario->getContrasena();
                $direccion = $usuario->getDireccion();
                $provincia = $usuario->getProvincia();
                $postal = $usuario->getPostal();
                $telefono = $usuario->getTelefono();
                $fecha_registro = $usuario->getFechaRegistro();
                $ultimo_acceso = $usuario->getUltimoAcceso();
                $admin = $usuario->isAdmin();

                // Vincular los parámetros
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':contrasena', $contrasena);
                $stmt->bindParam(':direccion', $direccion);
                $stmt->bindParam(':provincia', $provincia);
                $stmt->bindParam(':postal', $postal);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->bindParam(':fecha_registro', $fecha_registro);
                $stmt->bindParam(':ultimo_acceso', $ultimo_acceso, PDO::PARAM_NULL); // Establecer como nulo
                $stmt->bindParam(':admin', $admin);


                    // Ejecutar la consulta
                    $stmt->execute();

                    return true; // La inserción fue exitosa
                } catch (PDOException $e) {
                    // Manejar cualquier error de la base de datos
                    echo "Error en la inserción: " . $e->getMessage();
                    return false;
                }
            }

        //SHOW visualiza el registro
        public function obtenerRegistroPorId($idRegistro)
        {
            try {
                // Establecer la conexión
                $conexion = Conexion::conectar();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Construir la consulta SQL
                $sql = "SELECT * FROM usuarios WHERE id = :id LIMIT 1";
        
                // Preparar la declaración
                $stmt = $conexion->prepare($sql);
        
                // Vincular los parámetros
                $stmt->bindParam(':id', $idRegistro, PDO::PARAM_INT); 
        
                // Ejecutar la consulta
                $stmt->execute();
                
                // Obtener el resultado como un array asociativo
                $registro = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $conexion = null;
                
                return $registro;
            } catch (PDOException $e) {
                // Manejar cualquier error de la base de datos
                echo "Error al obtener el registro: " . $e->getMessage();
                return false;
            }
        }
    //INDEX
    public function obtenerTodosRegistro()
    {
        try {
            // Establecer la conexión
            $conexion = Conexion::conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM usuarios";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);


            $conexion = null;

            

            return $registros;
        } catch (PDOException $e) {
            // Manejar cualquier error de la base de datos
            echo "Error al obtener todos los registros: " . $e->getMessage();
            return false;
        }
    }

    public function actualizarNombre($nuevoNombre)
    {
        $this->nombre = $nuevoNombre;
    }


    //update
    // update: Método para actualizar los datos de un usuario
    public function actualizarDatos($nuevosDatos)
    {
        try {
            $conexion = Conexion::conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            // Construir la consulta SQL
            $sql = "UPDATE usuarios SET nombre = :nombre, email = :email, contrasena = :contrasena, direccion = :direccion, provincia = :provincia, postal = :postal, telefono = :telefono WHERE id = :id";

            $stmt = $conexion->prepare($sql);

            // Vincular los parámetros
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);  
            $stmt->bindParam(':nombre', $nuevosDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $nuevosDatos['email'], PDO::PARAM_STR);
            $stmt->bindParam(':contrasena', $nuevosDatos['contrasena'], PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $nuevosDatos['direccion'], PDO::PARAM_STR);
            $stmt->bindParam(':provincia', $nuevosDatos['provincia'], PDO::PARAM_STR);
            $stmt->bindParam(':postal', $nuevosDatos['postal'], PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $nuevosDatos['telefono'], PDO::PARAM_STR);
            


            $stmt->execute();
            $conexion = null;

            return true; 
        } catch (PDOException $e) {
            // Manejar cualquier error de la base de datos
            echo "Error en la base de datos. Detalles: " . $e->getMessage();
            return false; // Indica error
        }

    }

        // Otras funciones del modelo aquí
            // Otras funciones del modelo aquí
                // Otras funciones del modelo aquí
                    // Otras funciones del modelo aquí
                        // Otras funciones del modelo aquí
}



    

        
