<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos no están vacíos
    if (!empty($_POST["Nombre"]) && !empty($_POST["Usuario"]) && !empty($_POST["Contraseña"])) {
        // Recuperar los datos del formulario
        $nombre = $_POST["Nombre"];
        $usuario = $_POST["Usuario"];
        $contraseña = $_POST["Contraseña"];

        // Conectar a la base de datos
        $servername = "localhost"; // Cambia esto por la dirección de tu servidor MySQL
        $username = "root"; // Cambia esto por tu nombre de usuario de MySQL
        $password = "14022003"; // Cambia esto por tu contraseña de MySQL
        $database = "examen"; // Nombre de tu base de datos

        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Preparar la consulta SQL para insertar los datos en la tabla Usuarios
        $sql = "INSERT INTO USUARIOS (Nombre_Completo, USUARIO, Contraseña) VALUES (?, ?, ?)";

        // Preparar la declaración
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $usuario, $contraseña);

        // Ejecutar la consulta SQL
        if ($stmt->execute()) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }

        // Cerrar la conexión
        $conn->close();
    } else {
        // Si los campos están vacíos, mostrar un mensaje de error
        echo "Por favor, complete todos los campos.";
    }
}
?>
