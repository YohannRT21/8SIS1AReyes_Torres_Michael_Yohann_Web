<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "14022003";
$dbname = "examen";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del producto del formulario
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];

// Preparar y ejecutar la consulta SQL para insertar el producto en la base de datos
$sql = "INSERT INTO productos (nombre, precio, imagen) VALUES ('$nombre', '$precio', '$imagen')";

if ($conn->query($sql) === TRUE) {
    echo "El producto se ha guardado correctamente.";
} else {
    echo "Error al guardar el producto: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
