<?php
  if(isset($_GET['username'])) {
    $username = $_GET['username'];
    setcookie('username', $username, time() + 70000);
    header("Location:retos.php");
  }
  if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
  } 

  if (isset($username)) {
    header("Location:retos.php");
  }
  else {
?>
    <h1>Bienvenido al juego de las preguntas</h1>
    <form action="inicio.php">
      <p>¿Puedes indicarme tu nombre?</p>
      <input type="text" name="username" id="" placeholder="tu nombre...">
      <input type="submit" value="entrar">
    </form>
<?php
  }
?>
