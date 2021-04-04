@extends('layout.main')

@section('titulo')
	<title>Productos | Administrador</title>
@endsection

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('contenido')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<p>Productos</p>
					</div>
					<div class="card-body">
						<table class="table" id="productos">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Cantidad</th>
									<th>Precio</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($productos as $producto)
									<tr>
										<td>{{ $producto->nombre }}</td>
										<td>{{ $producto->cantidad }}</td>
										<td>{{ $producto->precio }}</td>
										<td>
											<button type="button" class="btn btn-info" onclick="editar({{ $producto->id }})"><i class="fas fa-pen"></i></button>
										</td>
									</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>Nombre</th>
									<th>Cantidad</th>
									<th>Precio</th>
									<th>Accion</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6 m-auto">
				<div class="card">
					<div class="card-header">
						<p id="nomProducto">Producto: </p>
					</div>
					<div class="card-body">
						<form action="" method="POST" id="updateProducto">
							<input type="hidden" name="id" value="" id="idproducto">
							<div class="mb-3">
		 	 					<label for="nombre" class="form-label">Nombre</label>
		  						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
							</div>
							<div class="mb-3">
		 	 					<label for="precio" class="form-label">Precio</label>
		  						<input type="number" class="form-control" name="precio" id="precio" placeholder="Ej. 8.25">
							</div>
							<div class="mb-3">
		 	 					<label for="cantidad" class="form-label">Cantidad</label>
		  						<input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Ej. 10">
							</div>
							<div class="mb-3">
								<label for="descripcion" class="form-label">Descripcion</label>
							  	<textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
							</div>
							<button type="button" class="btn btn-success w-100" id="actualizar">Actualizar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready(function() {
    		$('#productos').DataTable();
		});

		$(document).ready(function() {
			$("#actualizar").click(function(event) {
				$.ajax({
					headers: {
	    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{ route('updateProducto') }}",
					type: 'POST',
					dataType: 'json',
					data: $("#updateProducto").serialize(),
					success: function (datos){
						if (datos.estatus = 'success'){
							alert(datos.mensaje);
							location.reload();
						}else{
							alert(datos.mensaje);
						}
					},
				});
			});
		});

		function editar(idproducto) {
			$.ajax({
				headers: {
    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{ route('obtenerDatosProducto') }}/" + idproducto,
				type: 'POST',
				dataType: 'json',
			})
			.done(function(data) {
				$("#idproducto").val(data.producto.id);
				$("#nombre").val(data.producto.nombre);
				$("#nomProducto").append(data.producto.nombre);
				$("#precio").val(data.producto.precio);
				$("#cantidad").val(data.producto.cantidad);
				$("#descripcion").val(data.producto.descripcion);
			});

		}
	</script>
@endsection