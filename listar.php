<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
  	include("conexion.php");



?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Krona+One|Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="icon" href="img/favicon.png" type="image/png" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<title>-Turismo del mundo-</title>
</head>

<body>

	<header>
		<div class="menu-contenedor">
			<img src="img/logotipo.png" width="67px" height="45px">
			<a href="#">Precios</a>
			<a href="#">Promociones</a>
			<a href="#">Tarjeta Gold</a>
			<a href="index.html">Cotizaciones</a>
		</div>
	</header>

	<div class="container bg-light margin-top">

		<table class="table table-bordered">

			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Celular</th>
					<th>Correo</th>
					<th>Presupuesto</th>
					<th>Destino</th>
					<th>Fecha</th>
					<th>Observaciones</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody>
				<?php
					$tabla= new basedatos();
					$listado= $tabla->leer_tabla();

					while ( $row=mysqli_fetch_object($listado) ) {
						$id= $row->res_id;
						$nombre= $row->res_nombre;
						$celular= $row->res_celular;
						$correo= $row->res_correo;
						$presupuesto= $row->res_presupuesto;
						$destino= $row->res_destino;
						$fecha= $row->res_fecha;
						$observaciones= $row->res_observaciones;
				?>

					<tr>
						<td> <?php echo $id; ?> </td>
						<td> <?php echo $nombre; ?> </td>
						<td> <?php echo $celular; ?> </td>
						<td> <?php echo $correo; ?> </td>
						<td> <?php echo $presupuesto; ?> </td>
						<td> <?php echo $destino; ?> </td>
						<td> <?php echo $fecha; ?> </td>
						<td> <?php echo $observaciones; ?> </td>
						<td>
							<a href="eliminar_reserva.php?id=<?php echo $id; ?>">Eliminar</a>
							<a href="actualizar_reserva.php?id=<?php echo $id; ?>">Actualizar</a>
						</td>
					</tr>

				<?php
					}
				?>
			</tbody>

		</table>


		<button class="btn btn-warning" onclick="window.location.href='index.php'">Insertar nuevo</button>
        <button class="btn btn-warning" onclick="window.location.href='salir.php'">Salir</button>

    </div>


  

	
		


</body>
</html>