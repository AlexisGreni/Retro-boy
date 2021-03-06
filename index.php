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
	<meta name="description" content="Sitio dedicado a reseñar y proveer juegos de la familia de consolas Game Boy">

	<!-- Bootstrap CSS
   ================================================== -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Animate CSS
   ================================================== -->
	<link rel="stylesheet" href="css/animate.css">

	<!-- Font Icons CSS
   ================================================== -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/et-line-font.css">

	<!-- Nivo Lightbox CSS
   ================================================== -->
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">

	<!-- Owl Carousel CSS
   ================================================== -->
   	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">

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

<!-- Login section
================================================== -->
<section id="login" class="parallax-section">
	<div class="container">
		<div class="row">

    <?php if(!empty($user)): ?>
      <form action="salir.php" method="POST">
        <p>Bienvenido <?= $user['nombre']; ?>
        <input type="submit" value="Salir"></p>
      </form>
    <?php endif; ?>
</section>

<!-- Home section
================================================== -->
<section id="home" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-2 col-md-8 col-sm-12">
				<h2 class="wow bounceIn">RETRO BOY</h2>
				<h4 class="font-weight-normal font-color-gray wow fadeInUp" data-wow-delay="1s">Un espacio para los amantes de la Game Boy
				<BR> <BR>
				Para poder jugar, descarga tu consola virtual</h4>
				<a href="https://visualboy-advance.uptodown.com/windows" class="btn btn-warning section-btn smoothScroll hidden-xs wow fadeInUp" data-wow-delay="1.9s">DESCARGAR VISUALBOY</a>
                                <?php if(empty($user)): ?>
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
				<li><a href="#home" class="smoothScroll">PRINCIPAL</a></li>
				<li><a href="#presenta" class="smoothScroll">PRESENTACIÓN</a></li>
				<li><a href="#reseñas" class="smoothScroll">RESEÑAS</a></li>
				<li><a href="#articulos" class="smoothScroll">ARTÍCULOS</a></li>
				<li><a href="#registro" class="smoothScroll">REGISTRARSE</a></li>
				<li><a href="cuenta.HTML" class="smoothScroll">MI CUENTA</a></li>
			</ul>
		</div>

	</div>
</div>


<!-- Sección de presentación
================================================== -->
<section id="presenta" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-10">
				<div class="section-title">
				    <BR> <BR> <BR> <BR>
					<h1>¿Que es Retro-Boy?</h1>
					<p>Nosotros somos una página dedicada a la libre distribución de juegos para toda la familia GameBoy.
					Pero además, nos damos a la tarea, tanto yo (el administrador) como los usuarios de hacer una reseña 
					a cada uno, para que tu puedas saber si realmente lo vaz a querer. Adelante. Disfruta del contenido de
					nuestra página y hazte una cuenta (para comentar y publicar reseñas) si te ha gustado.</p>
				</div>
			</div>
			<div class="col-md-4 col-sm-10 wow fadeInUp" data-wow-delay="1.6s">
				    <div class="blog-about">
					    <BR> <BR> <BR> <BR> <BR>
					    <img src="images/Game_anima.gif" class="img-responsive" alt="blog">
				    </div>
			</div>
		</div>
	</div>
</section>


<!--  sección de reseñas
================================================== -->
<section id="reseñas" class="parallax-section">
	<div class="container">
		<div class="row">
		
			<div class="col-md-6 col-sm-10 wow fadeInUp" data-wow-delay="1.3s">
				<div class="section-title">
				    <h1><BR><BR>Reseñas</h1>
					<p>Aquí estan todas las reseñas de la página. Puede usar el buscador para encontrar la que guste o también puede crear la suya.</p><BR>
				</div>
				<input type="text" class="form-control" placeholder="Título" name="titulo" required><BR>
                                <input type="submit" class="form-control" value="Buscar"><BR>
<?php
        require 'conexionBD.php';
        $query = "SELECT * FROM Foro_RB WHERE identificador = 0 ORDER BY fecha DESC";
	$result = $mysqli->query($query);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$id = $row['ID'];
		$titulo = $row['titulo'];
		$fecha = $row['fecha'];
		$respuestas = $row['respuestas'];
		echo "<tr>";
			echo "<td><a href='foro.php?id=$id'>Ver </a></td>";
			echo "<td>$titulo </td>";
			echo "<td>".date("d-m-y,$fecha"). "</td>";
			echo "<td>$respuestas <BR></td>";
		echo "</tr>";
	}
?>                                                 
                        <?php if(!empty($user)): ?>
                          <form action="formulario.php" method="POST">
                            <BR><BR><CENTER><input type="submit" class="form-control" value="Crea una reseña"></CENTER>
                          </form>
                        <?php endif; ?>
			</div>
                        <div class="col-md-4 col-sm-10 wow fadeInUp" data-wow-delay="1.3s">
				    <div class="blog-about">
					    <BR> <BR> <BR> <BR> <BR>
					    <img src="images/hyrule.jpg" class="img-responsive" alt="blog">
				    </div>
			</div>
		</div>
	</div>
</section>


<!-- sección de los artículos
================================================== -->
<section id="articulos" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-6 col-sm-10 wow fadeInUp" data-wow-delay="1.0s">
				<div class="section-title">
					<h1><BR><BR>Artículos</h1>
					<p>Aquí puede ver los distintos artículos escritos por la comunidad</p>
				</div>            
				<A HREF="articulo_beta1.HTML">Biografia de Gunpei Yokoi</A><BR>
				<A HREF="articulo_beta2.HTML">Top juegos del GameBoy</A><BR>
			</div>
			<div class="col-md-4 col-sm-10 wow fadeInUp" data-wow-delay="1.3s">
				    <div class="blog-about">
					    <BR> <BR> <BR> <BR> <BR>
					    <img src="images/Articulos.jpg" class="img-responsive" alt="blog">
				    </div>
			</div>
		</div>
	</div>
</section>

<!-- Sección de registro
================================================== -->
<section id="registro" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-12">
				<div class="section-title">
					<h1><BR><BR>Registrate</h1>
					<p>Para poder publicar y descargar juegos ilimitadamente (entre otros), por favor llena los siguientes datos.</p>
				</div>
			</div>

			<!-- Contact form section
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 wow fadeIn" data-wow-delay="0.6s">
				<form action="registrado.php" method="POST">
					<div class="col-md-6 col-sm-6">
						<input name="nombre" type="text" class="form-control" placeholder="Nombre de usuario" required>
						<input name="correo" type="email" class="form-control" placeholder="Correo eléctronico" required>
						<input name="contrasenha" type="password" class="form-control" placeholder="Contraseña" required>
						<input name="cc" type="password" class="form-control" placeholder="Confirmar contraseña" required>
					</div>
					<div class="col-md-6 col-sm-6">
						<textarea name="interes" class="form-control" placeholder="Principal interes en el sitio" rows="7" required></textarea>
					</div>
					<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
						<BR><input type="submit" class="form-control" value="CREAR TU CUENTA">
					</div>
				</form>
			</div>

		</div>
	</div>
</section>


<!-- Footer section
================================================== -->
<footer>
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
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>


</body>
</html>
