@extends('layout.main')

@section('titulo')
	<title>Pedidos | Administrador</title>
@endsection

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-10 m-auto">
			<div class="card">
				<div class="card-header">
					<h2>Pedidos totales</h2>
				</div>
				<div class="card-body">
					<div class="col-lg-3 col-6">
            			<!-- small card -->
			            <div class="small-box bg-info">
			              	<div class="inner">
			              		@if (isset($ventas))
			              			<h3>{{ $ventas }}</h3>
			              		@else
			              			<h3>0</h3>
			              		@endif
			                	<p>Total de pedidos</p>
			              	</div>
			              	<div class="icon">
			                	<i class="fas fa-shopping-cart"></i>
			              	</div>
			            </div>
			        </div>
					<table id="productos" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col"># Producto</th>
								<th scope="col"># Usuario</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Precio total</th>
								<th scope="col">Fecha</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach ($productos as $pedido)
								<tr>
									<th scope="row">{{ $pedido->id }}</th>
									<td>{{ $pedido->producto_id }}</td>
									<td>{{ $pedido->usuario_id }}</td>
									<td>{{ $pedido->cantidad }}</td>
									<td>${{ $pedido->precio }}</td>
									<td>{{ $pedido->updated_at }}</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th scope="col">#</th>
								<th scope="col"># Producto</th>
								<th scope="col"># Usuario</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Precio total</th>
								<th scope="col">Fecha</th>
							</tr>
						</tfoot>
					</table>
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
	</script>
@endsection