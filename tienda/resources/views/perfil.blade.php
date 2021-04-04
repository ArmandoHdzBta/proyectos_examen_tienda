@extends('layout.main')

@section('titulo')
	<title>Perfil | {{ $usuario->nombre }} </title>
@endsection

@section('contenido')
	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-header">
					<h1>¡Hola {{ $usuario->nombre }}!</h1>
				</div>
				<div class="card-body">
					<form method="POST" id="updateForm">
						@csrf
						<input type="hidden" name="id" value="{{ $usuario->id }}">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<div class="mb-3">
					 	 					<label for="nombre" class="form-label">Nombre</label>
					  						<input type="text" class="form-control" value="{{ $usuario->nombre }}" name="nombre" id="nombre" placeholder="Nombre">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="mb-3">
					 	 					<label for="app" class="form-label">Apellido paterno</label>
					  						<input type="text" class="form-control" value="{{ $usuario->apellido_pat }}" name="app" id="app" placeholder="Apellido paterno">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="mb-3">
					 	 					<label for="apm" class="form-label">Apellido materno</label>
					  						<input type="text" class="form-control" value="{{ $usuario->apellido_mat }}" name="apm" id="apm" placeholder="Apellido materno">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<div class="mb-3">
					 	 					<label for="correo" class="form-label">Correo</label>
					  						<input type="mail" class="form-control" value="{{ $usuario->correo }}" name="correo" id="correo" placeholder="Correo">
										</div>
									</div>
								</div>
							</div>
						</div>
						<button type="button" id="btn-actualizar" class="btn btn-primary">Actualizar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		$(document).ready(function() {
			$('#btn-actualizar').click(function(event) {
				var datos = $("#updateForm").serialize();
				$.ajax({
					headers: {
        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    				},
					url: '{{ route('updateUsuario') }}',
					type: 'POST',
					dataType: 'json',
					data: datos,
					success: function (data){
						if (data.estatus == 'success'){
							alert(data.mensaje);
							location.reload();
						}else{
							alert(data.mensaje);
						}
					},
				});
			});
			return false;
		});
	</script>
@endsection