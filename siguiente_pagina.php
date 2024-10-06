<?php
// Definir la respuesta correcta
$respuesta_correcta = "B";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la respuesta seleccionada por el usuario
    $respuesta_seleccionada = $_POST['respuesta'];

    // Comprobar si la respuesta seleccionada es correcta
    if ($respuesta_seleccionada == $respuesta_correcta) {
        // Redirigir a la siguiente página
        header("Location: siguiente_pagina_2.php");
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
	background-image: url(imagenes/estrella%20azul%20espacio%20real_.jpg);
	background-repeat: no-repeat;
}
    body,td,th {
	color: #FF0;
	font-size: 24px;
}
    </style>
</head>
<body>
<table width="100%" height="280" border="0">
  <tr>
    <td height="274" align="center"><table width="41%" border="0">
      <tr>
        <td width="521" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td height="82" align="center" valign="top"><img src="imagenes/1.jpg" width="156" height="176"></td>
      </tr>
      <tr>
        <td align="center"><div class="container mt-5">
          <h2>¿Cuantos dias demoraria la tierra en orbitar a este exoplaneta si su orbita es de 2.753?</h2>
          <h3>Planeta: NGTS-10 b</h3>
          <!-- Formulario para enviar la respuesta -->
          <form method="post" action="siguiente_pagina.php">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="respuesta" value="A" id="respuestaA">
              <label class="form-check-label" for="respuestaA">A) 500</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="respuesta" value="B" id="respuestaB">
              <label class="form-check-label" for="respuestaB">B) 133</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="respuesta" value="C" id="respuestaC">
              <label class="form-check-label" for="respuestaC">C) 200</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="respuesta" value="D" id="respuestaD">
              <label class="form-check-label" for="respuestaD">D) 150</label></div>
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
    </table></td>
  </tr>
</table>

<!-- Enlace a Bootstrap JS y dependencias (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>