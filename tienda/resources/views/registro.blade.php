@extends('layout.layout')

@section('titulo')
  <title>Registro | Tienda</title>
@endsection

@section('formulario')
  <p class="login-box-msg">Registrate para poder comprar</p>
  @if (isset($estatus))
      @if ($estatus == 'success')
        <div class="alert alert-warning" role="alert">
          {{ $mensaje }}
        </div>
      @else
        <div class="alert alert-danger" role="alert">
          {{ $mensaje }}
        </div>
      @endif
  @endif
  <form action="{{ route('registrar') }}" method="post">
    @csrf
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="nombre" placeholder="Nombre">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="app" placeholder="Apellido paterno">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="apm" placeholder="Apellido materno">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="email" class="form-control" name="correo" placeholder="Correo">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="password" class="form-control" name="password1" placeholder="Contraseña">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="password" class="form-control" name="password2" placeholder="Repite la Contraseña">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block w-100">Registrate</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
  <p class="mb-0">
    <a href="{{ route('login') }}" class="text-center">Iniciar sesion</a>
  </p>
  <p class="mb-0">
    <a href="{{ route('home') }}" class="text-center">Home</a>
  </p>
@endsection