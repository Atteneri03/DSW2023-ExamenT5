<?php
if (isset($_COOKIE['username'])) {
  require_once "preguntas.php";
  $username = $_COOKIE['username'];
  $date = new DateTime();
  $date = $date->format('d-m-Y');
  $numPregunta = 1;
  $acertadas = 0;
  $totalPreguntas = sizeof($preguntasDiarias[$date]["preguntas"]);
  $numOpciones = sizeof($preguntasDiarias[$date]["preguntas"]["pregunta$numPregunta"]["opciones"]);

  echo "<h2>Hola $username</h2>";
  
  echo "<h1>Reto Diario</h1>";

  echo "<h3>Fecha: $date | Tema: " . $preguntasDiarias[$date]["tema"] . "</h3>";

  echo "<p>Pregunta: $numPregunta de $totalPreguntas</p>";


  echo "<h4>" . $preguntasDiarias[$date]["preguntas"]["pregunta$numPregunta"]["enunciado"] ."</h4>";

  ?>
 <form action="retos.php" method="get">
  <?php
  foreach ($preguntasDiarias[$date]["preguntas"]["pregunta$numPregunta"]["opciones"] as $key => $value) {
    echo "$key. <input type='radio' id='$key' name='optionsPregunta' value='$key'> $value <br>";
  }
  ?>
  <input type="submit" value="enviar">
</form>

<?php
if (isset($_GET['optionsPregunta'])) {
  $selectedOption = $_GET['optionsPregunta'][0];
  echo $selectedOption; 

  if ($selectedOption == $preguntasDiarias[$date]["preguntas"]["pregunta$numPregunta"]["respuesta_correcta"]) {
    $numPregunta++;
    $acertadas++;
   
  }
}
} else {
  header("Location:inicio.php");
}
?>
