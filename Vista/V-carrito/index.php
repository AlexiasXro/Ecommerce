<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('c://xampp/htdocs/ecommerce/Vista/includes/header.php');


// Agregar un producto al carrito
if(isset($_POST['agregar'])) {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    
    // Crear o actualizar el carrito en la sesión
    if(!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    
    $_SESSION['carrito'][$producto] = $cantidad;
}

// Eliminar un producto del carrito
if(isset($_GET['eliminar'])) {
    $producto = $_GET['eliminar'];
    unset($_SESSION['carrito'][$producto]);
}


?>

<div class="cart">
    <h2 class="cart-title">Carrito de Compras</h2>
    <!--Content-->
    <div class="cart-content">
    <?php
    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        foreach($_SESSION['carrito'] as $producto => $cantidad) {
            // Aquí puedes agregar cualquier diseño o estructura que desees para cada producto en el carrito
            echo "<div class='cart-item'>";
            echo "<span>$cantidad x $producto</span>";
            echo "<a href='controller.php?eliminar=$producto'>Eliminar</a>";
            echo "</div>";
        }
    } else {
        echo "<p>El carrito está vacío</p>";
    }
    ?>
    </div>

    <!-- Total -->
    <div class="total">
        <div class="total-title">Total</div>
        <!-- Aquí se mostrará el total calculado -->
        <div class="total-price">$0</div>
    </div>

    <!-- Botón para realizar la compra -->
    <form action="insertarOrdenproducto.php" method="post" class="OrdenProducto-form">
        <button type="submit" class="btn-buy" value="Comprar" name="Comprar">Comprar Ahora</button>
    </form>

    <!-- Botón para cerrar el carrito -->
    <i class="bx bx-x" id="close-cart"></i>
</div>
section class="shop container">
    <h2 class="section-title">Productos</h2>
    <!-- Content -->
    <div class="row">
        <!-- Box 1 -->
        <div class="col-md-4">
            <div class="card">
                <img src="../assets/img/imgP/9.png" class="card-img-top" alt="#">
                <div class="card-body">
                    <h5 class="card-title">Bota negro</h5>
                    <p class="card-text">$35.100</p>
                    <a href="#" class="btn btn-primary"><i class="bx bx-shopping-bag add-cart"></i> Añadir al carrito</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="../assets/img/imgP/9.png" class="card-img-top" alt="#">
                <div class="card-body">
                    <h5 class="card-title">Bota negro</h5>
                    <p class="card-text">$35.100</p>
                    <a href="#" class="btn btn-primary"><i class="bx bx-shopping-bag add-cart"></i> Añadir al carrito</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="../assets/img/imgP/9.png" class="card-img-top" alt="#">
                <div class="card-body">
                    <h5 class="card-title">Bota negro</h5>
                    <p class="card-text">$35.100</p>
                    <a href="#" class="btn btn-primary"><i class="bx bx-shopping-bag add-cart"></i> Añadir al carrito</a>
                </div>
            </div>
        </div>

        <!-- Agrega más productos similares con la misma estructura de tarjeta (card) -->
    </div>
</section>



<?php
// Incluye el pie de página
require_once('c://xampp/htdocs/ecommerce/Vista/includes/footer.php');
?>