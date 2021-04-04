@extends('layout.main')

@section('titulo')
	<title>Tienda | Añadir nuevo producto</title>
@endsection

@section('contenido')
	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-header col-md-10 m-auto">
					<h1 class="text-center">Añadir nuevo producto</h1>
					@if (isset($estatus))
						@if ($estatus == 'error')
							<div class="alert alert-warning">
								{{ $mensaje }}
							</div>
						@else
							<div class="alert alert-success">
								{{ $mensaje }}
							</div>
						@endif
					@endif
				</div>
				<div class="card-body col-md-10 m-auto">
					<form action="{{ route('addProductoNuevo') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-4">
								<div class="mb-3">
			 	 					<label for="nombre" class="form-label">Nombre</label>
			  						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
			 	 					<label for="precio" class="form-label">Precio</label>
			  						<input type="number" class="form-control" name="precio" id="precio" placeholder="Ej. 8.25">
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
			 	 					<label for="cantidad" class="form-label">Cantidad</label>
			  						<input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Ej. 10">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="mb-3">
  									<label for="descripcion" class="form-label">Descripcion</label>
								  	<textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="mb-3">
								  		<label for="img1" class="form-label">Imagen 1</label>
								  		<input class="form-control" name="img1" accept="image/*" type="file" id="img1">
									</div>
								</div>
								@error('img1')
									<small class="text-danger">Solo deben de ser imagenes</small>
								@enderror
								<div class="row">
									<div class="mb-3">
								  		<label for="img2" class="form-label">Imagen 2</label>
								  		<input class="form-control" name="img2" accept="image/*" type="file" id="img2">
									</div>
								</div>
								@error('img2')
									<small class="text-danger">Solo deben de ser imagenes</small>
								@enderror
							</div>
						</div>
						<button class="btn btn-success">Añadir Producto</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	{{-- expr --}}
@endsection