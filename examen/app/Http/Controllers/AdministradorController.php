<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdministradorController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function login()
    {
    	return view('login');
    }

    public function registrar()
    {
    	return view('registrar');
    }

    public function home()
    {
        return view('home');
    }

    public function registro(Request $datos)
    {
    	if(!$datos->nombre || !$datos->app || !$datos->apm || !$datos->correo || !$datos->password1 || !$datos->password2)
            return view("registrar",["estatus"=> "error", "mensaje"=> "¡Falta información!"]);

    	$verificar = Administrador::where('correo', $datos->correo)->first();

    	if ($verificar)
    		return view('registrar', ['estatus' => 'error' ,'mensaje' => 'Ya existe esa cuenta']);

    	if ($datos->password1 != $datos->password2)
    		return view('registrar', ['estatus' => 'error' ,'mensaje' => 'Las contraseñas no coinciden']);

    	$nombre = $datos->nombre;
    	$app = $datos->app;
    	$apm = $datos->apm;
    	$correo = $datos->correo;
    	$password = $datos->password1;

    	$administrador = new Administrador();
 		$administrador->nombre = $nombre;
 		$administrador->apellido_pat = $app;
 		$administrador->apellido_mat = $apm;
    	$administrador->correo = $correo;
    	$administrador->password = bcrypt($password);
    	$administrador->save();

    	return view('login', ['estatus' => 'success' ,'mensaje' => 'Usuario registrado']);

    }

    public function verificarCredenciales(Request $datos)
    {
    	if (!$datos->correo || !$datos->password)
    		return view('login', ['estatus' => 'error', 'mensaje' => '¡Falta información!']);

    	$administrador = Administrador::where('correo', $datos->correo)->first();

    	if (!$administrador)
    		return view('login', ['estatus' => 'error', 'mensaje' => '¡No existe esa cuenta!']);

    	if (!Hash::check($datos->password, $administrador->password))
    		return view('login', ['estatus' => 'error', 'mensaje' => '¡Datos incorrectos!']);

    	Session::put('admin', $administrador);

    	if(isset($datos->url)){
            $url = decrypt($datos->url);
            return redirect($url);
        }else{
            return redirect()->route('admin.home');
        }
    }

    public function cerrarSesion(){
        if(Session::has('admin'))
            Session::forget('admin');

        return redirect()->route('login');
    }
}
