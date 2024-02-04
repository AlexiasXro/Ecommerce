<?php
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');

// Crear una instancia del controlador
$usuarioController = new UsuarioController();

// Llamar a la función para listar usuarios
$usuarios = $usuarioController->listarUsuarios();



// Mostrar mensaje de éxito
if (isset($_SESSION['mensaje'])) {
    echo '<div class="alert alert-success">' . $_SESSION['mensaje'] . '</div>';
    unset($_SESSION['mensaje']);  // Limpiar la variable de sesión
}

?>

<h3>Lista de Usuarios</h3>
<div class="pd-3">
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <!--  otros botones  -->
</div>

<div class="container-fluid mt-3">
    <table class="table table-bordered container-fluid">
        <thead>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col" colspan="3">Accion</th>
        </thead>
        <tbody>
            <?php if (is_array($usuarios) && !empty($usuarios)) : ?>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= ($usuario['email'] !== false ? $usuario['email'] : 'Vacio') ?></td>
                        
                        <td colspan="3">
                                <a href='show.php?id=<?= $usuario['id'] ?>' class='btn btn-primary m-1'>Ver</a>
                                <a href='edit.php?id=<?= $usuario['id'] ?>' class='btn btn-success m-1'>Actualizar</a>
                                <!-- Button trigger modal -->
                                <a href='delete.php?id=<?= $usuario['id'] ?>' class='btn btn-danger m-1' data-bs-toggle="modal" data-bs-target="#exampleModalIndex">Eliminar</a>
                        </td>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalIndex" tabindex="-1" aria-labelledby="exampleModalLabelIndex" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="uniqueModalLabel">¿Desea eliminar el registro?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Una vez eliminado no se podrá recuperar el Registro.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                        <a href="delete.php?id=<?= $usuario['id'] ?>" class="btn btn-danger">Eliminar</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan='12' class="text-center">No hay registros</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>



<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>