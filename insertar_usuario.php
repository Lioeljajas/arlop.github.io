<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registros";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibieron los datos
if (isset($_POST['nombre_completo']) && isset($_POST['correo']) && isset($_POST['nombre_usuario']) && isset($_POST['contrasena'])) {
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar si algún campo está vacío
    if (empty($nombre_completo) || empty($correo) || empty($nombre_usuario) || empty($contrasena)) {
        echo "<script>alert('Ingrese Todos los Datos Por Favor'); window.location.href = 'login.php';</script>";
    } else {
        // Preparar y ejecutar la consulta
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre_completo, correo, nombre_usuario, contrasena) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre_completo, $correo, $nombre_usuario, $contrasena);

        if ($stmt->execute()) {
            header("Location: ArLøpPaginaPrincipal.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    echo "<script>alert('Ingrese Todos los Datos Por Favor'); window.location.href = 'login.php';</script>";
}

$conn->close();
?>
