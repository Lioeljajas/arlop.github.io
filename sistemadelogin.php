<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registros";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar que los campos no estén vacíos
if (empty($_POST['username']) || empty($_POST['password'])) {
    echo '<script>alert("Por favor, llene todos los campos."); window.location.href="login.html";</script>';
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

// Consultar la base de datos
$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($password, $user['password'])) {
        echo '<script>alert("Acceso Permitido :D"); window.location.href="ArLøpPaginaPrincipal.php";</script>';
    } else {
        echo '<script>alert("La contraseña no es correcta."); window.location.href="login.html";</script>';
    }
} else {
    echo '<script>alert("Usuario no encontrado."); window.location.href="login.php";</script>';
}

$stmt->close();
$conn->close();
?>
