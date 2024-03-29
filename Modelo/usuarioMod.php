<?php

require_once 'c://xampp/htdocs/ecommerce/config/Conexion.php';

class Usuario
{
    private $id_usuario;
    private $nombre;
    private $email; //username
    private $contrasena;
    private $direccion;
    private $provincia;
    private $postal;
    private $telefono;
    private $fecha_registro;
    private $ultimo_acceso;
    private $admin;




    // Constructor
    public function __construct($id_usuario = null, $nombre = "", $email = "", $contrasena = "", $direccion = "", $provincia = "", $postal = "", $telefono = "", $fecha_registro = null, $ultimo_acceso = null, $admin = "")
    {
        $this->id_usuario = $id_usuario;
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
        $this->id_usuario = $id_usuario;
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
        return $this->id_usuario;
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
            $stm = $conexion->prepare($sql);

            // Crear variables temporales
            $nombre = $usuario->getNombre();
            $email = $usuario->getEmail();
            $contrasena = password_hash($usuario->getContrasena(), PASSWORD_DEFAULT);
            $direccion = $usuario->getDireccion();
            $provincia = $usuario->getProvincia();
            $postal = $usuario->getPostal();
            $telefono = $usuario->getTelefono();
            $fecha_registro = $usuario->getFechaRegistro();
            $ultimo_acceso = $usuario->getUltimoAcceso();
            //
            $admin = $usuario->isAdmin();

            // Vincular los parámetros
            $stm->bindParam(':nombre', $nombre);
            $stm->bindParam(':email', $email);
            $stm->bindParam(':contrasena', $contrasena);
            $stm->bindParam(':direccion', $direccion);
            $stm->bindParam(':provincia', $provincia);
            $stm->bindParam(':postal', $postal);
            $stm->bindParam(':telefono', $telefono);
            $stm->bindParam(':fecha_registro', $fecha_registro);
            $stm->bindParam(':ultimo_acceso', $ultimo_acceso, PDO::PARAM_NULL);
            $stm->bindParam(':admin', $admin);


            // Ejecutar la consulta
            $stm->execute();

            return true; // La inserción fue exitosa
        } catch (PDOException $e) {
            echo "Error en la inserción: " . $e->getMessage();
            return false;
        }
    }

    //SHOW visualiza el registro
    public function obtenerRegistroPorId($idRegistro)
    {
        try {
            $conexion = Conexion::conectar();

            // Consulta SQL
            $sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario LIMIT 1";

            // Preparar la declaración
            $stm = $conexion->prepare($sql);

            // Vincular los parámetros
            $stm->bindParam(':id_usuario', $idRegistro, PDO::PARAM_INT);

            $stm->execute();

            // Obtener el resultado como un array asociativo
            $registro = $stm->fetch(PDO::FETCH_ASSOC);

            return $registro; // Todo está bien
        } catch (PDOException $e) {
            // Registra el error de manera más específica
            error_log("Error al obtener el registro por ID: " . $e->getMessage());
            return false;
        }
    }

    //INDEX
    public function obtenerTodosRegistro()
    {
        try {
            $conexion = Conexion::conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM usuarios";
            $stm = $conexion->prepare($sql);
            $stm->execute();
            $registros = $stm->fetchAll(PDO::FETCH_ASSOC);



            return $registros;
        } catch (PDOException $e) {
            echo "Error al obtener todos los registros: " . $e->getMessage();
            return false;
        }
    }




    // update: Método para actualizar los datos de un usuario
    public function actualizarDatos($id_usuario, $nuevosDatos)
    {
        try {
            $conexion = Conexion::conectar();


            // Construir la consulta SQL
            $sql = "UPDATE usuarios SET 
                nombre = :nombre, 
                email = :email, 
                contrasena = :contrasena, 
                direccion = :direccion, 
                provincia = :provincia, 
                postal = :postal, 
                telefono = :telefono 
                WHERE id_usuario = :id_usuario";

            $stm = $conexion->prepare($sql);

            // Vincular los parámetros
            $stm->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stm->bindParam(':nombre', $nuevosDatos['nombre'], PDO::PARAM_STR);
            $stm->bindParam(':email', $nuevosDatos['email'], PDO::PARAM_STR);

            // Manejo seguro de la contraseña (si es necesario)
            if (!empty($nuevosDatos['contrasena'])) {
                // Hash de la nueva contraseña
                $hashedPassword = password_hash($nuevosDatos['contrasena'], PASSWORD_DEFAULT);
                $stm->bindParam(':contrasena', $hashedPassword, PDO::PARAM_STR);
            } else {
                // No actualizar la contraseña si no se proporciona una nueva
                $stm->bindValue(':contrasena', null, PDO::PARAM_NULL);
            }

            $stm->bindParam(':direccion', $nuevosDatos['direccion'], PDO::PARAM_STR);
            $stm->bindParam(':provincia', $nuevosDatos['provincia'], PDO::PARAM_STR);
            $stm->bindParam(':postal', $nuevosDatos['postal'], PDO::PARAM_STR);
            $stm->bindParam(':telefono', $nuevosDatos['telefono'], PDO::PARAM_STR);

            $stm->execute();


            return true; // Indica éxito
        } catch (PDOException $e) {
            // Registra el error de manera más específica
            error_log("Error al actualizar datos del usuario: " . $e->getMessage());
            return false; // Indica error
        }
    }


    // Otras funciones del modelo aquí
    public function eliminarUsuario($idUsuario)
    {
        $conexion = Conexion::conectar(); // Asegúrate de tener la clase de conexión

        // Preparar la consulta SQL
        $sql = "DELETE FROM usuarios WHERE id_usuario = :id_usuario";
        $stm = $conexion->prepare($sql);

        // Vincular parámetros
        $stm->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);

        // Ejecutar la consulta
        $result = $stm->execute();

        // Cerrar la conexión
        $conexion = null;

        return $result;
    }

    // SESSIONES  una se encarga de la autenticación del usuario y la otra se encarga de obtener y almacenar información adicional del usuario.
    public function userExiste($user, $pass)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT email, contrasena FROM usuarios WHERE email = :email";
        $stm = $conexion->prepare($sql);
        $stm->execute(['email' => $user]);

        if ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $hashed_password = $row['contrasena'];

            if (password_verify($pass, $hashed_password)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false; 
        }
    }
    //obtener y almacenar información del usuario 
    public function setUser($user)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stm = $conexion->prepare($sql);
        $stm->execute(['email' => $user]);

        if ($row = $stm->fetch(PDO::FETCH_ASSOC)) {

            $this->nombre = $row['nombre'];
            $this->email = $row['email'];
            $this->admin = $row['admin'];
        }
    }
}
