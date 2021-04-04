@extends('layout.principal')

@section('titulo')
	<title>Log in</title>
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
			<div class="row h-75 overflow-hidden">
				<img src="https://www.hola.com/imagenes/estar-bien/20181009131055/libros-de-salud/0-607-970/Libros-Salud-2-m.jpg" class="w-50 col" alt="">
				<div class="col">
					<h1 class="text-center mb-2">Inicia sesion</h1>
					@if (isset($estatus))
						@if ($estatus == 'error')
							<div class="alert alert-danger">
								{{ $mensaje }}
							</div>
						@else
							<div class="alert alert-success">
								{{ $mensaje }}
							</div>
						@endif
					@endif
					<form action="{{ route('usuario.verificarCredenciales') }}" method="POST">
						@csrf
						<div class="input-group mb-3">
						  	<span class="input-group-text" id="basic-addon1">@</span>
						  	<input type="text" name="correo" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<div class="input-group">
							<input class="form-control" name="password" type="password" placeholder="Cpntraseña">
						</div>
						<div class="col-12">
							<button class="btn btn-success w-100 btn-md mt-2">Entrar</button>
						</div>
						@if(isset($_GET["r"]))
                            <input type="hidden" name="url" value="{{$_GET["oops"]}}">
                        @endif
					</form>
					<hr>
					<a href="{{ route('usuario.registrar') }}" class="text-sm-left text-primary">¡Registrate quí!</a>
				</div>
			</div>
		</div>
	</div>
@endsection