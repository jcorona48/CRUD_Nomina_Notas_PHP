<?php
if (!isset($_SESSION))
session_start();
$_SESSION['URL'] = "./index.php";
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
    <title>Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    
	<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2910/2910488.png" />
    <style type="text/css">
        .header {
            padding: 30px;
        }

        .form {
            display: block;
            margin: 0px auto;
            text-align: center;
        }
        .catalog{
            margin: 0px auto;
        }
        .card-footer p {
            font-size: 10px;
        }

        .btnenlace{
            position: absolute; 
            bottom: 4%;
            right: 37.5%;
        }
        .logout{
            position: absolute; 
            right: 2%;
        }
        img{
			height: 160px;

		}
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<?php include_once("./navbar.php");
    BarraNavegacion(1);
    ?>
    <div class="header content-fluid bg-dark text-white text-center mb-5">
        <h2>Programación I</h2>
        <p>¡Bienvenido de nuevo, <?php echo $_SESSION['username']; ?>!</p>
    </div>

    <div class="content">
        <div class="row">
            <div class="row justify-content-center">
                <div class="card" style="width: 18rem; " >
                    <img src="https://www.unotv.com/uploads/2022/07/nomina-164615.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        
                        <h5 class="card-title">Nómina</h5>
                        <hr>
                        <p class="card-text">Esta opción te permite realizar la nómina de tus empleados y obtener todos los datos necesarios.</p>
                        <div style="margin-top: 30%;">
                        <div class="btnenlace text-center" >
                        <a href="./nomina.php" class="btn btn-primary" >Utilizar</a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin-left:2%">
                    <img src="https://doralfamilyjournal.com/wp-content/uploads/2019/12/Grades-Are-Not-the-Only-Thing-That-Matters.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Calificaciones</h5>
                        <hr>
                        <p class="card-text">Esta opción te permite controlar y validar las calificaciones de tus estudiantes.</p>
                        <div class="btnenlace text-center">
                        <a href="./notasest.php" class="btn btn-primary">Utilizar</a>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin-left:2%">
                    <img src="https://miracomohacerlo.com/wp-content/uploads/2017/02/7-tips-to-make-your-home-Wi-Fi-more-secure-1024x768.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Obtener Contraseña wifi</h5>
                        <hr>
                        <p class="card-text">Esta opción te permite visualizar las diferentes conexiones de red en el equipo y obtener su contraseña.</p>
                        <div class="btnenlace text-center">
                        <a href="./obtenerwifi.php" class="btn btn-primary">Utilizar</a>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin-left:2%">
                    <img src="https://www.blogtyrant.com/wp-content/uploads/2011/02/best-about-us-pages.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Acerca De</h5>
                        <hr>
                        <p class="card-text">En esta opción podrás adquirir información sobre lo desarrolladores de esta solución.</p>
                        <div class="btnenlace text-center">
                        <a href="./acercade.php" class="btn btn-primary">Utilizar</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>