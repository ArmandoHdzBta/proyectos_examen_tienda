<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Puntuaje</title>
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Theme style -->
  	<link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="dark-mode">
	<div class="container-fluid">
		<div class="row mt-5">
			<div class="col-6 m-auto">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<h1 class="text-center text-success">Puntuaje de examen</h1>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="row">
								<p id="desc">¡Hola {{ session('usuario')->nombre }} {{ session('usuario')->apellido_pat }} {{ session('usuario')->apellido_mat }} te mostramos el resultado que obtuviste en el examen</p>
							</div>
							<div class="row">
								<h3 class="text-center text-white">Puntuaje:</h3>
								<p class="text-center text-white">Respuestas correctas: {{ session('usuario')->total_respuestas }}</p>
								<p class="text-center text-white">Respuestas incorrectas: {{ session('usuario')->total_respuestas_mal }}</p>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<p>
							<strong>*Nota: </strong>No respondas a este correo.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script src="/plugins/jquery/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: "{{ route('usuario.mail', ['idexamen' => session('usuario')->examen_id]) }}",
				type: 'POST',
				dataType: 'json',
			})
			.done(function(r) {
				$("#desc").append('<p>'+r.nombre+'</p>');
			});
		});
	</script>
</body>
</html>