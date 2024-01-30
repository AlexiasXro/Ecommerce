<?php
require_once '../config/Conexion.php';

    class Orden {
        private $id_orden;
        private $id_usuario;
        private $fecha_creacion;

        // Constructor
        public function __construct($id_orden, $id_usuario, $fecha_creacion) {
            $this->id_orden = $id_orden;
            $this->id_usuario = $id_usuario;
            $this->fecha_creacion = $fecha_creacion;
        }

        // Setters

        public function setIdOrden($id_orden) {
            $this->id_orden = $id_orden;
        }

        public function setIdUsuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }

        public function setFechaCreacion($fecha_creacion) {
            $this->fecha_creacion = $fecha_creacion;
        }

        // Getters

        public function getIdOrden() {
            return $this->id_orden;
        }

        public function getIdUsuario() {
            return $this->id_usuario;
        }

        public function getFechaCreacion() {
            return $this->fecha_creacion;
        }
    }

?>
