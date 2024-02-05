<?php
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');
require_once('c://xampp/htdocs/ecommerce/Controlador/productoCon.php');

if (isset($_GET['id_producto'])) {
    $idProducto = $_GET['id_producto']; // Obtén el ID de la URL
    if (!is_numeric($idProducto) || $idProducto <= 0) {
        echo "ID de producto no válido.";
        exit();
    }
} else {
    echo "ID de producto no proporcionado.";
    exit();
}

$productoCon = new ProductoCon();
$detallesProductos = $productoCon->mostrarDetallesProducto($idProducto);

if (isset($_SESSION['mensaje'])) {
    echo '<div class="alert alert-success">' . $_SESSION['mensaje'] . '</div>';
    unset($_SESSION['mensaje']); 
}
?>
<div>
    <h3>Detalles de Producto</h3>
    <div class="pd-3">
        <a href="index.php" class="btn btn-primary">Regresar</a>
        <a href='edit.php?id=<?= $detallesProducto['id_producto'] ?>' class='btn btn-success'>Actualizar</a>
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
                        <a href="delete.php?id=<?= $detallesProducto['id_producto'] ?>" class="btn btn-danger">Eliminar</a>

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
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Imagen Url</th>
                <th scope="col">stock</th>
                <th scope="col">Fecha de creacion</th>
                <!--7-->
            </thead>
            <tbody>
                <?php
                if ($detallesProductos !== false && is_array($detallesProductos)) {
                    echo "<tr>";
                    echo "<td>" . $detallesProductos['id'] . "</td>";
                    echo "<td>" . $detallesProductos['nombre'] . "</td>";
                    echo "<td>" . ($detallesProductos['descripcion'] !== false ? $detallesProductos['descripcion'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesProductos['precio'] !== false ? $detallesProductos['precio'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesProductos['imagen_url'] !== false ? $detallesProductos['imagen_url'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesProductos['stock'] !== false ? $detallesProductos['stock'] : 'Vacio') . "</td>";
                    echo "<td>" . ($detallesProductos['fecha_creacion'] !== false ? $detallesProductos['fecha_creacion'] : 'Vacio') . "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='7'>No hay productos</td></tr>";
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