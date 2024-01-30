<?php
require_once '../config/Conexion.php';

class OrdenProducto {
    private $id_ordenproducto;
    private $id_orden;
    private $id_producto;
    private $cantidad;
    private $precio_unitario;

    // Constructor
    public function __construct($id_ordenproducto, $id_orden, $id_producto, $cantidad, $precio_unitario) {
        $this->id_ordenproducto = $id_ordenproducto;
        $this->id_orden = $id_orden;
        $this->id_producto = $id_producto;
        $this->cantidad = $cantidad;
        $this->precio_unitario = $precio_unitario;
    }

    // Setters

    public function setIdOrdenProducto($id_ordenproducto) {
        $this->id_ordenproducto = $id_ordenproducto;
    }

    public function setIdOrden($id_orden) {
        $this->id_orden = $id_orden;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setPrecioUnitario($precio_unitario) {
        $this->precio_unitario = $precio_unitario;
    }

    // Getters

    public function getIdOrdenProducto() {
        return $this->id_ordenproducto;
    }

    public function getIdOrden() {
        return $this->id_orden;
    }

    public function getIdProducto() {
        return $this->id_producto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecioUnitario() {
        return $this->precio_unitario;
    }
}

?>
