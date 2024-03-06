<?php
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');


if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    // Verifica y valida $idUsuario
} else {
    echo "ID de usuario no proporcionado.";
    exit();
}

// Crea una instancia del controlador de usuario
$usuarioController = new UsuarioController();

// Obtiene los detalles del usuario por ID
$detallesUsuario = $usuarioController->mostrarDetallesUsuario($idUsuario);


// Verifica si se obtuvieron los detalles del usuario
if ($detallesUsuario !== false) {
    // Verifica si se envió un formulario de actualización
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene los nuevos datos desde el formulario
        $nuevosDatos = [
            'nombre' => $_POST["nombre"],
            'email' => $_POST["email"],
            'contrasena' => $_POST["contrasena"],
            'direccion' => $_POST["direccion"],
            'provincia' => $_POST["provincia"],
            'postal' => $_POST["postal"],
            'telefono' => $_POST["telefono"],
            
        ];

        // Llama al método del controlador para editar el usuario
        $actualizacionExitosa = $usuarioController->editarUsuario($idUsuario, $nuevosDatos);

        if (!$actualizacionExitosa) {
            echo "Error al actualizar los datos.";
        }
    }
}
?>

<h3>Modificando orden</h3>
<form action="update.php?id=<?= $idUsuario ?>" method="post" autocomplete="off">

        <div class="mb-3">
            <label for="id_usuario" class="form-label">ID de Usuario</label>
            <input type="text" class="form-control" id="id_usuario" name="id_usuario" readonly placeholder="Automático">
        </div>

        <div class="mb-3">
            <label for="id_producto" class="form-label">ID de Producto</label>
            <input type="text" class="form-control" id="id_producto" name="id_producto" readonly placeholder="Automático">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado">
                <option value="Pendiente">Pendiente</option>
                <option value="En Proceso">En Proceso</option>
                <option value="Completada">Completada</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        </div>
    <!-- Agrega los demás campos aquí -->
    <input type="submit" class="btn btn-success" value="Actualizar">
    <a href="show.php?id=<?= $idOrden ?>" class="btn btn-danger">Cancelar</a>
</form>

<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>
