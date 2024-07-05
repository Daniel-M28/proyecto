<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Models\Producto;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::paginate();

        return view('inventario.index', compact('inventarios'))
            ->with('i', (request()->input('page', 1) - 1) * $inventarios->perPage());
    }

    public function create()
    {
        $inventario = new Inventario();
        $productos = Producto::all();

        return view('inventario.create', compact('inventario', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'existencias' => 'required',
            'entradas' => 'required',
            'salidas' => 'required',
        ]);

        $productoExistente = Inventario::where('producto_id', $request->input('producto_id'))->exists();
        if ($productoExistente) {
            return redirect()->back()->with('error', 'El producto ya existe en el inventario');
        }

        $inventario = new Inventario();
        $inventario->producto_id = $request->input('producto_id');
        $inventario->existencias = $request->input('existencias');
        $inventario->entradas = $request->input('entradas');
        $inventario->salidas = $request->input('salidas');
        $inventario->save();

        // Actualizar las existencias del producto
        $producto = Producto::find($inventario->producto_id);
        $producto->existencias = $inventario->existencias;
        $producto->save();

        return redirect()->route('inventario.index')
            ->with('success', 'Producto agregado al inventario con éxito');
    }

    public function show($id)
    {
        $inventario = Inventario::find($id);

        return view('inventario.show', compact('inventario'));
    }

    public function edit($id)
    {
        $inventario = Inventario::find($id);
        $productos = Producto::all();

        return view('inventario.edit', compact('inventario', 'productos'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'producto_id' => 'required',
            'existencias' => 'required',
            'entradas' => 'required',
            'salidas' => 'required',
        ]);

        $inventario->update([
            'producto_id' => $request->input('producto_id'),
            'existencias' => $request->input('existencias'),
            'entradas' => $request->input('entradas'),
            'salidas' => $request->input('salidas'),
        ]);

        // Actualizar las existencias del producto
        $producto = Producto::find($inventario->producto_id);
        $producto->existencias = $inventario->existencias;
        $producto->save();

        return redirect()->route('inventario.index')
            ->with('success', 'Producto actualizado con éxito');
    }


    public function destroy($id)
    {
        $inventario = Inventario::find($id);
        $inventario->delete();

        return redirect()->route('inventario.index')
            ->with('success', 'Producto eliminado con éxito');
    }

    public function getExistencias(Request $request)
{
    $idsProductos = $request->input('ids', []);

    $existencias = Producto::whereIn('id', $idsProductos)->pluck('existencias', 'id');

    return response()->json($existencias);
}


public function reducirInventario(Request $request)
    {
        $productos = $request->input('productos', []);

        foreach ($productos as $producto) {
            $productoModel = Producto::find($producto['id']);
            if ($productoModel) {
                $productoModel->existencias -= $producto['cantidad'];
                $productoModel->save();
            }
        }

        return response()->json(['message' => 'Inventario actualizado con éxito']);
    }

}
