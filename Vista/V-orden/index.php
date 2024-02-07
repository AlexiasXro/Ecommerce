<?php
// Incluye el encabezado y el menú
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/ordenCon.php');

// Crear una instancia del controlador
$ordenController = new OrdenCon();

// Llamar a la función para listar órdenes
$ordenes = $ordenController->listarOrdenes();

// Mostrar mensaje de éxito
if (isset($_SESSION['mensaje'])) {
    echo '<div class="alert alert-success">' . $_SESSION['mensaje'] . '</div>';
    unset($_SESSION['mensaje']);  
}

?>

<h3>Lista de Órdenes</h3>
<div class="pd-3">
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <!--  otros botones  -->
</div>

<div class="container-fluid mt-3">
    <table class="table table-bordered container-fluid">
        <thead>
            <th scope="col">ID de Orden</th>
            <th scope="col">ID de Usuario</th>
            <th scope="col">ID de Producto</th>
            
            <th scope="col">Estado</th>
            <th scope="col">Fecha de Creación</th>
            <th scope="col" colspan="3">Acción</th>
        </thead>
        <tbody>
            <?php if (is_array($ordenes) && !empty($ordenes)) : ?>
                <?php foreach ($ordenes as $orden) : ?>
                    <tr>
                        <td><?= $orden['id_orden'] ?></td>
                        <td><?= $orden['id_usuario'] ?></td>
                        <td><?= $orden['id_producto'] ?></td>
                        
                        <td><?= $orden['estado'] ?></td>
                        <td><?= $orden['fecha_creacion'] ?></td>
                        <td colspan="3">
                            a href='show.php?id=<?= $orden['id'] ?>' class='btn btn-primary m-1'>Ver</a>
                            <a href='edit.php?id=<?= $orden['id'] ?>' class='btn btn-success m-1'>Actualizar</a>
                            <!-- Button trigger modal -->
                            <a href='delete.php?id=<?= $orden['id'] ?>' class='btn btn-danger m-1' data-bs-toggle="modal" data-bs-target="#exampleModalIndex">Eliminar</a>
                        </td>
                        <!-- Modal -->
                    <tr class="modal fade" id="exampleModalIndex" tabindex="-1" aria-labelledby="exampleModalLabelIndex" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="uniqueModalLabel">¿Desea eliminar la orden?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Una vez eliminado no se podrá recuperar la orden.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                    <a href="delete.php?id=<?= $orden['id'] ?>" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan='6' class="text-center">No hay ordenes</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>



<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>