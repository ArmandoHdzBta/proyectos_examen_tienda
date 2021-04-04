@extends('layout.main')

@section('titulo')
	<title>Administrador | Home</title>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
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
                      			<strong>Examenes</strong>
                    		</p>
                    		<div class="col">
                    			<div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Accion</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Accion</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($examenes as $examen)
                                    <tr>
                                        <td>{{ $examen->id }}</td>
                                        <td>{{ $examen->nombre }}</td>
                                        <td>
                                          <a href="{{ route('admin.verExamen', ['id' => $examen->id]) }}" class="btn btn-info" id="{{ $examen->id }}">
                                            <span class="fas fa-eye"></span>
                                          </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">

    $(document).ready(function (){
      $('#dataTable').DataTable();
    });

  </script>
@endsection