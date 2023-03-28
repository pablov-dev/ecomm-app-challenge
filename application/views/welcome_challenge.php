<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienvenido al desafio</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Desafio</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="http://127.0.0.0:8000">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://127.0.0.0:8000/products">Productos</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<h1>Bienvenido al desafio!</h1>

		<div>
			<p>La pagina solo mantendra el cartel de bienvenida para los usuarios.</p>

			<p>Datos random: al tener instalado docker y creado el archivo docker-compose.yml</p>

			<p>Ejecute el siguiente comando y pude lograr levantar el proyecto sin necesidad de tener nuevas herramientas instaladas</p>
			<code>curl -LO https://raw.githubusercontent.com/bitnami/containers/main/bitnami/codeigniter/docker-compose.yml</code>

			<p>Ya que estoy explorando aún lo que es docker y docker compose, sigo utilizando <a href="https://hub.docker.com/">Docker hub</a>.</p>
		</div>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>