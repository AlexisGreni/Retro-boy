<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
    header('Location: /Retro-Boy');
  }
  require 'basedatos.php';
  if (!empty($_POST['nombre']) && !empty($_POST['contrasenha'])) {
    $records = $conn->prepare('SELECT * FROM usuarios WHERE nombre = :nombre');
    $records->bindParam(':nombre', $_POST['nombre']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 && password_verify($_POST['contrasenha'], $results['contrasenha'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /Retro-Boy");
    } else {
      $message = 'Lo sentimos, pero las credenciales no coinciden';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Entra en tu cuenta</h1>
    <span>o puedes <a href="salir.php">regresar</a></span>

    <form action="entrar.php" method="POST">
      <input name="nombre" type="text" placeholder="Escribe tu usuario">
      <input name="contrasenha" type="password" placeholder="Enter your Password">
      <input type="submit" value="Entrar">
    </form>
  </body>
</html>
