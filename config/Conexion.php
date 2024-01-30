<?php

define("DB_TYPE", "mysql");
define("DB_NAME", "zapateria");
define("DB_HOST", "127.0.0.1");

define("DB_USER", "root");
define("DB_PWD", "");

class Conexion {
    private static $pdo;

    public static function conectar() {
        if (!isset(self::$pdo)) {
            try {
                $dsn = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
                self::$pdo = new PDO($dsn, DB_USER, DB_PWD);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}

/*diseño Singleton Pattern:(evita sobrecarga de conecciones)
garantiza que solo hay una instancia de la conexión
a la base de datos en toda la aplicación.
*/
?>