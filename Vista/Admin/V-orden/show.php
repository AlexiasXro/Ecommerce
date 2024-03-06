<?php
require_once('c://xampp/htdocs/ecommerce/Controlador/OrdenCon.php');

if (isset($_GET['id'])) {
    // Obtén el ID de la URL
    $idOrden = $_GET['id'];

    // verifica que sea un número válido
    if (!is_numeric($idOrden) || $idOrden <= 0) {
        echo "ID de orden no válido.";
        exit();
    }
} else {
    echo "ID de orden no proporcionado.";
    exit();
}

// Crear una instancia del controlador
$ordenController = new Orden();

// Llamar a la función para obtener los detalles de la orden
$detallesOrden = $ordenController->obtenerOrdenPorId($idOrden);

?>
<div>
    <h3>Detalles del Registro</h3>
    <div class="pd-3">
        <a href="index.php" class="btn btn-primary">Regresar</a>
        <a href='edit.php?id=<?= $detallesOrden['id_orden'] ?>' class='btn btn-success'>Actualizar</a>
        <!-- Button trigger modal -->
        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalShow">Eliminar</a>

        <!-- Modal Show -->
        <div class="modal fade" id="exampleModalShow" tabindex="-1" aria-labelledby="exampleModalLabelShow" aria-hidden="true">
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
                        <a href="delete.php?id=<?= $detallesOrden['id_orden'] ?>" class="btn btn-danger">Eliminar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <table class="table table-bordered container-fluid">
            <thead>
                <th scope="col">ID de Orden</th>
                <th scope="col">ID de Usuario</th>
                <th scope="col">ID de Producto</th>
                
                <th scope="col">Estado</th>
                <th scope="col">Fecha de Creación</th>
            </thead>
            <tbody>
                <?php
                if ($detallesOrden !== false) {
                    echo "<tr>";
                    echo "<td>" . $detallesOrden['id_orden'] . "</td>";
                    echo "<td>" . $detallesOrden['id_usuario'] . "</td>";
                    echo "<td>" . $detallesOrden['id_producto'] . "</td>";
                    
                    echo "<td>" . $detallesOrden['estado'] . "</td>";
                    echo "<td>" . $detallesOrden['fecha_creacion'] . "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='6'>Vacio</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>
