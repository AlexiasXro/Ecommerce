<?php
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/productoCon.php');

// Crear una instancia del controlador
$productoCon = new ProductoCon();

// Llamar a la función para listar productos
$productos = $productoCon->listarProducto();



// Mostrar mensaje de éxito
if (isset($_SESSION['mensaje'])) {
    echo '<div class="alert alert-success">' . $_SESSION['mensaje'] . '</div>';
    unset($_SESSION['mensaje']);  
}

?>

<h3>Lista de Productos</h3>
<div class="pd-3">
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <!--  otros botones  -->
</div>

<div class="container-fluid mt-3">
    <table class="table table-bordered container-fluid">
        <thead>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">stock</th>
            <th scope="col" colspan="3">Accion</th>
        </thead>
        <tbody>
            <?php if (is_array($productos) && !empty($productos)) : ?>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?= $producto['id_producto'] ?></td>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['precio'] ?></td>
                        <td><?= $producto['stock'] ?></td>


                        <td colspan="3">
                            <a href='show.php?id=<?= $producto['id_producto'] ?>' class='btn btn-primary m-1'>Ver</a>
                            <a href='edit.php?id=<?= $producto['id_producto'] ?>' class='btn btn-success m-1'>Actualizar</a>
                            <!-- Button trigger modal -->
                            <a href='delete.php?id=<?= $producto['id_producto'] ?>' class='btn btn-danger m-1' data-bs-toggle="modal" data-bs-target="#exampleModalIndex">Eliminar</a>
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
                                        Una vez eliminado no se podrá recuperar el Producto.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                        <a href="delete.php?id=<?= $producto['id_producto'] ?>" class="btn btn-danger">Eliminar</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan='6' class="text-center">No hay productos</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>



<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>