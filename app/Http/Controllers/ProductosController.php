<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Models\Producto;

class ProductosController extends Controller
{
    public function actualizarExistenciasInventario($producto_id, $cantidad)
    {
        $inventario = Inventario::where('producto_id', $producto_id)->firstOrFail();
        $inventario->existencias -= $cantidad;
        $inventario->save();

        // Actualizar las existencias del producto
        $producto = Producto::find($producto_id);
        $producto->existencias = $inventario->existencias;
        $producto->save();
    }
}

