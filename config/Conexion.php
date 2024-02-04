<?php

define("DB_TYPE", "mysql");
define("DB_NAME", "zapateria");
define("DB_HOST", "127.0.0.1");

define("DB_USER", "root");
define("DB_PWD", "");

class Conexion
{
    private static $pdo;

    public static function conectar()
    {
        if (!isset(self::$pdo)) {
            try {
                $dsn = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
                self::$pdo = new PDO($dsn, DB_USER, DB_PWD);
                
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                error_log("Error de conexión a la base de datos: " . $e->getMessage());
                error_log("DB_TYPE: " . DB_TYPE . ", DB_HOST: " . DB_HOST . ", DB_NAME: " . DB_NAME);
                error_log("DB_USER: " . DB_USER);
                die("Error de conexión a la base de datos.");
            }
        }
        return self::$pdo;
    }
}

#Este patrón asegura que solo haya una instancia de la conexión
# a la base de datos durante toda la ejecución del programa.
/*diseño Singleton Pattern:(evita sobrecarga de conecciones)
garantiza que solo hay una instancia de la conexión
a la base de datos en toda la aplicación.
*/
?>