<?php
if (!isset($_SESSION))
session_start();
$_SESSION['URL'] = "./acercade.php";
//echo '<pre>';
//	var_dump($_SESSION['estudiantes']);
//  echo '</pre>';
// verificando la autenticación de usuario
if (!isset($_SESSION['username']))
header('Location: ./login.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Acerca De</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2910/2910488.png" />
	<style type="text/css">
		.header { padding: 30px; }
		.form {
			display: block;
    		margin: 0 auto;
    		text-align: center;
    	}
    	.card-footer p { font-size: 10px; }
        .logout{
            position: absolute; 
            right: 2%;
        }
	</style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<div class="bg-dark header">
		<ul class="nav nav-tabs justify-content-center">
			<li class="nav-item ">
				<a class="nav-link text-white" aria-current="page" href="./index.php">Home</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link text-white" aria-current="page" href="./nomina.php">Nomina</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link text-white" aria-current="page" href="./notasest.php">Notas de Estudiantes</a>
			</li>
            <li class="nav-item ">
				<a class="nav-link active" aria-current="page" href="./acercade.php">Acerca De</a>
			</li>
			<li class="nav-item logout">
				<form action="./nomina.php" method="POST">
					<input type="hidden" name="action" value="logout">
					<button type="submit" class="nav-link text-white">Cerrar Sesión</button>
				</form>
			</li>
		</ul>
	</div>
	<div class="header content-fluid bg-dark text-white text-center mb-5">
		<h2>Acerca De</h2>
		<p>¡Bienvenido de nuevo, <?php echo $_SESSION['username']; ?>!</p>
	</div>

	<div class="content">
		<div class="row">
			<div class="col-md-5 form">
				<div class="card">
					<div class="card-header">
						<h4 class="mt-2 mb-2">Desarrolladores</h4>
					</div>

					<div class="card-body" style="text-align: left;">
						<p><strong>Este proyecto o programa está diseñado y programado por: </strong></p>
                        <br>
                        <p>Wander Jerez    - 20210990</p>
                        <p>Milko Ortíz     - 20210840</p>
                        <p>Joan Corona     - 20210981</p>   
                        <br>
                        <p><strong>La contraseña para acceder es:</strong></p>
                        <br>
                        <p>Usuario: admin</p>
                        <p>Contraseña: admin123</p>
					</div>

					<div class="card-footer">
						<p class="mb-0">Programa Realizado por Wander, Milko y Joan</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>