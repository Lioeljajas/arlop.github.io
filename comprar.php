<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instrumentos";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$seccion = $_POST['seccion'];
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

// Validar que la cantidad sea mayor que 0
if ($cantidad <= 0) {
    echo '<div class="message error">La cantidad debe ser mayor que 0.</div>';
    exit;
}

// Obtener la información del producto
$sql = "SELECT * FROM $seccion WHERE id = $id_producto";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $producto = $result->fetch_assoc();
    $nombre_producto = $producto['nombre']; // Nuevo: Obtener el nombre del producto
    $cantidadDisponible = $producto['cantidad'];
    $precio = $producto['precio'];

    // Verificar que haya suficiente cantidad
    if ($cantidad > $cantidadDisponible) {
        echo '<div class="message error">No hay suficiente cantidad disponible.</div>';
    } else {
        // Realizar la compra
        $nuevaCantidad = $cantidadDisponible - $cantidad;
        $updateSql = "UPDATE $seccion SET cantidad=$nuevaCantidad WHERE id=$id_producto";

        if ($conn->query($updateSql) === TRUE) {
            echo '<center><div class="ticket">';
            echo '<h2>Ticket del producto: </h2><p>' . $nombre_producto . '</p>'; // Modificación: Mostrar el nombre del producto
            echo '<p>Precio por unidad: $' . $precio . '</p>';
            echo '<p>Anterior Cantidad Disponible: ' . $cantidadDisponible . '</p>';
            echo '<p>Cantidad comprada: ' . $cantidad . '</p>';
            echo '<p>Total: $' . ($precio * $cantidad) . '</p>';
            echo '<button onclick="window.history.back()" style="border-radius: 20px;">Regresar a la página</button>';
            echo '</div></center>';
        } else {
            echo '<div class="message error">Hubo un error, inténtalo de nuevo.</div>';
        }
    }
} else {
    echo '<div class="message error">Producto no encontrado.</div>';
}

$conn->close();
?>

<style>
    .ticket {
    background-color: #f0f0f0;
    border: 1px;
    border-radius: 10px;
    padding: 20px;
    margin-top: 20px;
    width: 300px;
}

.ticket h2 {
    margin-top: 0;
    font-size: 40px;
}

.ticket p{
    font-family: fantasy;
    font-size: 20px;
}

.ticket button {
    margin-top: 10px;
    border-color: #000;
    background-color: #B8B8B8;
    font-family: cursive;
    font-size: 20px;
    width: 200px;
    height: 90px;
    border-radius: 20px;
}

.ticket button:hover{
    background-color: #fff;
    transition: 0.3s ease-in-out;
    }
</style>