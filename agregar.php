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

	if(isset($_POST["submit"])){
		if(!empty($_POST['mensaje'])){
                        $ID_autor = $user['id'];
			$titulo=$_POST['titulo'];
			$mensaje=$_POST['mensaje'];
			$respuestas=$_POST['respuestas'];
			$identificador=$_POST['identificador'];
   			$fecha = date("d-m-y");
						
			//Evitamos que el usuario ingrese HTML
			$mensaje = htmlentities($mensaje);
			echo "identificador:";
			echo $identificador;
			
			//Grabamos el mensaje en la base de datos.
			$query = "INSERT INTO Foro_RB (ID_autor, titulo, mensaje, identificador, fecha, ult_respuesta) VALUES ('$ID_autor', '$titulo', '$mensaje', '$identificador','$fecha','$fecha')";
			
			echo $query;
			echo "identificador:";
			echo $identificador;
			$result = $mysqli->query($query);
			
			/* si es un mensaje en respuesta a otro actualizamos los datos */
			if ($identificador != 0)
			{
				$query2 = "UPDATE Foro_RB SET respuestas=respuestas+1 AND ult_respuesta = LOCALTIME WHERE ID='$identificador'";
				$result2 = $mysqli->query($query2);
				echo $query2;
				Header("Location: foro.php?id=$identificador");
				exit();
			}
			Header("Location: index.php");
		}
	}
?>
