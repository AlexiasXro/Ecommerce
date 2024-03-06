<?php
require_once("c://xampp/htdocs/ecommerce/Modelo/usuarioMod.php");

class UsuarioController
{

    public function registrarNuevoUsuario($datosUsuario)
    {
        // Crear una instancia del modelo
        $usuarioModel = new Usuario();

        // Verificar si se proporcionó el apellido
        if (isset($datosUsuario['apellido'])) {
            // Si el apellido se proporciona, concatenarlo con el nombre
            $nombreCompleto = $datosUsuario['nombre'] . ' ' . $datosUsuario['apellido'];
        } else {
            $nombreCompleto = $datosUsuario['nombre'];
        }
        // Crear un objeto Usuario con los datos recibidos
        $nuevoUsuario = new Usuario(
            null,
            $nombreCompleto,
            $datosUsuario['email'],
            $datosUsuario['contrasena'],
            $datosUsuario['direccion'],
            $datosUsuario['provincia'],
            $datosUsuario['postal'],
            $datosUsuario['telefono'],
            null,
            null,
            $datosUsuario['admin']
        );

        // Llamar al método insertarUsuario del modelo
        $resultado = $usuarioModel->insertarUsuario($nuevoUsuario);

        if ($resultado) {
            echo "<script> window.location.href = '/ecommerce/Vista/User/pages/inicio.php'; alert('Operación exitosa');</script>";
            exit();
        } else {
            echo "<script>alert('Error al registrarte'); window.location.href = '/ecommerce/Vista/User/pages/registro.php';</script>";
            exit();
        }
    }

    //header("Location: ecommerce/Vista/User/pages/inicio.php");
    //header("Location: ecommerce/Vista/User/pages/registro.php");
    
    //SHOW
    public function mostrarDetallesUsuario($idUsuario)
    {
        // Crear una instancia del modelo
        $usuarioModel = new Usuario();

        // Llamar al método para obtener el registro por ID
        $registro = $usuarioModel->obtenerRegistroPorId($idUsuario);

        if ($registro) {
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
            echo "<script>alert('Operación exitosa(registro optenido)');</script>";
            return $usuarios;
            exit();
        } else {
            echo "<script>alert('Operación invalida(optener registro)');</script>";
            return false;
            exit();
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
                echo "<script>alert('Operación exitosa(Los datos del usuario se actualizaron correctamente)');</script>";
                exit();
            } else {
                echo "<script>alert('Operación invalida(Error al actualizar los datos del usuario)');</script>";
            }

            return $actualizacionExitosa;
        } else {

            return false;
        }
    }


    // Función para eliminar un usuario
    public function eliminarUsuario($idUsuario)
    {
        $usuarioModel = new Usuario();
        $result = $usuarioModel->eliminarUsuario($idUsuario);

        // Verificar si la eliminación fue exitosa
        if ($result) {
            return "El usuario fue eliminado exitosamente.";
        } else {
            return "Error al eliminar el usuario.";
        }
    }
}
