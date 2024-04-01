
@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Lista de Facturas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Factura</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
                @php
                    $fileName = basename($factura);
                    $idFactura = str_replace('factura-', '', str_replace('.pdf', '', $fileName));
                @endphp
                <tr>
                    <td>{{ $idFactura }}</td>
                    <td>{{ date('d/m/Y H:i', filemtime(storage_path('app/'.$factura))) }}</td>
                    <td>
                        <a href="{{ asset('storage/'.$factura) }}" target="_blank" class="btn btn-primary">Ver</a>
                        <a href="{{ route('descargar.factura', $idFactura) }}" class="btn btn-success">Descargar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
