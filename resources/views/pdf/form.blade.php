
@extends('layouts.app')

@section('content')


<div style="margin-left: 250px">
    @if(session('pdfPath'))
        <p>PDF cargado correctamente. <a href="{{ url('/descargar-pdf/'.basename(session('pdfPath'))) }}">Descargar</a></p>
    @endif
@can ('cargar-pdf')
    <form action="{{ url('/cargar-pdf') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h2 style="color: #48e">Cargar certificados medicos </h2> <br>
        <label  for="pdf">Cargar PDF:</label>
        <input type="file" name="pdf" accept=".pdf" required>
        <button class="btn btn-success" type="submit">Cargar</button>
    </form>
@endcan
    @if($pdfFiles)
    <br>
        <h2 style="color: #48e">Lista de certificados cargados</h2>
        <ul>
            @foreach($pdfFiles as $file)
                <li class="d-flex justify-content-between align-items-center">
                    <span style="margin-left:-25px">{{  $file['name'] }} </span>
                    <div class="d-flex">
                    <a class="btn btn-primary mr-2 mt-2"  href="{{ url('/ver-pdf/'.$file['filename']) }}" target="_blank">Ver</a>
                    <a class="btn btn-success mr-2 mt-2"  href="{{ url('/descargar-pdf/'.$file['filename']) }}" download>Descargar</a>
                    
                    @can ('eliminar-pdf')
                    <a class="btn btn-danger mt-2" href="{{ url('/eliminar-pdf/'.$file['filename']) }}">Eliminar</a>
                    @endcan
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>


@endsection