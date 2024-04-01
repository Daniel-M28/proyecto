

<div class="box box-info padding-1">

    <div class="box-body">
  

    <div class="form-group">
            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', $nombreUsuario, ['class' => 'form-control', 'readonly' => 'readonly']) }}
        </div>

        <div class="form-group">
            {{ Form::label('cedula') }}
            {{ Form::text('cedula', $cita->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Cedula']) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">La Cedula es requerida</div>') !!}
        </div>

        <div class="form-group">
            <label for="fecha">Fecha y Hora:</label>
            <input placeholder="Fecha y Hora" type="datetime-local" id="fecha" name="fecha" class="form-control" required>
        </div>

        <!-- Agregamos un mensaje para indicar horas ocupadas -->
        <p id="mensaje-hora-ocupada" style="color: red; display: none;">La hora seleccionada no está disponible. Por favor, seleccione otra hora.</p>

    
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">{{ __('Agendar') }}</button>
        <a class="btn btn-primary d-inline" href= "{{url('citas/')}}"> Regresar</a>
    </div>
</div>
<br>
<div id="citas-ocupadas-info" style="display: none;">
    <h4>Citas ocupadas para este día:</h4>
    <ul id="citas-ocupadas-list"></ul>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    var citasOcupadas = {!! json_encode($citasOcupadas) !!};

    flatpickr("#fecha", {
        enableTime: true,
        dateFormat: "Y-m-d\\TH:i",
        minDate: "today",
        minuteIncrement: 60,
        minTime: "09:00",
        maxTime: "18:00",
       
        onChange: function(selectedDates, dateStr, instance) {
            var dateTime = dateStr + ':00'; 

            // Obtener las citas ocupadas para este día
            var fechaSeleccionada = selectedDates[0];
            var citasParaEsteDia = citasOcupadas.filter(function(cita) {
                return new Date(cita).toDateString() === fechaSeleccionada.toDateString();
            });

            
            citasParaEsteDia.sort(function(a, b) {
                return new Date(a) - new Date(b);
            });

            
            var citasOcupadasInfo = document.getElementById('citas-ocupadas-info');
            var citasOcupadasList = document.getElementById('citas-ocupadas-list');

         
            if (citasOcupadas.includes(dateTime)) {
                alert('¡Este horario no está disponible! Por favor, seleccione otro horario.');
                return; 
            }

            
            if (citasParaEsteDia.length > 0) {
                
                citasOcupadasList.innerHTML = '';

                
                citasParaEsteDia.forEach(function(cita) {
                    var listItem = document.createElement('li');
                    listItem.textContent = new Date(cita).toLocaleTimeString();
                    citasOcupadasList.appendChild(listItem);
                });

                
                citasOcupadasInfo.style.display = 'block';
            } else {
                
                citasOcupadasInfo.style.display = 'none';
            }
        }
    });
</script>


<style>
    .hora-ocupada {
        color: red !important; 
    }

    .hora-disponible {
        color: green !important; 
    }
</style>








