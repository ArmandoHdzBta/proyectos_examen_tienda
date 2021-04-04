@extends('layout.main')

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
                  		<div class="col-md-12">
                    		<p class="text-center">
                      			<strong>{{ $examen->nombre }}</strong>
                    		</p>
                    		<div class="col">
                          @error('respuesta')
                            <div class="alert alert-danger">
                              Debes de responder todas las preguntas
                            </div>
                          @enderror
                          <form action="{{ route('usuario.verificarRespuestas') }}" method="POST">
                            @csrf
                            @foreach ($preguntas as $pregunta)
                              <div class="row">
                                <div class="">
                                  <label for="exampleFormControlInput1" id="{{ $pregunta->id }}" class="form-label">{{ $pregunta->texto }}</label>
                                  <input type="hidden" name="pregunta_id" value="{{ $pregunta->id }}">
                                  <input type="hidden" name="examen_id" value="{{ $examen->id }}">
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" name="respuesta[{{ $pregunta->id }}]" value="{{ $pregunta->respuesta_ok }}" type="radio" >
                                  <label class="form-check-label" for="flexRadioDefault1">
                                    {{ $pregunta->respuesta_ok }}
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" name="respuesta[{{ $pregunta->id }}]" value="{{ $pregunta->respuesta2 }}" type="radio" >
                                  <label class="form-check-label" for="flexRadioDefault1">
                                    {{ $pregunta->respuesta2 }}
                                  </label>
                                </div>
                                <div class="form-check mb-3">
                                  <input class="form-check-input" name="respuesta[{{ $pregunta->id }}]" value="{{ $pregunta->respuesta3 }}" type="radio" >
                                  <label class="form-check-label" for="flexRadioDefault1">
                                    {{ $pregunta->respuesta3 }}
                                  </label>
                                </div>
                              </div>
                            @endforeach
                            <button type="submit" class="btn btn-success" id="">
                              Enviar examen
                            </button>
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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">

    $(document).ready(function (){
      $('#dataTable').DataTable();

    });

  </script>
@endsection