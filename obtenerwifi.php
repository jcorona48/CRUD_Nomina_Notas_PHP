<?php
if (!isset($_SESSION))
	session_start();
$_SESSION['URL'] = "./obtenerwifi.php";
/*echo '<pre>';
	var_dump($_SESSION['cedulas']);

	return 0;*/

// verificando la autenticación de usuario
if (!isset($_SESSION['username']))
	header('Location: ./login.php');

if (!isset($_SESSION['cedulas']) || !isset($_SESSION['nombres']) || !isset($_SESSION['horasT']) || !isset($_SESSION['horasP'])) {
	$_SESSION['cedulas'] = [];
	$_SESSION['nombres'] = [];
	$_SESSION['horasT'] = [];
	$_SESSION['horasP'] = [];
}
if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'create':
			array_push($_SESSION['cedulas'], $_POST['cedula']);
			array_push($_SESSION['nombres'], $_POST['nombre']);
			array_push($_SESSION['horasT'], $_POST['horaT']);
			array_push($_SESSION['horasP'], $_POST['horaP']);
			header('Location: ./login.php');
			break;

		case 'completed':
			$id = $_POST['id'];
			unset($_SESSION['cedulas'][$id]);
			unset($_SESSION['nombres'][$id]);
			unset($_SESSION['horasT'][$id]);
			unset($_SESSION['horasP'][$id]);
			header('Location: ./login.php');
			break;

		case 'logout':
			session_destroy();
			// unset($_SESSION['username']);
			header('Location: ./login.php');
			break;

		default:
			header('Location: ./login.php');
			break;
	}
}


$class_bg = 'bg-success';
$cant_elementos = count($_SESSION['cedulas']);

if ($cant_elementos == 1)
	$class_bg = 'bg-primary';

if ($cant_elementos > 1)
	$class_bg = 'bg-danger';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nomina Empleados</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2910/2910488.png" />
	<style type="text/css">
		.header {
			padding: 30px;
		}
		.form {
			display: block;
    		margin: 0 auto;
    		text-align: center;
    	}
		.card-footer p {
			font-size: 11px;
		}
		.logout{
            position: absolute; 
            right: 2%;
        }
		img{
			height: 85px;
			width: 105;

		}
	</style>
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<?php 
	include_once("./navbar.php");
    BarraNavegacion(4);
    ?>
	<div class="header container-fluid bg-dark text-white text-center mb-5">
		<h2>Control de Nómina</h2>
		<p>¡Bienvenido de nuevo, <?php echo $_SESSION['username']; ?>!</p>
	</div>
	<div class="container">
		<div class="row">
			<!-- Tabla de cedulas -->
			<div class="col-md-8 form">
				<div class="card">
					<div class="card-header text-white text-center <?php echo $class_bg; ?>">
						<h6 class="mt-2 mb-2">Nómina de empleados</h6>
					</div>
					<div class="card-body">
						<table class="table table-hover">
							<thead>
								<th>No. Cédula</th>
								<th>Empleado</th>
								<th>Cant. horas</th>
								<th>Precio</th>
								<th>Total</th>
								<th>Acciones</th>
							</thead>
							<tbody>
								<?php if (isset($_SESSION['cedulas']) && !empty($_SESSION['cedulas'])) : ?>
									<?php
									$total = 0;
									$cont = 0;
									$indice = 0;
									while ($cont != count($_SESSION['cedulas'])) {
										if (isset($_SESSION['cedulas'][$indice])) {
									?>
											<tr>
												<td><?php echo $_SESSION['cedulas'][$indice]; ?></td>
												<td><?php echo $_SESSION['nombres'][$indice]; ?></td>
												<td><?php echo $_SESSION['horasT'][$indice]; ?></td>
												<td><?php echo $_SESSION['horasP'][$indice]; ?></td>
												<td><?php echo number_format(((float)$_SESSION['horasT'][$indice]) * ((float)$_SESSION['horasP'][$indice])); ?></td>
												<?php $total += (((float)$_SESSION['horasT'][$indice]) * ((float)$_SESSION['horasP'][$indice])); ?>
												<td>
													<form action="./nomina.php" method="POST">
														<input type="hidden" name="action" value="completed">
														<input type="hidden" name="id" value="<?php echo $indice; ?>">
														<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
													</form>
												</td>
											</tr>
									<?php $cont++;
										}
										$indice++;
									} ?>
								<?php else : ?>
									<tr class="text-center">
										<td colspan="6">No hay ninguna nómina registrada</td>
									</tr>
								<?php endif ?>
							</tbody>
						</table>
					</div>
					<div class="card-footer">
						<p class="mb-0">
							<?php if (isset($_SESSION['cedulas'])) : ?>
								<?php if (count($_SESSION['cedulas']) == 0) : ?>
									<strong class="text-success">
										¡No tienes ningún empleado en nómina!
									</strong>
								<?php endif ?>
								<?php if (count($_SESSION['cedulas']) >= 1) : ?>
									<strong style="font-size: 16px">
										El total de Nomina es: <?php echo number_format($total);  ?>
									</strong>
								<?php endif ?>
							<?php endif ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>