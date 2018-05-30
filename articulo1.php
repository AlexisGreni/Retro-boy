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
				<h2 class="wow bounceIn">ARTÍCULOS-RETRO</h2>
				<h4 class="font-weight-normal font-color-gray wow fadeInUp" data-wow-delay="1s">Conoce un poco mas sobre el mundo de los videojuegos.</h4>
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
				<li><a href="#reseña" class="smoothScroll">ARTICULOS</a></li>
				<li><a href="cuenta.HTML" class="smoothScroll">MI CUENTA</a></li>
			</ul>
		</div>

	</div>
</div>


<!-- Sección del articulo
================================================== -->
<section id="reseña" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-7">

				<div class="blog-image wow fadeInUp" data-wow-delay="0.9s">
					<img src="images/marioyluigi.jpg" class="img-responsive" alt="blog">
				</div>
				<div class="blog-content wow fadeInUp" data-wow-delay="1s">
					<span class="meta-date">28 de Mayo del 2018</a></span>
					<h3>Biografia de Gumpei Yoko</h3>
					<p>Fue uno de los grandes genios de Nintendo y uno de los ejecutivos que sentó las bases de su éxito. Ingeniero de profesión, demostró tener talento en el desarrollo del soporte físico (hardware) en este campo. Poseedor de una gran inventiva y creatividad, inventó la afamada consola portátil Game Boy y los Game & Watch, muy populares en aquel entonces, considerados ser prototipo de la primera mencionada. También fue el hombre que desarrolló la serie de Metroid, que aún sigue teniendo una gran fama en las nuevas plataformas de Nintendo (WiiU, Nintendo 3DS y Switch) y Kid Icarus.</p>
				</div>

				<div class="blog-author wow fadeInUp" data-wow-delay="1s">
					<div class="media">
						<div class="media-object pull-left">
							<a href="#"><img src="images/gameboy+pixel.jpg" width="120" height="120" class="img-responsive img-circle" alt="blog"></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-5 wow fadeInUp" data-wow-delay="1.3s">
				<div class="blog-about">
					<h3>Acerca de nosotros</h3>
					<img src="images/about2.jpg" class="img-responsive" alt="blog">
					<p>La comunidad de Retro-Boy recibe con los brazos abiertos a todo aquel que este deseoso de jugar y comparitr su opinion sobre los juegos clasicos de la familia Game Boy.</p>
				</div>

				<div class="recent-post">
					<h3>Ultimas reseñas</h3>
<?php
        require 'conexionBD.php';
        $query = "SELECT * FROM Foro_RB WHERE identificador = 0 ORDER BY fecha DESC LIMIT 0, 3";
	$result = $mysqli->query($query);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$id = $row['ID'];
		$titulo = $row['titulo'];
		$fecha = $row['fecha'];
?>

                                                <div class="media">
							<div class="media-object pull-left">
							      <a href="#"><img src="images/cartucho.jpg" class="img-responsive" alt="blog"></a>
							</div>
							<div class="media-body">
						              <h5><?= $fecha; ?></h5>
							      <h4 class="media-heading"><a href='foro.php?id=$id'><?= $titulo; ?></a></h4>
							</div>
						</div>

<?php } ?>
			 </div>						
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
