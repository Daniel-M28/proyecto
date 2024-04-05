@extends('layouts.app')

@section('content')
    <div class="container" style="margin-left: 200px">
        <h1>Listado de Facturas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Factura</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Dirección de envío</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                    <th>Envío</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($facturas as $factura)
                   
                    @php
                        $productos = json_decode($factura->productos);
                        $subtotal = 0;
                    @endphp

                    @foreach($productos as $key => $producto)
                        @php
                            $subtotal += $producto->cantidad * $producto->precio;
                        @endphp
                        <tr>
                            
                            @if ($loop->first)
                                <td rowspan="{{ count($productos) }}">{{ $factura->id_factura }}</td>
                                <td rowspan="{{ count($productos) }}">{{ $factura->fecha }}</td>
                                <td rowspan="{{ count($productos) }}">{{ $factura->cliente }}</td>
                                <td rowspan="{{ count($productos) }}">{{ $factura->direccion_envio }}</td>
                            @endif
                            
                           
                            <td>{{ $producto->titulo }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->cantidad * $producto->precio }}</td>
                            
                           
                            @if ($loop->first && $key == 0)
                                <td rowspan="{{ count($productos) }}">{{ $factura->envio }}</td>
                                <td rowspan="{{ count($productos) }}">{{ $factura->total }}</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
