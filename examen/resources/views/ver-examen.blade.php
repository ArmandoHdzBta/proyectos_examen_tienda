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
                      			<strong>{{ $examen->nombre }}</strong>
                    		</p>
                    		<div class="row">
                          <div class="col-md-6">
                            <canvas id="myChart" width="150" height="100"></canvas>
                          </div>
                          <div class="col-md-6">
                            <p class="text-center text-white">Detalles</p>
                            <div class="row">
                              <p>Total de preguntas: <strong>{{ $pregunta }}</strong></p>
                            </div>
                            <div class="row">
                              <p>Total de preguntas correctas: <strong>{{ $respuestaOK }}</strong></p>
                            </div>
                            <div class="row">
                              <p>Total de preguntas fallidas: <strong>{{ $respuestaError }}</strong></p>
                            </div>
                            <div class="row">
                              <p>Total de usuarios: <strong>{{ $usuarios }}</strong></p>
                            </div>
                            <div class="row">
                              <p>Los mejores 5 puntuajes</p>
                              <ol type="1">
                              @foreach ($mejores as $mejor)
                                <li><p>{{ $mejor->nombre }}</p></li>
                              @endforeach
                              </ol>
                            </div>
                            <div class="row">
                              <p>Los bajos 5 puntuajes</p>
                              <ol type="1">
                              @foreach ($peores as $peor)
                                <li><p>{{ $peor->nombre }}</p></li>
                              @endforeach
                              </ol>
                            </div>
                          </div>
                        </div>
                  		</div>
                  		<!-- /.col -->
                	</div>
                  <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descargar PDF</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descargar PDF</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($usuarios_examen as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>
                                      <a href="{{ route('usuario.downPDF', ['id' => $usuario->id]) }}" target="_blank" class="btn btn-info" id="{{ $usuario->id }}">
                                        <span class="fas fa-download"></span>
                                      </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function (){
      $('#dataTable').DataTable();
    });
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Respuestas correctas', 'Respuestas incorrectas'],
          datasets: [{
              label: 'Respuestas correctas',
              data: [{{ $respuestaOK }}, {{ $respuestaError }}],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
    });
  </script>
@endsection