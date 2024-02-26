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
        

        // Ejemplo de redirección a una página después de la inserción
        if ($resultado) {
            $_SESSION['mensaje'] = "El usuario se registró exitosamente.";
            header("Location: /ecommerce/Vista/Admin/V-registro/index.php");
            exit();
        } else {
            $_SESSION['mensaje'] = "Error al registrar el nuevo usuario.";
            header("Location: /ecommerce/Vista/Admin/V-registro/index.php");
            exit();
        }
    }
    //SHOW
    public function mostrarDetallesUsuario($idUsuario) {
        // Crear una instancia del modelo
        $usuarioModel = new Usuario();

        // Llamar al método para obtener el registro por ID
        $registro = $usuarioModel->obtenerRegistroPorId($idUsuario);

        if ($registro) {
            
            return $registro;
        } else {
            return false;
            $_SESSION['mensaje'] = "El usuario no existe.";
            exit();
        }
    }

    //INDEX
    public function listarUsuarios()
    {
        
        $modeloUsuario = new Usuario(); 

        // Llamar al método obtenerTodosRegistro del modelo
        $usuarios = $modeloUsuario->obtenerTodosRegistro();
 
        if ($usuarios !== false) {
            
            return $usuarios;
        } else {
            $_SESSION['mensaje'] = "Error al obtener todos los usuarios.";
        }
    }


    // update: Método para actualizar los datos de un usuario
    public function editarUsuario($idUsuario, $nuevosDatos)
{
    $usuarioModel = new Usuario();
    $registro = $usuarioModel->obtenerRegistroPorId($idUsuario);

    // Verificar si se obtuvo el registro correctamente
    if ($registro) {
        // Utilizar el método público para actualizar los datos
        $actualizacionExitosa = $usuarioModel->actualizarDatos($idUsuario, $nuevosDatos);

        // Verificar si la actualización fue exitosa
        if ($actualizacionExitosa) {
            $_SESSION['mensaje'] = "Los datos del usuario se actualizaron correctamente.";
        } else {
            $_SESSION['mensaje'] = "Error al actualizar los datos del usuario.";
        }

        return $actualizacionExitosa;
    } else {
        // Si no se encuentra el usuario, establecer un mensaje de error en la sesión
        $_SESSION['mensaje'] = "El usuario no existe.";
        return false;
    }
}


    // Función para eliminar un usuario
    public function eliminarUsuario($idUsuario) {
        $usuarioModel = new Usuario();
        $result = $usuarioModel->eliminarUsuario($idUsuario);

       // Verificar si la eliminación fue exitosa
       if ($result) {
        
        $_SESSION['mensaje'] = "El usuario se eliminó correctamente.";
    } else {
        
        $_SESSION['mensaje'] = "Error al eliminar el usuario.";
    }
    return $result;
}

    public function verificarCredenciales($email, $contrasena) {
        
        $usuarioModelo = new Usuario();
        $usuario = $usuarioModelo->Credenciales($email, $contrasena);
       
        if ($usuario) {
            if ($usuario['admin'] == 1) {
                // Usuario es administrador, redirigir a admin.php
                header('Location: /ecommerce/admin.php');
                exit;
            } else {
                // Usuario no es administrador, redirigir a otra página (por ejemplo, inicio.php)
                header('Location:  /ecommerce/index.html');
                exit;
            }
        } else {
            header('Location: inicio.php?error=Credenciales inválidas. Por favor, inténtelo de nuevo.');
            exit;
        }
        
    }
    
}



?>
