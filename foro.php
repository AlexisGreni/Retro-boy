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
	if(isset($_GET["respuestas"]))
		$respuestas = $_GET['respuestas'];
	else
		$respuestas = 0;
	if(isset($_GET["identificador"]))
		$identificador = $_GET['identificador'];
	else
		$identificador = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<!-- Site title
   ================================================== -->
	<title>Retro Boy</title>

	<!-- Bootstrap CSS
   ================================================== -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Animate CSS
   ================================================== -->
	<link rel="stylesheet" href="css/animate.css">

	<!-- Font Icons
   ================================================== -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/et-line-font.css">

	<!-- Main CSS
   ================================================== -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Google web font 
   ================================================== -->	
   <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
	
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- Preloader section
================================================== -->
<div  class="preloader">

	<div class="sk-spinner sk-spinner-pulse"></div>

</div>


<!-- Home section
================================================== -->
<section id="home" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-2 col-md-8 col-sm-12">
				<h2 class="wow bounceIn">RETRO-RESEÑAS</h2>
				<h4 class="font-weight-normal font-color-gray wow fadeInUp" data-wow-delay="1s">Donde cualquiera puede aportar su opinión sobre los juegos de la vieja escuela.</h4>
                         <?php if(empty($user)): ?>
                                <h3 class="font-weight-normal font-color-gray wow fadeInUp" data-wow-delay="1s">No te lo pierdas. Accede a tu cuenta ahora (o create una)</h3>
                                <a href="index.php#registro" class="btn btn-warning section-btn smoothScroll hidden-xs wow fadeInUp" data-wow-delay="1.9s">UNIRSE</a> 
                                <a href="entrar.php" class="btn btn-warning section-btn smoothScroll hidden-xs wow fadeInUp" data-wow-delay="1.9s">ACCEDER</a> <?php endif; ?>
			</div>

		</div>
	</div>		
</section>


<!-- Sección de navegación
================================================== -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Secciones</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php" class="smoothScroll">PRINCIPAL</a></li>
				<li><a href="#reseña" class="smoothScroll">RESEÑA</a></li>
				<li><a href="#comentarios" class="smoothScroll">COMENTARIOS</a></li>
				<li><a href="cuenta.HTML" class="smoothScroll">MI CUENTA</a></li>
			</ul>
		</div>

	</div>
</div>


<!-- Sección de la reseña
================================================== -->
<section id="reseña" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-7">

				<div class="blog-image wow fadeInUp" data-wow-delay="0.9s">
					<img src="images/marioyluigi.jpg" class="img-responsive" alt="blog">
				</div>
                                <?php
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
                 while($dato = mysqli_fetch_array($result_a, MYSQLI_ASSOC)){
                     $usuario = $dato['nombre'];
                 }
	    }                   ?>
				<div class="blog-content wow fadeInUp" data-wow-delay="1s">
					<span class="meta-date"><?= $fecha; ?></a></span>
					<span class="meta-author"><a href="#blog-author"> Autor: <?= $usuario; ?> </a></span>
					<span class="meta-comments"><a href="#blog-comments"><?= $respuestas; ?> comentarios</a></span>
					<h3><?= $titulo; ?></h3>
					<p><?= $mensaje; ?></p>
				</div>

				<div class="blog-author wow fadeInUp" data-wow-delay="1s">
					<div class="media">
						<div class="media-object pull-left">
							<a href="#"><img src="images/gameboy+pixel.jpg" width="120" height="120" class="img-responsive img-circle" alt="blog"></a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"><?= $usuario; ?></h4>
							<p>Lo pondre luego</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-5 wow fadeInUp" data-wow-delay="1.3s">
				<div class="blog-about">
					<h3>Acerca de nosotro</h3>
					<img src="images/about.jpg" class="img-responsive" alt="blog">
					<p>La comunidad de Retro-Boy recibe con los brazos abiertos a todo aquel que este deseoso de jugar y comparitr su opinion sobre los juegos clasicos de la familia Game Boy.</p>
				</div>

				<div class="recent-post">
					<h3>Ultimas reseñas</h3>

						<div class="media">
							<div class="media-object pull-left">
								<a href="#"><img src="images/blog-thumb1.jpg" class="img-responsive" alt="blog"></a>
							</div>
							<div class="media-body">
								<h5>14 Diciembre 2015</h5>
								<h4 class="media-heading"><a href="#">Frontend Developer Vs UI Designer</a></h4>
							</div>
						</div>
						<div class="media">
							<div class="media-object pull-left">
								<a href="#"><img src="images/blog-thumb2.jpg" class="img-responsive" alt="blog"></a>
							</div>
							<div class="media-body">
								<h5>14 Enero 2016</h5>
								<h4 class="media-heading"><a href="#">What is Social Marketing Business</a></h4>
							</div>
						</div>
						<div class="media">
							<div class="media-object pull-left">
								<a href="#"><img src="images/blog-thumb3.jpg" class="img-responsive" alt="blog"></a>
							</div>
							<div class="media-body">
								<h5>10 Febrero 2016</h5>
								<h4 class="media-heading"><a href="#">How to become Web Designer</a></h4>
							</div>
						</div>
				</div>
						
		</div>
	</div>
</section>

<section id="comentarios" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-7">
                                <div class="blog-comment wow fadeInUp" data-wow-delay="1s">
					<h3>Comentarios</h3>

<div class="media">
<?php
	$query2 = "SELECT * FROM  Foro_RB WHERE identificador = '$id' ORDER BY fecha DESC";
	$result2 = $mysqli->query($query2);
	while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
		$id = $row['ID'];
		$mensaje = $row['mensaje'];
		$fecha = $row['fecha'];
		$respuestas = $row['respuestas'];
                $query_b = "SELECT * FROM usuarios WHERE id = (SELECT ID_autor FROM Foro_RB WHERE ID = '$id')";
	        $result_b = $mysqli->query($query_b);
                $dato = mysqli_fetch_array($result_b, MYSQLI_ASSOC);
                $usuario = $dato['nombre'];
?>
                <div class="media-object pull-left">
		    <img src="images/comment1.jpg" class="img-responsive img-circle" alt="blog">
		</div>
		      <div class="media-body">
		          <h4 class="media-heading"><?= $usuario; ?></h4>
			  <h5><?= $fecha; ?></h5>
			  <p><?= $mensaje; ?></p>
                      </div>
<?php 
      } 
      if(isset($_GET["id"]))
	  $identificador = $_GET['id'];
      $respuestas = 0;
?>
					  </div>
				     </div>
				</div>
                           </div>

<?php if(!empty($user)): ?>
				<div class="blog-comment-form wow fadeInUp" data-wow-delay="1s">
					<h3>Deja un comentario</h3>
					<form name="form" action="agregar.php" method="post">
						<div class="col-md-8 col-sm-8">
							<textarea name="mensaje" class="form-control" placeholder="Mensaje" rows="7" required="required"></textarea>
							<input type="submit" class="form-control" id="submit" name="submit" value="Comentar">
						</div>
                                            <input type="hidden" name="titulo" value="">
                                            <input type="hidden" name="identificador" value="<?php echo $identificador;?>">
	                                    <input type="hidden" name="respuestas" value="<?php echo $respuestas;?>">
					</form>
				</div>
<?php endif; ?>
                </div>
        </div>
</section>

<!-- Footer section
================================================== -->
<footer class="blog-footer">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="1s">
				<p>Copyright © Genius HTML Template | All Rights Reserved.</p>
			</div>
			
		</div>
	</div>
</footer>


<!-- Javascript 
================================================== -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom1.js"></script>


</body>
</html>
