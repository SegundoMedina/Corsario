<?php
// Simulando una conexión a la base de datos
$host = 'localhost';
$db = 'proyecto';
$user = 'root';
$pass = '';

// Crear la conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener un planeta al azar
$query = "SELECT pl_name, pl_letter, discoverymethod, pl_rade, pl_masse, pl_orbpererr2 
          FROM principal 
          ORDER BY RAND() LIMIT 1";

$result = $conn->query($query);
$planet = $result->fetch_assoc();

if ($planet) {
    // Variables del planeta
    $pl_name = $planet['pl_name'];
    $pl_letter = $planet['pl_letter'];
    $discoverymethod = $planet['discoverymethod'];
    
    // Convertir a float para cálculos
    $pl_rade = (float)$planet['pl_rade']; // Radio del planeta
    $pl_masse = (float)$planet['pl_masse']; // Masa del planeta
    $pl_orbpererr2 = (float)$planet['pl_orbpererr2']; // Órbita en días

    // Comprobar si las conversiones son válidas
    if (is_nan($pl_rade) || is_nan($pl_masse) || is_nan($pl_orbpererr2)) {
        die("Error en la conversión de datos numéricos.");
    }

    // Cálculos
    $radio_tierra = 6371; // Radio de la Tierra en km
    $masa_tierra = 1; // Masa de la Tierra en unidades de masa terrestre
    $orbita_años = $pl_orbpererr2 / 365; // Convertir días a años

    // Preguntas
    echo "<h1>Acercándose a $pl_name</h1>";
    echo "<p>Tu planeta ha sido ubicado usando el método de <strong>$discoverymethod</strong>.</p>";
    echo "<p>Escoge la sonda correcta:</p>";
    echo "<ul>
            <li>A) TESS</li>
            <li>B) Kepler</li>
            <li>C) HARPS</li>
          </ul>";

    echo "<h3>Comparaciones con la Tierra:</h3>";

    // Radio del planeta
    echo "<p><strong>Radio del planeta:</strong> $pl_rade km.</p>";
    echo "<p>¿Cuántas veces es el radio de la Tierra?</p>";
    echo "<ul>
            <li>A) " . round($pl_rade / $radio_tierra, 2) . " veces</li>
            <li>B) " . round($pl_rade / $radio_tierra + 0.5, 2) . " veces</li>
            <li>C) " . round($pl_rade / $radio_tierra - 0.5, 2) . " veces</li>
          </ul>";

    // Órbita
    echo "<p><strong>Órbita:</strong> $pl_orbpererr2 días.</p>";
    echo "<p>¿Cuántos años son en comparación a la Tierra?</p>";
    echo "<ul>
            <li>A) " . round($orbita_años, 2) . " años</li>
            <li>B) " . round($orbita_años + 1, 2) . " años</li>
            <li>C) " . round($orbita_años - 1, 2) . " años</li>
          </ul>";

    // Masa
    echo "<p><strong>Masa del planeta:</strong> " . round($pl_masse, 2) . " masas de la Tierra.</p>";
    echo "<p>¿Cuál es la masa de $pl_name en comparación con la Tierra?</p>";
    echo "<ul>
            <li>A) " . round($pl_masse - 0.5, 2) . " masas de la Tierra</li>
            <li>B) " . round($pl_masse, 2) . " masas de la Tierra</li>
            <li>C) " . round($pl_masse + 0.5, 2) . " masas de la Tierra</li>
          </ul>";

    // Pista sobre el nombre
    echo "<p>El nombre comienza con 'AU Mic'. Es el 3º exoplaneta catalogado en su sistema.</p>";
    echo "<p>Alternativas para completar el nombre del planeta:</p>";
    echo "<ul>
            <li>A) b</li>
            <li>B) c</li>
            <li>C) d</li>
          </ul>";
    echo "<p>Entonces, el planeta se llama: AU Mic _ (elige la letra correcta).</p>";
} else {
    echo "No se encontraron planetas.";
}

// Cerrar la conexión
$conn->close();
?>
