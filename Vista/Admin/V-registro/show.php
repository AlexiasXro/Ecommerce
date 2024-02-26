<?php
require_once('c://xampp/htdocs/ecommerce/Vista/Admin/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');

if (isset($_GET['id'])) {
    // Obtén el ID de la URL
    $idUsuario = $_GET['id'];

    // verifica q sea un num
    if (!is_numeric($idUsuario) || $idUsuario <= 0) {
        echo "ID de usuario no válido.";
        exit();
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit();
}

// Crear una instancia del controlador
$usuarioController = new UsuarioController();

// Llamar a la función para obtener los detalles del usuario
$detallesUsuario = $usuarioController->mostrarDetallesUsuario($idUsuario);


?>
<div>
    <h3>Detalles del Registro</h3>
    <div class="pd-3">
        <a href="index.php" class="btn btn-primary">Regresar</a>
        <a href='edit.php?id=<?= $detallesUsuario['id_usuario'] ?>' class='btn btn-success'>Actualizar</a>
        <!-- Button trigger modal -->
        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalShow">Eliminar</a>

        <!-- Modal Show -->
        <div class="modal fade" id="exampleModalShow" tabindex="-1" aria-labelledby="exampleModalLabelShow" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="uniqueModalLabel">¿Desea eliminar el registro?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Una vez eliminado no se podra recuperar el Registro.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                        <a href="delete.php?id=<?= $detallesUsuario['id_usuario'] ?>" class="btn btn-danger">Eliminar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <table class="table table-bordered container-fluid">
            <thead>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Direccion</th>
                <th scope="col">Provincia</th>
                <th scope="col">Postal</th>
                <th scope="col">Contacto</th>
                <th scope="col">Fecha registrado</th>
                <th scope="col">Ultimo Acceso</th>
                <th scope="col">Administrador</th>
            </thead>
            <tbody>
                <?php
                if ($detallesUsuario !== false && is_array($detallesUsuario)) {
                    echo "<tr>";
                    echo "<td>" . $detallesUsuario['id_usuario'] . "</td>";
                    echo "<td>" . $detallesUsuario['nombre'] . "</td>";
                    echo "<td>" . ($detallesUsuario['email'] !== false ? $detallesUsuario['email'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesUsuario['contrasena'] !== false ? $detallesUsuario['contrasena'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesUsuario['direccion'] !== false ? $detallesUsuario['direccion'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesUsuario['provincia'] !== false ? $detallesUsuario['provincia'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesUsuario['postal'] !== false ? $detallesUsuario['postal'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesUsuario['telefono'] !== false ? $detallesUsuario['telefono'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesUsuario['fecha_registro'] !== false ? $detallesUsuario['fecha_registro'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesUsuario['ultimo_acceso'] !== false ? $detallesUsuario['ultimo_acceso'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesUsuario['admin'] == 1 ? 'Sí' : 'No') . "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='11'>Vacio</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</div>

<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/Admin/includes/footer.php');
?>