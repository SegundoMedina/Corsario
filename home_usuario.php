<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Usuario</title>
<style type="text/css">
body {
	background-image: url(imagenes/MALOO.jpg);
	background-repeat: no-repeat;
}
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

/* Estilo para el hover */
.boton-nasa:hover {
    background-color: #00539f; /* Azul más claro al hacer hover */
}

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
.TITULO {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 36px;
	color: #FFF;
}
.info-box {
	background-color: #FFFFFF; /* Fondo blanco */
	border: 2px solid #0B3D91; /* Borde azul oscuro */
	border-radius: 8px; /* Bordes redondeados */
	padding: 20px; /* Espaciado interno */
	color: #4C5866; /* Texto en gris oscuro */
	font-family: 'Arial', sans-serif; /* Fuente limpia y legible */
	width: auto; /* Ancho del cuadro */
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra ligera */
	font-size: 16px;
}

.info-box h2 {
    color: #0B3D91; /* Azul oscuro para títulos */
    font-size: 1.5em;
    margin-bottom: 10px;
}

.info-box p {
    font-size: 1em;
    line-height: 1.5;
}

.info-box .highlight {
    color: #FC3D21; /* Rojo para resaltar */
    font-weight: bold;
}

.info-box a {
    color: #4B9CD3; /* Azul claro para enlaces */
    text-decoration: none;
}

.info-box a:hover {
    color: #FC3D21; /* Rojo en hover para enlaces */
    text-decoration: underline;
}


</style>
</head>
<body>
<form method="POST">
<table width="100%" border="0">
  <tr>
    <td width="91%" align="center" class="TITULO">Bienvenido, <?php echo $_SESSION['username']; ?>!</td>
    <td width="9%">
  <button type="submit" name="logout" class="">Cerrar Sesión</button></td>
  </tr>
  <tr>
    <td height="744" align="left"><table width="997" height="117" border="0">
      <tr>
        <td width="614" align="center">    <a href="quiz.php" class="boton-nasa">VAMOS POR UNA NUEVA AVENTURA!</a></td>
      </tr>
      <tr>
        <td align="center"><table width="70%" height="53" border="0" class="info-box">
          <tr>
            <td width="620"><strong>Sabias que: </strong><br>
              <br>
              1.	La ultima letra del nombre del EXOPLANETA  te indica el orden en que descubrieron el planeta dentro de su sistema solar , el primero parte con la B y continua según el alfabeto, ejemplo: TOI-332 b,  es el primer planeta descubiero dentro de ese sistema solar<br>
              <br>
              2.	Tipo de pLaneta	rango de Radio <br>
              <br>
terreste	0 al 4 <br>
neptuno	4 al 7 <br>
Super tierra	&gt;7 <br>
<br>
<br>
3.	Formula para conocer cuantos días demoraría la tierra en dar vuelta al EXOPLANETA <br>
<br>
Días de orbita la tierra al sol\Días de obtita el Exoplaneta a su estrella</td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td align="center">&nbsp;</td>
  </tr>
  </table>


</form>

</body>
</html>
