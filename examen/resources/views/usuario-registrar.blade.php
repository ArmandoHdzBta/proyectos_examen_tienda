@extends('layout.principal')

@section('titulo')
	<title>Registrate</title>
@endsection

@section('estilos')
	<style>
		.bg-personalizado{
			width: 100%;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		img{
			object-fit: cover;
		}
	</style>
@endsection

@section('contenido')
	<div class="bg-personalizado">
		<div class="container-md h-75">
			<div class="row h-75">
				<img src="https://www.hola.com/imagenes/estar-bien/20181009131055/libros-de-salud/0-607-970/Libros-Salud-2-m.jpg" class="w-50 col" alt="">
				<div class="col">
					<h1 class="text-center mb-2">Registrate</h1>
					@if (isset($estatus))
						<div class="alert alert-danger">
							{{ $mensaje }}
						</div>
					@endif
					<form action="{{ route('usuario.registroForm') }}" method="POST">
						@csrf
						<div class="input-group mb-3">
						  	<span class="input-group-text" id="basic-addon1">Nombre</span>
						  	<input type="text" name="nombre" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<div class="input-group mb-3">
						  	<span class="input-group-text" id="basic-addon1">Apellido paterno</span>
						  	<input type="text" name="app" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<div class="input-group mb-3">
						  	<span class="input-group-text" id="basic-addon1">Apellido materno</span>
						  	<input type="text" name="apm" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<div class="input-group mb-3">
						  	<span class="input-group-text" id="basic-addon1">@</span>
						  	<input type="text" name="correo" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">

						</div>
						@error('correo')
						  	<small class="text-danger">Forsozamente debe de ser un correo</small>
						@enderror
						<div class="row">
							<div class="col">
								<div class="input-group">
									<input class="form-control" name="password1" type="password" placeholder="Contraseña">
								</div>
							</div>
							<div class="col">
								<div class="input-group">
									<input class="form-control" name="password2" type="password" placeholder="Repite la contraseña">
								</div>
							</div>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-success w-100 btn-md mt-2">Registrar me</button>
						</div>
					</form>
					<hr>
					<a href="{{ route('usuario.login') }}" class="text-sm-left text-primary">¡Inicia sesión!</a>
				</div>
			</div>
		</div>
	</div>
@endsection