
<?php

function BarraNavegacion(Int $menu)
{
    

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<div class="bg-dark header">
		<ul class="nav nav-tabs justify-content-center">
			<li class="nav-item ">
				<a class="nav-link <?php 
                if($menu == 1)
                echo "active";
                else
                echo "text-white";
                ?> " aria-current="page" href="./index.php">Home</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link <?php 
                if($menu == 2)
                echo "active";
                else
                echo "text-white";
                ?> " aria-current="page" href="./nomina.php">Nomina</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link <?php 
                if($menu == 3)
                echo "active";
                else
                echo "text-white";
                ?> " aria-current="page" href="./notasest.php">Notas de Estudiantes</a>
			</li>
            <li class="nav-item ">
				<a class="nav-link <?php 
                if($menu == 4)
                echo "active";
                else
                echo "text-white";
                ?> " aria-current="page" href="./obtenerwifi.php">Obtener Wifi</a>
			</li>
            <li class="nav-item ">
				<a class="nav-link <?php 
                if($menu == 5)
                echo "active";
                else
                echo "text-white";
                ?> " aria-current="page" href="./acercade.php">Acerca De</a>
			</li>
			<li class="nav-item logout">
				<form action="<?php $_SESSION['URL'] ?>" method="POST">
					<input type="hidden" name="action" value="logout">
					<button type="submit" class="nav-link text-white">Cerrar Sesión</button>
				</form>
			</li>
		</ul>
	</div>


    <?php


}
?>

