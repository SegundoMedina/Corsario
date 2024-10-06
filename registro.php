<style type="text/css">
body,td,th {
	font-size: 18px;
	color: #FFF;
}
body {
	background-image: url(imagenes/viajero%20%20feliz%20brazos%20arriba%20logra%20llegar%20a%20%20exoplaneta%20%20en%20nave%20espacial%20.jpg);
}
</style>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'proyecto');

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Preparar la consulta de inserción del nuevo usuario
    $sql = $conn->prepare("INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)");
    $sql->bind_param('sss', $username, $email, $password);
    
    if ($sql->execute()) {
        // Mostrar el mensaje de registro exitoso con el botón de volver
        echo "<p>Usuario registrado correctamente.</p>";
        echo '<form action="index.php" method="get">';
        echo '  <button type="submit">Volver a la página principal</button>';
        echo '</form>';
    } else {
        // Mostrar mensaje de error si el registro falla
        echo "<p>Error al registrar el usuario. Inténtalo de nuevo.</p>";
        echo '<form action="registro.php" method="get">';
        echo '  <button type="submit">Volver al registro</button>';
        echo '</form>';
    }

    // Cerrar la conexión
    $conn->close();
}
?>
