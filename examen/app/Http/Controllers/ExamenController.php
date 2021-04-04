<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ExamenController extends Controller
{

	public function viewExamen()
	{
		return view('crear-examen');
	}

	public function verExamen($id)
	{
		$examen = Examen::where('id', $id)->first();

		$pregunta = Pregunta::where('examen_id', $id)->get()->count();

		$respuestaOK = Respuesta::where('examen_id', $id)->where('estatus', 1)->get()->count();
		$respuestaError = Respuesta::where('examen_id', $id)->where('estatus', 0)->get()->count();

		$usuarios = Usuario::where('examen_id', $id)->get()->count();
        $usuarios_examen = Usuario::where('examen_id', $id)->get();

        $mejores = Usuario::where('examen_id', $id)->orderBy('total_respuestas','DESC')->take(5)->get();
        $peores = Usuario::where('examen_id', $id)->orderBy('total_respuestas','ASC')->take(5)->get();

		return view('ver-examen', ['examen' => $examen, 'pregunta' => $pregunta, 'respuestaOK' => $respuestaOK, 'respuestaError' => $respuestaError, 'usuarios' => $usuarios, 'usuarios_examen' => $usuarios_examen, 'mejores' => $mejores, 'peores' => $peores]);
	}

	public function viewExamenAll()
	{
		$examen = Examen::all();
		return view('examenes', ['examenes' => $examen]);
	}

    public function crearExamen(Request $datos)
    {
    	if (!$datos->nombre)
    		return view('crear-examen');

    	$examen = new Examen();
    	$examen->nombre = $datos->nombre;
    	$examen->administrador_id = session('admin')->id;
    	$examen->save();

    	$examenOk = Examen::orderBy('created_at','DESC')->first();

    	return view('crear-examen', ['examen' => $examenOk, "estatus" => 'succes', 'mensaje' => '¡Examen creado, añade las preguntas!']);

    }

    public function crearPreguntas(Request $datos){

    	for ($i=0; $i < sizeof($datos->texto); $i++) {
    		$pregunta = new Pregunta();
    		$pregunta->texto = $datos->texto[$i];
    		$pregunta->respuesta_ok = $datos->pregunta1[$i];
    		$pregunta->respuesta2 = $datos->pregunta2[$i];
    		$pregunta->respuesta3 = $datos->pregunta3[$i];
    		$pregunta->examen_id = $datos->examen_id;
    		$pregunta->save();
    	}
    	return view('crear-examen', ['estatusP' => 'success', 'mensaje' => '¡Preguntas añadidas!']);
    }

}
