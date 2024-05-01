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

// Obtener los datos de la tarjeta del formulario
$numero = $_POST['cardNumber'];
$titular = $_POST['cardHolder'];
$vencimiento = $_POST['expirationDate'];
$cvv = $_POST['cvv'];

// Preparar y ejecutar la consulta SQL para insertar los datos en la base de datos
$sql = "INSERT INTO tarjetas (numero, titular, vencimiento, cvv) VALUES ('$numero', '$titular', '$vencimiento', '$cvv')";

if ($conn->query($sql) === TRUE) {
    echo "La información de la tarjeta se ha guardado correctamente.";
} else {
    echo "Error al guardar la información de la tarjeta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
