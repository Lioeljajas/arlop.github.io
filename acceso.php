<?php
session_start();

$servername = "localhost";
$username = "root"; // Cambia esto si tienes un nombre de usuario diferente
$password = ""; // Cambia esto si tienes una contraseña diferente
$dbname = "registros";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre_usuario = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];

// Buscar el usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // El usuario fue encontrado, verificar la contraseña
    $row = $result->fetch_assoc();
    if (password_verify($contrasena, $row['contrasena'])) {
        // Contraseña correcta, iniciar sesión
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        header("Location: ArLøpPagina Principal.php");
        exit();
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta.";
        header("Location: login.php");
    }
} else {
    // Usuario no encontrado
    echo "Usuario no encontrado.";
    header("Location: login.php");
}

// Cerrar conexión
$conn->close();
?>
