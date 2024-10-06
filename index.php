<?php
session_start();

// Si el usuario ya ha iniciado sesión, redirigir a la página de inicio
if (isset($_SESSION['username'])) {
    header("Location: home_usuario.php");
    exit();
}

// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Iniciar como usuario anónimo
    if (isset($_POST['anon'])) {
        $_SESSION['username'] = "Sherlock" . rand(1000, 9999);
        header("Location: home_usuario.php");
        exit();
    } 
    // Iniciar con nombre personalizado
    elseif (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $_SESSION['username'] = htmlspecialchars($_POST['nombre']);
        header("Location: home_usuario.php");
        exit();
    }
    // Verificar si es un login de usuario registrado
    elseif (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Conexión a la base de datos
        $conn = new mysqli('localhost', 'root', '', 'proyecto');

        // Verificar conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Preparar y ejecutar la consulta para obtener el usuario
        $sql = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
        $sql->bind_param('s', $username);
        $sql->execute();
        $result = $sql->get_result();
        $user = $result->fetch_assoc();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: home_usuario.php");
            exit();
        } else {
            echo "<p>Usuario o contraseña incorrectos</p>";
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos a Corsario</title>
    <link rel="stylesheet" href="css/styles.css">
    <style type="text/css">
    body {
	background-image: url(imagenes/astronauta%20persigue%20a%20un%20ladron%20%20espacial%20%20que%20salgan%20los%20dos%20en%20la%20imagen%20deben%20usar%20trajes%20diferentes%20infantil.jpg);
	background-repeat: no-repeat;
}
    body,td,th {
	color: #FFF;
	font-size: 24px;
}
/* Clase CSS para botón grande con colores de la NASA */
.boton-nasa {
    width: 12%; /* El botón ocupará el 12% del ancho de la página */
    padding: 15px 30px; /* Aumenta el tamaño del botón */
    background-color: #0b3d91; /* Azul oscuro NASA */
    color: #ffffff; /* Texto blanco */
    border: none; /* Sin borde */
    border-radius: 5px; /* Bordes redondeados */
    font-size: 1.5rem; /* Tamaño de fuente grande */
    font-weight: bold; /* Texto en negrita */
    cursor: pointer; /* Cambia el cursor al pasar por encima */
    transition: background-color 0.3s ease; /* Suaviza el cambio de color en hover */
}

#logonasa {
    position: fixed;
    top: 10%;  /* Posiciona el div al 10% desde la parte superior */
    left: 40%;  /* Alinea el div a la derecha, con un margen de 20px */
    margin-right: 10px;  /* Añade espaciado desde el borde derecho (si es necesario) */
    z-index: 100;  /* Asegura que el div esté por encima de otros elementos */
    opacity: 0.8;  /* Le da un 80% de opacidad (20% transparente) */
    transition: opacity 0.3s ease;  /* Suaviza el cambio de opacidad */
}

#logonasa:hover {
    opacity: 1;  /* Opacidad completa al pasar el cursor por encima */
}




/* Estilo para el hover */
.boton-nasa:hover {
    background-color: #00539f; /* Azul más claro al hacer hover */
}
/* Clase CSS para botón grande con colores de la NASA */
.TITULO {
	width: 12%; /* El botón ocupará el 12% del ancho de la página */
	padding: 15px 30px; /* Azul oscuro NASA */
	color: #FFFF00; /* Texto blanco */
	border: none; /* Sin borde */
	border-radius: 5px; /* Bordes redondeados */
	font-size: 24px; /* Tamaño de fuente grande */
	font-weight: bold; /* Texto en negrita */
	cursor: pointer; /* Cambia el cursor al pasar por encima */
	transition: background-color 0.3s ease; /* Suaviza el cambio de color en hover */
	font-family: "Arial Black", Gadget, sans-serif;
}

.TITULO2222 {
	color: #00FFCC; /* Texto blanco */
	border: none; /* Sin borde */
	border-radius: 5px; /* Bordes redondeados */
	font-size: 36px; /* Tamaño de fuente grande */
	font-weight: bold; /* Texto en negrita */
	cursor: pointer; /* Cambia el cursor al pasar por encima */
	font-family: "Arial Black", Gadget, sans-serif;
	padding: 15px;
}

    </style>
</head>
<body>
<table width="200" border="0" align="right">
  <tr>
    <td><img src="imagenes/logo.jpg" width="170" height="163" style="opacity: 0.8"></td>

  </tr>
</table>





<label class="TITULO"><br>
VISITA A CORSARIO EN VIVO Y EN EXCLUSIVO PARA<br>
NASA APP CHALLENGE EN <span class="TITULO2222">http://10.0.0.232/</span> </label>

<h1>Bienvenidos a Corsario.</h1>

<form method="POST">
    <div>
      <button type="submit" name="anon">Jugar como Anónimo</button>
        <br><br>
        <label for="nombre">Jugar con tu nombre:</label><br>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
        <br>
        <button type="submit">Iniciar Juego</button>
    </div>
</form>

<div>
  <h2>Iniciar sesión</h2>
    <form method="POST">
        <label for="username">Nombre de usuario:</label><br>
        <input type="text" id="username" name="username" placeholder="Nombre de usuario" required><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit" name="login">Iniciar Sesión</button>
    </form>
</div>

<div>
    <h2>¿Nuevo aquí? Regístrate</h2>
    <form action="registro.php" method="POST">
        <input type="text" name="username" placeholder="Nombre de usuario" required><br>
        <input type="email" name="email" placeholder="Correo electrónico" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Registrarse</button>
    </form>
</div>

</body>
</html>
