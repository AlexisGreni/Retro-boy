<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Main CSS (son los estilos. No tienes que modificarlos)
   ================================================== -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Google web font 
   ================================================== -->	
   <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
  //Las dos lineas de abajo te conectan con la base de datos. NO las cambies. A lo mucho, puedes modificar "basedatos.php"
  //si tienes problemas para conectarte 
  session_start();
  require 'basedatos.php';
  if (isset($_SESSION['user_id'])) {
    //Lo que esta dentro de este "if" (hasta la linea 25) sirve para iniciar sesión con tu usuario
    $records = $conn->prepare('SELECT * FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
	//Se usan cuando el comentario es una respuesta a otro. Como el enlace solo lo puede poner quien sube la reseña
	//(es decir, el comentario principal), puedes ignorar esto. Aun así, sería recomendable que te asegures de que
	//solo el comentario principal pueda poner un enlace (lo dejas en blanco para otros comentarios)
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
	<!--A partir de aquí van los datos que se usaran en la página para añadir esto al foro. Ignora las dos lineas de abajo-->
	<input type="hidden" name="identificador" value="<?php echo $identificador;?>">
	<input type="hidden" name="respuestas" value="<?php echo $respuestas;?>">
    <tr>
		<td>Autor: </td> <!--No lo modifiques-->
		<td><?= $user['nombre']; ?></td>
    </tr>
  <?php if($identificador == 0): ?>
    <tr>
      <td>Videojuego:</td> <!--Tampoco esto-->
      <td><input type="text" name="titulo"></td>
    </tr>
  <?php endif; ?>
    <tr>
      <td>Reseña o comentario:</td>
      <td><textarea name="mensaje" cols="50" rows="5" required="required"></textarea></td>
    </tr>
    <!--Este sitio seria perfecto para colocar la caja de texto que te pidiera el enlace (de preferencia con una condicíon
    para que no lo vean quienes responden a un comentario {para quienes respuesta = 0})-->
    <tr>
      <td><input type="submit" id="submit" name="submit" value="Enviar"></td>
    </tr>
  </form>
</table>
</body>
</html>
