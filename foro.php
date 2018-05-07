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
          if (count($results) > 0) 
            $user = $results;
        }
	include("conexionBD.php");
	if(isset($_GET["id"]))
	$id = $_GET['id'];
	$query1 = "SELECT * FROM Foro_RB WHERE ID = '$id' ORDER BY fecha DESC";
	$result1 = $mysqli->query($query1);
        $query_a = "SELECT * FROM usuarios WHERE id = (SELECT ID_autor FROM Foro_RB WHERE ID = '$id')";
	$result_a = $mysqli->query($query_a);
	while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
		$id = $row['ID'];
		$titulo = $row['titulo'];
		$mensaje = $row['mensaje'];
		$fecha = $row['fecha'];
		$respuestas = $row['respuestas'];
		
		echo "<tr><td>$titulo</tr></td>";
		echo "<table>";

                while($dato = mysqli_fetch_array($result_a, MYSQLI_ASSOC)){
                    $usuario = $dato['nombre'];
		    echo "<tr><td>autor: $usuario</td></tr>";
                }
		echo "<tr><td>$mensaje</td></tr>";
		echo "</table>";
		echo "<br /><br /><a href='formulario.php?id&respuestas=$respuestas&identificador=$id'>Responder</a><br />";
	}
	
	$query2 = "SELECT * FROM  Foro_RB WHERE identificador = '$id' ORDER BY fecha DESC";
	$result2 = $mysqli->query($query2);
        $query_b = "SELECT * FROM usuarios WHERE id = (SELECT ID_autor FROM Foro_RB WHERE ID = '$id')";;
	$result_b = $mysqli->query($query_b);
	echo "<br />respuestas:<br /><br />";
	while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
		$id = $row['ID'];
		$autor = $result_b;
		$mensaje = $row['mensaje'];
		$fecha = $row['fecha'];
		$respuestas = $row['respuestas'];
                //$a_quien = ;Despues
		
		echo "<tr><td>$titulo</tr></td>";
		echo "<table>";
		while($dato = mysqli_fetch_array($result_b, MYSQLI_ASSOC)){
                    $usuario = $dato['nombre'];
		    echo "<tr><td>autor: $usuario</td></tr>";
                }
		echo "<tr><td>$mensaje</td></tr>";
		echo "</table>";
                if(!empty($user)) 
		echo "<br /><br /><a href='formulario.php?id&respuestas=$respuestas&identificador=$id'>Responder</a><br />";
	}
?>
</body>
</html>
