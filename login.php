<?php
	
	// credenciales predeterminadas
	const USERNAME = 'admin';
	const PASSWORD = 'admin123';

	$error = false;

	// indicando al servidor que vamos a trabajar con variables de sesiones
	session_start();

	// valida si el usuario está autenticado
	if(isset($_SESSION['username']))
		header("Location: ". $_SESSION["URL"]);
		

	if(isset($_POST['username']))
	{
		// comprobando el usuario enviando
		if( (USERNAME == $_POST['username']) && (PASSWORD == $_POST['password']) )
		{
			if(! isset($_SESSION['username']))
				$_SESSION['username'] = 'Admin';

			// ya el usuario se encuentra autenticado
			header('Location: ./index.php');
		}

		// las credenciales son incorrectas
		else
			$error = true;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
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
	</style>
</head>
<body>
	<div class="header content-fluid bg-dark text-white text-center mb-5">
		<h2>Programación I</h2>
		<p>Debes iniciar sesión para continuar...</p>
	</div>

	<div class="content">
		<div class="row">
			<div class="col-md-5 form">
				<div class="card">
					<div class="card-header">
						<h4 class="mt-2 mb-2">Iniciar Sesión</h4>
					</div>

					<div class="card-body">
						<?php
							if($error)
								echo '
									<div class="alert alert-danger">
										Valida que tus credenciales sean correctas.
									</div>
								';
						?>

						<form action="./login.php" method="POST">
							<div class="form-group mb-3">
								<label for="username">
									Usuario: 
									<small><strong class="text-danger">*</strong></small>
								</label>

								<input class="form-control form-control-sm" type="text" name="username" id="username" required>
							</div>

							<div class="form-group mb-3">
								<label for="password">
									Contraseña: 
									<small><strong class="text-danger">*</strong></small>
								</label>

								<input class="form-control form-control-sm" type="password" name="password" id="password" required>
							</div>

							<button type="submit" class="btn btn-success btn-sm mt-3">Crear Nómina</button>
						</form>
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