@extends('layout.main')

@section('titulo')
	<title>Administrador | Crear examen</title>
@endsection

@section('contenido')
	<div class="row mt-5">
        @if (isset($estatusP))
          <div class="alert alert-success">
            {{ $mensaje }}
          </div>
        @endif
        @if (isset($estatus))
          <div class="alert alert-success">
            {{ $mensaje }}
          </div>
        @endif
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
                      			<strong>Examen</strong>
                    		</p>
                    		<div class="col">
                    			<form action="" method="POST">
                            @csrf
                    				<div class="form-group" id="titulo">
                    					<label for="exampleInputEmail1" class="form-label">Nombre del examen: </label>
                    					<input type="text" class="form-control" name="nombre">
                    				</div>
                            <hr>
                    				<div class="col-12">
                    					<button type="submit" class="btn btn-success w-100">Crear examen</button>
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
         @if (isset($examen))
         <div class="col-md-12" id="preguntas">
           <div class="card">
                <div class="card-header">
                  <h5 class="card-title">{{ $examen->nombre }}</h5>
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
                            <strong>Examen</strong>
                        </p>
                        <div class="col">
                          <form action="{{ route('admin.examen.preguntas') }}" method="POST">
                            @csrf
                            <input type="hidden" name="examen_id" value="{{ $examen->id }}">
                            <button class="btn btn-primary" type="button" id="addPregunta">
                              añadir pregunta
                            </button>
                            <hr>
                            <div class="col-12">
                              <button type="submit" class="btn btn-success w-100">Añadir preguntas</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
            </div>
         </div>
         @endif
    </div>
    <template id="pregunta">
      <div class="row">
        <div class="col-11">
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Pregunta</label>
            <input type="text" class="form-control" name="texto[]">
          </div>
          <div class="input-group">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="radio" value="" aria-label="Radio button for following text input">
            </div>
            <input type="text" class="form-control" name="pregunta1[]" aria-label="Text input with radio button">
          </div>
          <div class="input-group">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="radio" value="" aria-label="Radio button for following text input">
            </div>
            <input type="text" class="form-control" name="pregunta2[]" aria-label="Text input with radio button">
          </div>
          <div class="input-group">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="radio" value="" aria-label="Radio button for following text input">
            </div>
            <input type="text" class="form-control" name="pregunta3[]" aria-label="Text input with radio button">
          </div>
        </div>
        <button class="btn btn-danger" type="button" id="borrar">
          Eliminar
        </button>
        <hr>
      </div>
    </template>
@endsection

@section('script')
  <script>
    $(document).ready(function() {

      var html = $("#pregunta").html();

      $('#addPregunta').click(function(event) {
        $(this).before(html);
      });

    });
    $(document).on('click', '#borrar', eliminarElemento);
    function eliminarElemento(){
      $(this).parent().remove();
    }
  </script>
@endsection