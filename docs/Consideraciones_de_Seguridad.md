# Consideraciones de Seguridad

## Manejo de contraseñas seguras:

### Recomendaciones para que los usuarios elijan contraseñas seguras:

Al crear contraseñas, se recomienda seguir estas pautas para garantizar la seguridad de las cuentas:

- Utilizar contraseñas largas y complejas que combinen letras mayúsculas y minúsculas, números y caracteres especiales.
- Evitar el uso de información personal fácilmente identificable, como nombres de mascotas, cumpleaños o nombres de familiares.
- No reutilizar contraseñas en múltiples cuentas.
- Actualizar regularmente las contraseñas y evitar almacenarlas en lugares no seguros, como archivos de texto sin cifrar o en correos electrónicos.

### Cifrado y almacenamiento seguro de contraseñas en la base de datos:

Para garantizar la seguridad de las contraseñas almacenadas en la base de datos, se siguen las siguientes prácticas:

- Utilizar funciones hash seguras, como password_hash(), para cifrar las contraseñas antes de almacenarlas en la base de datos.
- No almacenar las contraseñas en texto plano.

## Protección contra ataques de inyección de código:

### Uso de consultas preparadas o sanitización de datos para prevenir ataques de inyección SQL:

Al interactuar con la base de datos, utilize consultas preparadas o funciones de enlace de parámetros proporcionadas por las bibliotecas PDO (PHP Data Objects) para evitar ataques de inyección SQL. Por ejemplo:
1. Autor: Caceres Alejandra Romina
2. Fecha: Marzo 2024
3. Estado: Actual