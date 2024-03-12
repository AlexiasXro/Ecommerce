<?php
require_once('c://xampp/htdocs/ecommerce/Vista/User/components/header.php');
?>
<!--////////////////-->
        
            <!-- Segundo renglón del header -->
        
            <!-- Segundo navegador -->
            <nav class="navbar navbar-expand-md navbar-primary bg-subtlet">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-bs-toggle" href="#" id="caracteristicasDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-category-alt' ></i> Categoria
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="caracteristicasDropdown">
                                    <li><button class="dropdown-item">Zapatos</button></li>
                                    <li><button class="dropdown-item">Zapatillas</button></li>
                                    <li><button class="dropdown-item">Sandalias</button></li>
                                    <li><button class="dropdown-item">Botas</button></li>
                                    <li><button class="dropdown-item">Accesorios</button></li>
                                    <li><button class="dropdown-item">Sale</button></li>
                                    <li><button class="dropdown-item">2x1</button></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class='bx bx-user-circle' id=""></i> Usuario
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class='bx bx-message-rounded-detail' ></i> Contactanos
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-bs-toggle" href="#" id="filtrarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-filter'></i> Filtrar
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="filtrarDropdown">
                                    <li><button class="dropdown-item">Precio Menor</button></li>
                                    <li><button class="dropdown-item">Precio Mayor</button></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Icono del carrito -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class='bx bxs-cart'id="cart-icon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                 <!--Cart-->
                 <div class="cart">
                    <h2 class="cart-title">Compra</h2>
                    <form action="insertarOrdenproducto.php" method="post" class="OrdenProducto-form"></form>
                    <!--Content-->
                    <div class="cart-content">
        
                    </div>
        
                    <!-- Total -->
                    <div class="total">
                        <div class="total-title">Total</div>
                        <div class="total-price">$0</div>
                    </div>
        
                    <!-- Buy Button -->
                    <button type="button" class="btn-buy" value="Comprar" name="Comprar">Compra Ahora</button>
                    <!-- Cart Close -->
                    <i class="bx bx-x" id="close-cart"></i>
                </div>
            </nav>
            
    
        </header>
<!--////////////////-->
        
        <section class="faq-section background-radial-gradient">
            <div class="container faq-content">
                <h2>Preguntas frecuentes (FAQ)</h2><br>
                <div class="faq-item">
                    <h4>¿Como comprar desde la pagina de Abba Shoe?</h4>
                    <p>Respuesta: Para realizar una compra en Abba Shoe, simplemente sigue estos sencillos pasos haciendo <a href="../pages/comocomprar.html" class="enlace">click aqui</a></p>
                </div>
    
            <div class="faq-item">
                <h4>¿Cuáles son las políticas de envío de Abba Shoe?</h4>
                <p>Respuesta: En Abba Shoe ofrecemos envío estándar gratuito en pedidos superiores a $XX. Los tiempos de entrega varían según la ubicación,<br> 
                    pero generalmente oscilan entre X-X días laborables. También ofrecemos opciones de envío exprés por un cargo adicional.</p>
            </div>

            <div class="faq-item">
                <h4>¿Cómo puedo realizar un seguimiento de mi pedido?</h4>
                <p>Respuesta: Una vez que tu pedido haya sido enviado, recibirás un correo electrónico de confirmación con un número de seguimiento. <br>
                    Puedes utilizar este número para rastrear tu pedido en nuestra página web o en el sitio web del transportista.</p>
            </div>

            <div class="faq-item">
                <h4>¿Qué debo hacer si necesito cambiar o devolver un producto?</h4>
                <p>Respuesta: En Abba Shoe, aceptamos cambios y devoluciones dentro de los X días posteriores a la recepción del pedido.<br> Por favor, 
                    consulta nuestra <a href="#" class="enlace">política de devolución</a> en nuestra página web para obtener más detalles y seguir los pasos necesarios.</p>
            </div>

            <div class="faq-item">
                <h4>¿Cómo sé cuál es mi talla de calzado en Abba Shoe?</h4>
                <p>Respuesta: Te recomendamos que consultes nuestra <a href="#" class="enlace">guía de tallas</a> en la página del producto para encontrar la talla adecuada.<br> 
                    También puedes contactar a nuestro equipo de atención al cliente para obtener asistencia adicional.</p>
            </div>

            <div class="faq-item">
                <h4>¿Abba Shoe ofrece algún tipo de garantía en sus productos?</h4>
                <p>Respuesta: Sí, en Abba Shoe nos comprometemos a ofrecer productos de alta calidad. Todos nuestros productos están respaldados<br> por una garantía de satisfacción del X%.
                    Si no estás satisfecho con tu compra por cualquier motivo, <a href="#" class="enlace">contáctanos</a> y haremos todo lo posible para solucionarlo</p>
            </div>

            <div class="faq-item">
                <h4>¿Ofrecen descuentos para clientes recurrentes o para compras al por mayor?</h4>
                <p>Respuesta: Sí, en Abba Shoe valoramos a nuestros clientes recurrentes y a aquellos que realizan compras al por mayor. Por favor,<br> ponte en <a href="#" class="enlace">contacto</a> con nuestro equipo de 
                    ventas para obtener más información sobre descuentos y ofertas especiales.</p>
            </div>

            <div class="faq-item">
                <h4>¿Los productos de Abba Shoe son veganos o están fabricados de manera sostenible?</h4>
                <p>Respuesta: En Abba Shoe nos comprometemos a ofrecer una amplia gama de productos que se ajusten a diferentes preferencias y necesidades.<br> Algunos de nuestros productos son veganos y/o fabricados de manera sostenible.
                    Puedes encontrar más información sobre la composición de cada producto en la descripción del mismo en nuestra página web.</p>
            </div>

            <div class="faq-item">
                <h4>¿Cómo puedo contactar al servicio de atención al cliente de Abba Shoe?</h4>
                <p>Respuesta: Puedes contactar a nuestro equipo de atención al cliente a través de nuestro formulario de contacto en línea,<br> por correo electrónico a [correo electrónico de atención al cliente], o por teléfono al [número de teléfono de atención al cliente].
                    Estamos aquí para ayudarte con cualquier pregunta o inquietud que puedas tener.</p>
            </div>

            </div>
 <!--////////////////-->          


<!--footer-->
<?php
require_once('c://xampp/htdocs/ecommerce/Vista/User/components/footer.php');
?>