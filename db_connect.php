<?php
$servername = "localhost";  // Servidor local
$username = "root";         // Usuario por defecto en XAMPP/WAMP
$password = "mysql";             // Sin contraseña por defecto en XAMPP
$database = "subscriber_portal";  // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}
?>
