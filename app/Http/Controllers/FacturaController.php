<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;


class FacturaController extends Controller
{

    public function index()
    {
        $facturas = Factura::all();
        return view('facturas.index', ['facturas' => $facturas]);
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'id_factura' => 'required|string',
        'fecha' => 'required|date',
        'cliente' => 'required|string',
        'direccion_envio' => 'required|string',
        'productos' => 'required|string',
        'envio' => 'required|numeric',
        'total' => 'required|numeric',
    ]);

    try {
        Factura::create($data);
        
        // Genera la factura en HTML
        $facturaHTML = $this->generarFacturaHTML($data);
        
        return response($facturaHTML);

    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al guardar la factura'], 500);
    }
}

private function generarFacturaHTML($data) {
  
    $facturaHTML = "<html><head><title>Factura</title></head><body>";
    $facturaHTML .= "<h1>Factura</h1>";
    $facturaHTML .= "<p>ID Factura: " . $factura->id_factura . "</p>";
    $facturaHTML .= "<p>Fecha: " . $factura->fecha . "</p>";
    $facturaHTML .= "<p>Cliente: " . $factura->cliente . "</p>";
    $facturaHTML .= "<p>Dirección de envío: " . $factura->direccion_envio . "</p>";
    $facturaHTML .= "<h2>Productos</h2>";
    $facturaHTML .= "<ul>";
    foreach($productos as $producto) {
        $facturaHTML .= "<li>" . $producto->nombre . " - Cantidad: " . $producto->cantidad . " - Precio: " . $producto->precio . "</li>";
    }
    $facturaHTML .= "</ul>";

    $facturaHTML .= "<p>Envío: " . $factura->envio . "</p>";
    $facturaHTML .= "<p>Total: " . $factura->total . "</p>";

    $facturaHTML .= "</body></html>";

    return $facturaHTML;
}




}
