@extends('layout.main')

@section('titulo')
	<title>Carrito | {{ session('usuario')->nombre }}</title>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-10 m-auto">
			<div class="card">
				<div class="card-header">
					Mi carrito de compras
				</div>
				<div class="card-body">
					@foreach ($productos as $producto)
						<div class="row border border-info mb-2">
							<div class="col-md-4 border border-right">
								<div class="row">
									<p># Producto</p>
								</div>
								<div class="row">
									<input class="form-control" readonly type="text" name="id" value="{{ $producto->producto_id }}" id="">
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-4">
										Cantidad
									</div>
									<div class="col-md-4">
										Precio total
									</div>
									<div class="col-md-4">
										Agregado
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<input class="form-control" readonly type="text" name="id" value="{{ $producto->cantidad }}" id="">
									</div>
									<div class="col-md-4">
										<input class="form-control" readonly type="text" name="id" value="{{ $producto->precio }}" id="">
									</div>
									<div class="col-md-4">
										{{ $producto->created_at }}
									</div>
								</div>
							</div>
							<button class="btn btn-danger mt-1 mb-1" type="button" value="{{ $producto->id }}" id="borrar"><i class="fas fa-trash"></i></button>
						</div>
					@endforeach
				</div>
				<div class="card-footer">
					<div class="row">
						<button type="button" class="btn btn-success" id="comprar">Comprar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		$(document).on('click', '#borrar', eliminar);
		function eliminar() {
			var id = $(this).val();
			$.ajax({
				headers: {
    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{ route('eliminarProductoCarrito') }}/" + id,
				type: 'POST',
				dataType: 'json',
			})
			.done(function(respuesta) {
				if (respuesta.estatus == 'success'){
					alert(respuesta.mensaje);

				}
			});
			$(this).parent().remove();
		}
		$(document).ready(function() {
			$("#comprar").click(function(event) {
				$.ajax({
					headers: {
	    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{ route('hacerCompra') }}/" + {{ session('usuario')->id }},
					type: 'POST',
					dataType: 'json',
					success: function (data){
						if (data.estatus == 'success'){
							alert(data.mensaje);
							location.reload();
						}
					},
				});

			});
		});
	</script>
@endsection