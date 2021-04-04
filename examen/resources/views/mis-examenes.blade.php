@extends('layout.main-usuario')

@section('titulo')
	<title>{{ session('usuario')->nombre }} | Home</title>
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
                	<h5 class="card-title">Usuario: {{ session('usuario')->nombre }}</h5>
                	<div class="card-tools">
		                <button type="button" class="btn btn-tool" data-card-widget="collapse">
		                	<i class="fas fa-minus"></i>
		                </button>
                	</div>
              	</div>
              	<!-- /.card-header -->
              	<div class="card-body">
                	<div class="row">
                		<div class="col-md-6" id="grafica">
                            <canvas id="myChart" width="150" height="100"></canvas>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
  <script>
  	var buenas, malas;
  	$(document).ready(function() {
  		$.ajax({
  			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
  			url: '{{ route('usuario.misExamenesDatos') }}',
  			type: 'POST',
  			dataType: 'json',
  		})
  		.done(function(datos) {
  			$("#grafica").append('<p>Examen: '+datos.examenes.nombre+'</p>')
  			buenas = datos.usuario.total_respuestas;
  			malas = datos.usuario.total_respuestas_mal;
  			grafica();
  		});

  	});
    function grafica() {
    	var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
		  type: 'bar',
		  data: {
		      labels: ['Respuestas correctas', 'Respuestas incorrectas'],
		      datasets: [{
		          label: 'Respuestas correctas',
		          data: [buenas, malas],
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
    }
  </script>
@endsection