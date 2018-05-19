<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Main CSS
   ================================================== -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Google web font 
   ================================================== -->	
   <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
  session_start();
  require 'basedatos.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT * FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
        include("conexionBD.php");
	if(isset($_GET["respuestas"]))
		$respuestas = $_GET['respuestas'];
	else
		$respuestas = 0;
	if(isset($_GET["identificador"]))
		$identificador = $_GET['identificador'];
	else
		$identificador = 0;
  }
?>

<table>
<form name="form" action="agregar.php" method="post">
	<input type="hidden" name="identificador" value="<?php echo $identificador;?>">
	<input type="hidden" name="respuestas" value="<?php echo $respuestas;?>">
    <tr>
		<td>Autor: </td>
		<td><?= $user['nombre']; ?></td>
    </tr>
  <?php if($identificador == 0): ?>
    <tr>
      <td>Videojuego:</td>
      <td><input type="text" name="titulo"></td>
    </tr>
  <?php endif; ?>
    <tr>
      <td>Reseña o comentario:</td>
      <td><textarea name="mensaje" cols="50" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td><input type="submit" id="submit" name="submit" value="Enviar"></td>
    </tr>
  </form>
</table>
</body>
</html>
