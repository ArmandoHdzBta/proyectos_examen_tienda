<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function addProducto()
    {
    	return view('add-producto');
    }
    public function productos()
    {
        $productos = Producto::all();
        return view('productos', ['productos' => $productos]);
    }
    public function addProductoNuevo(Request $datos)
    {
    	$datos->validate([
    		'img1' => 'required|image',
    		'img2' => 'required|image',
    	]);

    	if (!$datos->nombre || !$datos->precio || !$datos->cantidad || !$datos->descripcion)
    		return view('add-producto', ['estatus' => 'error', 'mensaje' => 'Ningun campo debe estar vacio']);

    	$producto = new Producto();
    	$producto->nombre = $datos->nombre;
    	$producto->precio = $datos->precio;
    	$producto->foto1 = $datos->file('img1')->store('public');
    	$producto->foto2 = $datos->file('img2')->store('public');
    	$producto->descripcion = $datos->descripcion;
    	$producto->cantidad = $datos->cantidad;
    	$producto->administrador_id = session('usuario')->id;
    	$producto->save();

    	return view('add-producto', ['estatus' => 'success', 'mensaje' => 'Producto guardado']);
    }
    public function obtenerDatosProducto($id)
    {
        $producto = Producto::where('id', $id)->first();
        return json_encode(['estatus' => 'success', 'producto' => $producto]);
    }
    public function updateProducto(Request $datos)
    {
        if (!$datos->nombre || !$datos->precio || !$datos->cantidad || !$datos->descripcion || !$datos->id)
            return json_encode(['estatus' => 'error', 'mensaje' => 'Los campos no pueden ser vacios']);

        $producto = Producto::find($datos->id);
        $producto->nombre = $datos->nombre;
        $producto->precio = $datos->precio;
        $producto->cantidad = $datos->cantidad;
        $producto->descripcion = $datos->descripcion;
        $producto->save();

        return json_encode(['estatus' => 'success', 'mensaje' => 'Actualizado']);
    }
}
