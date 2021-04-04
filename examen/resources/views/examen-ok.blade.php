@extends('layout.principal')

@section('title')
    <title>Bienvenida</title>
@endsection

@section('estilos')
    <style>
        .parallax{
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(https://mx.linguland.com/pics//backgr-pics/Cambridge.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            width: 100%;
        }
    </style>
@endsection

@section('contenido')
    <div class="parallax">
        <div class="row w-100 h-100">
            <div class="d-flex align-items-center justify-content-center align-self-center">
                <div class="container-fluid">
                    <div class="row">
                        <h1 class="text-white text-center">Examen ya contestado</h1>
                        <div class="row">
                            <div class="col-3 m-auto">
                                <a href="{{ route('usuario.viewExamenAll') }}" class="btn btn-success text-white">Ver examenes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection