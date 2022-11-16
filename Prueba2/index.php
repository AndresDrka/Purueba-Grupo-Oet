<?php
$usuario='root';
$contraseña='';
$host='localhost';
$base='acme';

try {
   		$conexion = new PDO('mysql:host='.$host.';dbname='.$base, $usuario, $contraseña);
	} 
	catch (PDOException $e) 
	{
	    print "¡Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
?>

<html lang="es">
	<head> 
		<title>ITIC TUTORIALES</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h3>vehiculo2 </h3>
			</div>
		</header>

		<section>
			<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">placaplaca </th>
					<th class="pad-basic">pri_nombre_pro </th>
					<th class="pad-basic">seg_nombre </th>
					<th class="pad-basic">apellido_pro </th>
					<th class="pad-basic">maraca</th>
					<th class="pad-basic">hora_salida</th>
					<th class="pad-basic">hora_entrada</th>
                    <th class="pad-basic">pri_nombre_cond</th>
					<th class="pad-basic">seg_nombre_cond</th>
                    <th class="pad-basic">apellido_cond</th>
				<tr>

				<?php

				$query="SELECT `vehiculo`.`placa`, `vehiculo`.`pri_nombre_pro`, `vehiculo`.`seg_nombre`, `vehiculo`.`apellido_pro`, `vehiculo`.`maraca`, `horarios`.`hora_salida`, `horarios`.`hora_entrada`, `conductor`.`pri_nombre_cond`, `conductor`.`seg_nombre_cond`, `conductor`.`apellido_cond` 
                FROM `horarios` 
                INNER JOIN `vehiculo` ON `horarios`.`placa` = `vehiculo`.`placa` 
                INNER JOIN `conductor` ON `horarios`.`idcedu_cond` = `conductor`.`idcedu_cond`";
				$consulta=$conexion->query($query);
				while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					{
						echo'
						<tr>
						<td>'.$fila['placa'].'</td>
						<td>'.$fila['pri_nombre_pro'].'</td>
						<td>'.$fila['seg_nombre'].'</td>
						<td>'.$fila['apellido_pro'].'</td>
						<td>'.$fila['maraca'].'</td>
						<td>'.$fila['hora_salida'].'</td>
						<td>'.$fila['hora_entrada'].'</td>
						<td>'.$fila['pri_nombre_cond'].'</td>
						<td>'.$fila['seg_nombre_cond'].'</td>
						<td>'.$fila['apellido_cond'].'</td>
						</tr>
						';
					}


				?>

			</table>
		</section>
</body>
</html>