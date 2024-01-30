V-REGISTRO/INDEX/lista los usuarios
<?php
// Incluye el encabezado, menú y controlador.
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Vista/includes/menu.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/usuarioCon.php');

// Crear una instancia del controlador
$usuarioController = new UsuarioController();

// Llamar a la función para listar usuarios
$usuarios = $usuarioController->listarUsuarios();

?>

<h2 class="text-center">Lista de Usuarios</h2>
<div class="pd-3">
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <!-- Puedes añadir otros botones según sea necesario -->

</div>

<div class="container-fluid mt-3">
    <table class="table table-bordered container-fluid">
        <thead>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Fecha registrado</th>
            <th scope="col">Ultimo Acceso</th>
            <th scope="col">Administrador</th>
            <th scope="col">Accion</th>
        </thead>
        <tbody>
            <?php if (is_array($usuarios) && !empty($usuarios)) : ?>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= ($usuario['email'] !== false ? $usuario['email'] : 'Vacio') ?></td>
                        <td><?= ($usuario['fecha_registro'] !== false ? $usuario['fecha_registro'] : 'Vacio') ?></td>
                        <td><?= ($usuario['ultimo_acceso'] !== false ? $usuario['ultimo_acceso'] : 'Vacio') ?></td>
                        <td><?= ($usuario['admin'] == 1 ? 'Sí' : 'No') ?></td>
                        <!-- acciones adicionales -->
                        <td><a href='show.php?id=<?= $usuario['id'] ?>' class='btn btn-primary'>Ver</a></td>
                        <td><a href='edit.php?id=<?= $usuario['id'] ?>' class='btn btn-success'>Actualizar</a></td>
                        <!-- Button trigger modal -->
                        <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a></td>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminar el registro?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Una vez eliminado no se podrá recuperar el Registro.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                        <a href="delete.php?id=<?= $usuario['id'] ?>"></a>
                                        <button type="button" class="btn btn-danger">Eliminar</button>
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

        <?php
        // Incluye el pie de página
        require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
        ?>