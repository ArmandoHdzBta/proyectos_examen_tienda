<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>PDF {{ $usuario->nombre }}</title>
</head>
<body class="dark-mode">
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6 m-auto">
				<div class="card ">
				  	<div class="card-body">
				    	<h5 class="card-title text-center">Reporte del examen de usuario {{ $usuario->id }}</h5>
				    	<p class="card-text"><strong>Nombre: </strong>{{ $usuario->nombre }}</p>
				    	<p class="card-text"><strong>Apellido paterno: </strong>{{ $usuario->apellido_pat }}</p>
				    	<p class="card-text"><strong>Apellido materno: </strong>{{ $usuario->apellido_mat }}</p>
				    	<p class="card-text"><strong>Examen: </strong>{{ $usuario->examen_id }}</p>
				    	<p class="card-text"><strong>Respuestas correctas: </strong>{{ $usuario->total_respuestas }}</p>
				    	<p class="card-text"><strong>Respuestas incorrectas: </strong>{{ $usuario->total_respuestas_mal }}</p>
				  	</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>