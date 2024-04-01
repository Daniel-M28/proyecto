<div class="box box-info padding-1">
    <div class="box-body">


    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif


<div class="form-group">
        <label for="producto_id">Producto</label>
        <select name="producto_id" id="producto_id" class="form-control">
            <option value="">Seleccione un producto</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}" {{ $producto->id == $inventario->producto_id ? 'selected' : '' }}>
                    {{ $producto->titulo }}
                </option>
            @endforeach
        </select>
        @error('producto_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
        
        
        <div class="form-group">
            {{ Form::label('existencias') }}
            {{ Form::text('existencias', $inventario->existencias, ['class' => 'form-control' . ($errors->has('existencias') ? ' is-invalid' : ''), 'placeholder' => 'Existencias']) }}
            {!! $errors->first('existencias', '<div class="invalid-feedback">Las Existencias son requeridas</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('entradas') }}
            {{ Form::text('entradas', $inventario->entradas, ['class' => 'form-control' . ($errors->has('entradas') ? ' is-invalid' : ''), 'placeholder' => 'Entradas']) }}
            {!! $errors->first('entradas', '<div class="invalid-feedback">Las Entradas son requeridas</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('salidas') }}
            {{ Form::text('salidas', $inventario->salidas, ['class' => 'form-control' . ($errors->has('salidas') ? ' is-invalid' : ''), 'placeholder' => 'Salidas']) }}
            {!! $errors->first('salidas', '<div class="invalid-feedback">Las Salidas son requeridas</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">{{ __('Registrar') }}</button>
        <a class="btn btn-primary d-inline" href= "{{url('inventario/')}}"> Regresar</a>
    </div>
</div>

