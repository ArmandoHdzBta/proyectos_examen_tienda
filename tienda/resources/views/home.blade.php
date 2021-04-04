@extends('layout.main')

@section('titulo')
	<title>Home</title>
@endsection

@section('contenido')
	<div class="container">
		<div class="row">
			@if (isset($productos))
				@if ($productos->count() > 0)
					@foreach ($productos as $producto)
						<div class="col-md-4 col-sm-6">
							<div class="card" style="width: 18rem;">
								<div id="{{ $producto->nombre }}" class="carousel slide" style="height: 12rem;" data-bs-ride="carousel">
									<div class="carousel-indicators">
										<button type="button" data-bs-target="#{{ $producto->nombre }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
										<button type="button" data-bs-target="#{{ $producto->nombre }}" data-bs-slide-to="1" aria-label="Slide 2"></button>
									</div>
									<div class="carousel-inner">
										<div class="carousel-item active">
							  				<img src="{{ Storage::url($producto->foto1) }}" accept="image/*" class="d-block w-100" alt="imagen1">
										</div>
										<div class="carousel-item">
									      	<img src="{{ Storage::url($producto->foto2) }}" accept="image/*" class="d-block w-100" alt="imagen2">
									    </div>
									</div>
								</div>
								<div class="card-body">
									<h5 class="card-title">{{ $producto->nombre }} <small>${{ $producto->precio }}</small></h5>
									<p class="card-text">{{ $producto->descripcion }}</p>
									<button type="button" value="{{ $producto->id }}" id="addCarrito" class="btn btn-primary">Añadir al carrito</button type="button">
							  	</div>
							</div>
						</div>
					@endforeach
				@else
					<div class="col-12 alert alert-secondary">
						<p>
							Aun no hay productos para mostrar
						</p>
					</div>
				@endif
			@endif
		</div>
	</div>
@endsection

@section('js')
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	<script>
		$(document).on('click', '#addCarrito', addCarrito);
    	function addCarrito(){
    		var id = $(this).val();
      		var cantidad = prompt('Cantidad');
      		if (cantidad == 0 || cantidad == '' || cantidad == null){
      			alert('La cantidad no puede ser 0')
      		}else{
      			$.ajax({
      				headers: {
        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    				},
      				url: "{{ route('addCarrito') }}/"+id+"/"+cantidad,
      				type: 'POST',
      				dataType: 'json',
      				success: function (data){
      					if (data.estatus == "success"){
      						alert(data.mensaje);
      					}else{
      						alert(data.mensaje)
      					}
      				},
      				error: function (){
      					alert("Inicia sesion o registrate para poder añadir productos a tu carrito");
      				},
      			});
      		}

    	}
	</script>

@endsection