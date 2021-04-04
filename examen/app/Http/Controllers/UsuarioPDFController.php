<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use PDF;
use Illuminate\Http\Request;

class UsuarioPDFController extends Controller
{
    public function PDF($id)
    {
    	$usuario = Usuario::where('id', $id)->first();

    	$pdf = PDF::loadView('usuario-pdf', compact('usuario'));

    	return $pdf->download($usuario->nombre.'_'.$usuario->id.'.pdf');
    }
}
