<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function addCarrito($idproducto ,$cantidad)
    {
    	$producto = Producto::where('id', $idproducto)->first();

    	if(!($producto->cantidad >= $cantidad))
    		return json_encode(['estatus' => 'error', 'mensaje' => 'No hay esa cantidad de productos disponibles']);

    	$total_precio = $producto->precio * $cantidad;

    	$carrito = new Carrito();
    	$carrito->producto_id = $producto->id;
    	$carrito->usuario_id = session('usuario')->id;
    	$carrito->cantidad = $cantidad;
    	$carrito->precio = $total_precio;
    	$carrito->save();

    	$producto->cantidad = $producto->cantidad - $cantidad;
    	$producto->save();

    	return json_encode(['estatus' => 'success', 'mensaje' => 'Añadido al carrito']);
    }
    public function miCarrito()
    {
    	$productos = Carrito::where('usuario_id', session('usuario')->id)->where('compra', 0)->get();
    	return view('mi-carrito', ['productos' => $productos]);
    }
    public function eliminarProductoCarrito($id)
    {
    	$productoCarrito = Carrito::find($id);

    	$producto = Producto::where('id', $productoCarrito->producto_id)->first();
    	$producto->cantidad = $producto->cantidad + $productoCarrito->cantidad;
    	$producto->save();

    	$productoCarrito->delete();

    	return json_encode(['estatus' => 'success', 'mensaje' => 'Pedido cancelado']);
    }
}
