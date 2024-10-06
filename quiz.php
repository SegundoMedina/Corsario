<?php
// Definir la respuesta correcta
$respuesta_correcta = "A";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la respuesta seleccionada por el usuario
    $respuesta_seleccionada = $_POST['respuesta'];

    // Comprobar si la respuesta seleccionada es correcta
    if ($respuesta_seleccionada == $respuesta_correcta) {
        // Redirigir a la siguiente página
        header("Location: siguiente_pagina.php");
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
    body,td,th {
	color: #FFF;
	font-size: 24px;
}
body {
	background-image: url(imagenes/nebulosa_.jpg);
	background-repeat: no-repeat;
}
    </style>
</head>
<body>
<table width="100%" border="0" align="center">
  <tr>
    <td height="58" colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><table width="751">
      <tr>
        <td><img src="imagenes/9.jpg" width="156" height="159"></td>
        <td><h2> ¿Cuál es el orden de descubrimiento de este planeta?</h2>
          <h3>Planeta: LP 791-18 d</h3></td>
      </tr>
    </table></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="257" colspan="2" align="center"><table width="397" border="0">
      <tr>
        <td width="387" align="center"><div class="container mt-5">
      
          <form method="post" action="quiz.php">
          <div class="form-check">
              <input class="form-check-input" type="radio" name="respuesta" value="A" id="respuestaA">
              <label class="form-check-label" for="respuestaA">A) 3</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="respuesta" value="B" id="respuestaB">
              <label class="form-check-label" for="respuestaB">B) 1</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="respuesta" value="C" id="respuestaC">
              <label class="form-check-label" for="respuestaC">C) 2</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="respuesta" value="D" id="respuestaD">
              <label class="form-check-label" for="respuestaD">D) 4</label>
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
    </table></td>
  </tr>
  <tr>
    <td height="69" colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

<!-- Enlace a Bootstrap JS y dependencias (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>