<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Usuario;
use App\Models\Examen;
use App\Mail\ResultadosMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    public function verificarRespuestas(Request $datos)
    {

    	$respuestas = Pregunta::select('respuesta_ok','respuesta2','respuesta3')->where('examen_id', $datos->examen_id)->get();

    	$respuesta_ok = [];

    	foreach ($respuestas as $respuesta) {
    		array_push($respuesta_ok, $respuesta->respuesta_ok);
    	}

    	foreach ($datos->respuesta as $v) {
    		$respuesta = new Respuesta();
    		$respuesta->pregunta_id = $datos->pregunta_id;
    		$respuesta->examen_id = $datos->examen_id;
    		$respuesta->usuario_id = session('usuario')->id;
    		if(in_array($v, $respuesta_ok)){
    			$respuesta->respuesta = $v;
    			$respuesta->estatus = 1;
    		}else{
    			$respuesta->respuesta = $v;
    			$respuesta->estatus = 0;
    		}

    		$respuesta->save();
    	}

    	$usuario_preguntas_total = Respuesta::where('examen_id', $datos->examen_id)->where('estatus','1')->get()->count();

    	$usuario_preguntas_total_mal = Respuesta::where('examen_id', $datos->examen_id)->where('estatus','0')->get()->count();

    	$usuario = Usuario::find(session('usuario')->id);
    	$usuario->total_respuestas = $usuario_preguntas_total;
    	$usuario->total_respuestas_mal = $usuario_preguntas_total_mal;
    	$usuario->save();

        $usuarioMail = Usuario::where('id', session('usuario')->id)->first();

    	return view('examen-ok', ['estatus' => 'success', 'mensaje' => 'Examen contestado']);
    }

    public function mail($idexamen)
    {
    	$examen = Examen::where('id', $idexamen)->first();
    	return json_encode($examen);
    }

}
