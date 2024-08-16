<?php
$servername = "dbmysqlplantachao.mysql.database.azure.com";
$username = "peoicongegen";
$password = "2d2dfrenT-";
$dbname = "plantachao";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibieron los valores
if (isset($_POST['temp']) && isset($_POST['camara'])) {
    $temp = $_POST['temp'];
    $camara = $_POST['camara'];
    
    // Insertar el dato en la base de datos
    $sql = "INSERT INTO temperaturas (temperatura, creado, camara) VALUES ('$temp', NOW(), '$camara')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No se recibieron los datos requeridos";
}

$conn->close();
?>