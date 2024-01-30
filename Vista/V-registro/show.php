/SHOW/visualizar los detalles de cada registro
<?php

// Incluye el encabezado, menú y controlador.
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Vista/includes/menu.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');



if (isset($_GET['id'])) {
    // Obtén el ID de la URL
    $idUsuario = $_GET['id'];

    // Asegúrate de que $idUsuario sea un número entero válido antes de usarlo
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
<h2 class="text-center">Detalles del Registro</h2>
<div class="pd-3">
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <a href="edit.php?id=<?= $detallesUsuario[0] ?>" class="btn btn-success">Actualizar</a>
    <!-- Button trigger modal -->
    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminar el registro?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Una vez eliminado no se podra recuperar el Registro.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                    <a href="delete.php?id=<?= $detallesUsuario['id'] ?>"></a>
                    <button type="button" class="btn btn-danger">Eliminar</button>
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
                echo "<td>" . $detallesUsuario['id'] . "</td>";
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


<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>