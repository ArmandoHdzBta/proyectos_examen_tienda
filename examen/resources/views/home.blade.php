@extends('layout.main')

@section('titulo')
	<title>Administrador | Home</title>
@endsection

@section('contenido')
	<div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
              	<div class="card-header">
                	<h5 class="card-title">Usuario: {{ session('admin')->nombre }}</h5>
                	<div class="card-tools">
		                <button type="button" class="btn btn-tool" data-card-widget="collapse">
		                	<i class="fas fa-minus"></i>
		                </button>
                	</div>
              	</div>
              	<!-- /.card-header -->
              	<div class="card-body">
                	<div class="row">
                  		<div class="col-md-12">
                    		<p class="text-center">
                      			<strong>Datos Personales</strong>
                    		</p>
                    		<div class="col">
                    			<form action="">
                    				<input type="hidden" name="id" value="{{ session('admin')->id }}">
                    				<div class="form-group">
                    					<label for="exampleInputEmail1" class="form-label">Nombre: </label>
                    					<input type="text" class="form-control" name="correo" value="{{ session('admin')->nombre }}">
                    				</div>
                    				<div class="input-group">
            										<span class="input-group-text">Apellidos</span>
          										<input type="text" value="{{ session('admin')->apellido_pat }}" placeholder="Apellido Paterno" class="form-control">
          									  	<input type="text" value="{{ session('admin')->apellido_mat }}" placeholder="Apellido Materno" class="form-control">
          									</div>
                    				<div class="form-group">
                    					<label for="exampleInputEmail1" class="form-label">Correo: </label>
                    					<input type="text" class="form-control" name="correo" value="{{ session('admin')->correo }}">
                    				</div>
                    				<div class="col-12">
                    					<button class="btn btn-success w-100">Actualizar</button>
                    				</div>
                    			</form>
                    		</div>
                  		</div>
                  		<!-- /.col -->
                	</div>
                	<!-- /.row -->
              	</div>
            </div>
            <!-- /.card -->
        </div>
         <!-- /.col -->
    </div>
@endsection

@section('script')

@endsection