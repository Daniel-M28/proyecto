<!-- resources/views/inicio.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Contenido de la página 'inicio' -->

<div style= "margin-left:230px">
<h1 style="color:#48e"> Preguntas frecuentes </h1>

<p style="color:#48e">1.¿Cómo realizar compras? </p> 

¡Es muy fácil! Solo debes seguir los siguientes pasos: <br><br>

1.Ingresa a la opcion tienda en la pantalla principal o el menu lateral izquierdo<br>

2.Busca el producto que quieres comprar. Puedes hacerlo navegando a través de las categorías .<br>

3.Una vez encuentres el producto, asegúrate de elegir la cantidad que necesitas y agrégalo a tu carrito de compras.<br>

4.Puedes seguir navegando y agregar al carrito los productos que desees. Cuando hayas incluido todo y tu compra esté lista, <br> ve al carrito de compras en el boton verde que está en la parte superior izquierda de la pantalla. .<br>

5.Estando en el carrito de compras, ingresa en el botón envío para seleccionar la dirección donde deseas recibir tu compra.

6.Una vez selecionados los productos y la dirección de envío, haz clic en comprar ahora.<br>

7.Tu factura aparecerá en pantalla y se desacargará automaticamente <br>

8.Envía tu factura a nuestro correo o numero de whatsapp</p>


<p style="color:#48e">2.¿Cómo agendar tu cita médica? </p> 

Solo debes seguir los siguientes pasos: <br>

1.Ingresa a la opcion solicitud de citas medicas en la pantalla principal o el menu lateral izquierdo<br>

2.Haz click en el boton verde agendar cita<br>

3.Confirma tus datos, selecciona una fecha y hora para tu cita (las citas se pueden agendar de 9am a 6pm y solo puedes agendar 2 citas por día)<br>

4. haz click en el boton agendar<br>

5.aparecera un mensaje cita creada con exito, y veras la cita agendada, puedes modificarla o eliminarla segun tus necesidades </p>


   

<p style="color:#48e">3.¿Cómo descargar tus certificados medicos? </p>    

Solo debes seguir los siguientes pasos: <br>

1.Ingresa a la opcion ceritificados medicos en la pantalla principal o en el menu lateral izquierdo
<br>

2.Si tienes certificados médicos cargados apareceran en un archivo pdf con la opción de ver/descargar <br>

NOTA: Los certificados se subirán 3 dias hábiles después la cita médica <br>



</div>

<script>

// Función para igualar la altura de la barra lateral y el contenido
function equalizeHeight() {
  var barraLateral = document.querySelector('.barra-lateral');
  var contenidoPlantilla = document.querySelector('.contenido-plantilla');

  var max_height = Math.max(barraLateral.clientHeight, contenidoPlantilla.clientHeight);
  barraLateral.style.minHeight = max_height + 'px';
  contenidoPlantilla.style.minHeight = max_height + 'px';
}

equalizeHeight();
window.addEventListener('resize', equalizeHeight);

</script>

@php
    $ocultarFooter = true;
@endphp


@endsection

