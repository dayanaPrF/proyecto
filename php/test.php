<?php
$servername = "localhost";
$username = "root";       
$password = "12345678a";  
$dbname = "paginaods";     

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); // Si hay error, muestra el mensaje de error
} else {
    echo "Conexión exitosa a la base de datos"; // Si no hay error, muestra este mensaje
}

$conn->close(); // Cerrar la conexión
?>
