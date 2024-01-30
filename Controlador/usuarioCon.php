<?php
require_once ("c://xampp/htdocs/ecommerce/Modelo/usuarioMod.php");

class UsuarioController {
    public function registrarNuevoUsuario($datosUsuario) {
        // Crear una instancia del modelo
        $usuarioModel = new Usuario();

        // Crear un objeto Usuario con los datos recibidos
        $nuevoUsuario = new Usuario(
            null,
            $datosUsuario['nombre'],
            $datosUsuario['email'],
            $datosUsuario['contrasena'],
            $datosUsuario['direccion'],
            $datosUsuario['provincia'],
            $datosUsuario['postal'],
            $datosUsuario['telefono'],
            null, // No es necesario pasar fecha_registro y ultimo_acceso aquí
            null,
            $datosUsuario['admin']
        );

        // Llamar al método insertarUsuario del modelo
        $resultado = $usuarioModel->insertarUsuario($nuevoUsuario);

        // Realizar cualquier otra lógica necesaria (por ejemplo, redirección, mostrar mensajes, etc.)

        // Ejemplo de redirección a una página después de la inserción
        if ($resultado) {
            header("Location: /ecommerce/Vista/V-registro/index.php");
            exit();
        } else {
            echo "Error al registrar el nuevo usuario.";
        }
    }
    //SHOW
    public function mostrarDetallesUsuario($idUsuario) {
        // Crear una instancia del modelo
        $usuarioModel = new Usuario();

        // Llamar al método para obtener el registro por ID
        $registro = $usuarioModel->obtenerRegistroPorId($idUsuario);

        // Verificar si se obtuvo el registro correctamente
        if ($registro) {
            // Puedes devolver los detalles del registro a la vista o realizar otras acciones según tus necesidades
            return $registro;
        } else {
            return false;
        }
    }

    //INDEX
    public function listarUsuarios()
    {
        
        $modeloUsuario = new Usuario(); 

        // Llamar al método obtenerTodosRegistro del modelo
        $usuarios = $modeloUsuario->obtenerTodosRegistro();

        if ($usuarios !== false) {
            // Aquí puedes hacer algo con los registros obtenidos, por ejemplo, mostrarlos en una vista
            return $usuarios;
        } else {
            return "Error al obtener todos los usuarios.";
        }
    }


    // update: Método para actualizar los datos de un usuario
    public function editarUsuario($idUsuario, $nuevosDatos)
    {
        // Crear una instancia del modelo Usuario
        $usuarioModel = new Usuario();
    
        // Llamar al método para obtener el registro por ID
        $registro = $usuarioModel->obtenerRegistroPorId($idUsuario);
    
        // Verificar si se obtuvo el registro correctamente
        if ($registro) {
            // Utilizar el método público para actualizar los datos
            $actualizacionExitosa = $usuarioModel->actualizarDatos($nuevosDatos);
    
            return $actualizacionExitosa;
        } else {
            return false;
        }
    }
    

}

    


?>
