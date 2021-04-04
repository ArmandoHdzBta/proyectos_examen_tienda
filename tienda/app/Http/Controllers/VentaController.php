<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Usuario;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function pedidos()
    {
    	$usuarios = Usuario::where('id', '<>', session('usuario')->id)->get();
    	$ventas = Carrito::where('compra', 1)->get()->count();
    	$productos = Carrito::where('compra', 1)->get();
    	return view('total-pedidos', ['usuarios' => $usuarios, 'ventas' => $ventas, 'productos' => $productos]);
    }
    public function hacerCompra($idusuario)
    {
    	$carrito = Carrito::where('usuario_id', $idusuario)->where('compra', 0)->get();
    	foreach ($carrito as $producto) {
    		$producto->compra = 1;
    		$producto->save();
    	}
    	return json_encode(['estatus' => 'success', 'mensaje' => 'Productos comprados']);
    }
    public function misPedidos()
    {
    	$productos = Carrito::where('compra', 1)->where('usuario_id', session('usuario')->id)->get();
    	$ventas = Carrito::where('compra', 1)->where('usuario_id', session('usuario')->id)->get()->count();
    	return view('mis-pedidos', ['ventas' => $ventas ,'productos' => $productos]);
    }
}
