<?php
// Definir la respuesta correcta
$respuesta_correcta = "C";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la respuesta seleccionada por el usuario
    $respuesta_seleccionada = $_POST['respuesta'];

    // Comprobar si la respuesta seleccionada es correcta
    if ($respuesta_seleccionada == $respuesta_correcta) {
        // Redirigir a la siguiente página
        header("Location: finish.php");
        exit(); // Asegurarse de que no se ejecute el resto del script
    } else {
        $mensaje = "Respuesta incorrecta. Vuelve a intentarlo Nuevamente ";
        $alert_class = "alert-danger";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    body {
	background-image: url(imagenes/agujero%20negro.jpg);
	background-repeat: no-repeat;
}
    body,td,th {
	color: #0F0;
	font-size: 24px;
}
    </style>
</head>
<body>


<table width="63%" border="0" align="center">
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td height="186" align="center"><img src="imagenes/9.jpg" width="252" height="276"></td>
      </tr>
      <tr>
        <td width="85%" height="135" align="center"><h2> Sí el rádio del planeta es 1.03<br>
        ¿Qué tipo de planeta es TOI-332 b?</h2></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><div class="container mt-5">

      <!-- Formulario para enviar la respuesta -->
      <form method="post" action="siguiente_pagina_2.php">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="respuesta" value="A" id="respuestaA">
          <label class="form-check-label" for="respuestaA">A)SUPER TIERR</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="respuesta" value="B" id="respuestaB">
          <label class="form-check-label" for="respuestaB">B) </label>
        NEPTUNIANO</div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="respuesta" value="C" id="respuestaC">
          <label class="form-check-label" for="respuestaC">C) TERRESTRE</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="respuesta" value="D" id="respuestaD">
          <label class="form-check-label" for="respuestaD">D) GIGANTE GASEOSO</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      <!-- Mostrar el mensaje después de enviar -->
      <?php
        if (isset($mensaje)) {
            echo "<div class='mt-3 alert $alert_class' role='alert'>$mensaje</div>";
        }
        ?>
    </div></td>
  </tr>
</table>

<!-- Enlace a Bootstrap JS y dependencias (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>