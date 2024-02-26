<?php
require_once('c://xampp/htdocs/ecommerce/Vista/Admin/includes/header.php');
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
            echo "Error al actualizar los datos. Detalles: No hay detalles disponibles.";
        }
    }
}
?>

<h3>Modificando Registro</h3>
<form action="update.php?id=<?= $idUsuario ?>" method="post" autocomplete="off">
    
    <div class="pd-3">
        <a href="index.php" class="btn btn-primary">Regresar</a>
        <!-- new -->
    </div>
    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
            <input type="text" name="id_usuario" class="form-control" id="id" value="<?= $detallesUsuario['id_usuario'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nombre" class="col-sm-2 col-form-label">Nuevo Nombre:</label>
        <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $detallesUsuario['nombre'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Nuevo Email:</label>
    <div class="col-sm-10">
        <input type="text" name="email" class="form-control" id="email" value="<?= $detallesUsuario['email'] ?>">
    </div>
</div>

<div class="mb-3 row">
    <label for="contrasena" class="col-sm-2 col-form-label">Nueva Contraseña:</label>
    <div class="col-sm-10">
        <input type="password" name="contrasena" class="form-control" id="contrasena">
    </div>
</div>

<div class="mb-3 row">
    <label for="direccion" class="col-sm-2 col-form-label">Nueva Dirección:</label>
    <div class="col-sm-10">
        <input type="text" name="direccion" class="form-control" id="direccion" value="<?= $detallesUsuario['direccion'] ?>">
    </div>
</div>

<div class="mb-3 row">
    <label for="provincia" class="col-sm-2 col-form-label">Nueva Provincia:</label>
    <div class="col-sm-10">
        <input type="text" name="provincia" class="form-control" id="provincia" value="<?= $detallesUsuario['provincia'] ?>">
    </div>
</div>

<div class="mb-3 row">
    <label for="postal" class="col-sm-2 col-form-label">Nuevo Código Postal:</label>
    <div class="col-sm-10">
        <input type="text" name="postal" class="form-control" id="postal" value="<?= $detallesUsuario['postal'] ?>">
    </div>
</div>

<div class="mb-3 row">
    <label for="telefono" class="col-sm-2 col-form-label">Nuevo Teléfono:</label>
    <div class="col-sm-10">
        <input type="text" name="telefono" class="form-control" id="telefono" value="<?= $detallesUsuario['telefono'] ?>">
    </div>
</div>
    <!-- Agrega los demás campos aquí -->
    <input type="submit" class="btn btn-success" value="Actualizar">
    <a href="show.php?id=<?= $idUsuario ?>" class="btn btn-danger">Cancelar</a>
</form>

<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/Admin/includes/footer.php');
?>
