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
		<title>vehiculo2</title>
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
					<th class="pad-basic">placa </th>
					<th class="pad-basic">pri_nombre_pro </th>
					<th class="pad-basic">seg_nombre_pro </th>
					<th class="pad-basic">apellido_pro </th>
					<th class="pad-basic">marca</th>
                    <th class="pad-basic">pri_nombre_cond</th>
					<th class="pad-basic">seg_nombre_cond</th>
                    <th class="pad-basic">apellido_cond</th>
				<tr>

				<?php

				$query="SELECT `vehiculo`.`placa`,`vehiculo`.`marca`, 
				`propietario`.`pri_nombre_pro`, `propietario`.`seg_nombre_pro`, `propietario`.`apellido_pro`,
				`conductor`.`pri_nombre_cond`, `conductor`.`seg_nombre_cond`, `conductor`.`apellido_cond` 
                FROM `vehiculo` 
                INNER JOIN `propietario` ON `vehiculo`.`cedula_pro` = `propietario`.`cedula_pro` 
                INNER JOIN `conductor` ON `vehiculo`.`idcedu_cond` = `conductor`.`idcedu_cond`;";
				$consulta=$conexion->query($query);
				while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					{
						echo'
						<tr>
						<td>'.$fila['placa'].'</td>
						<td>'.$fila['pri_nombre_pro'].'</td>
						<td>'.$fila['seg_nombre_pro'].'</td>
						<td>'.$fila['apellido_pro'].'</td>
						<td>'.$fila['marca'].'</td>
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
