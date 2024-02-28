@extends('layouts.app')

@section('content')



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de distancia y costo</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    
    #map { height: 400px;
    width:800px; 
    margin-left: 400px;
margin-top: 40px}
  </style>
</head>
<body>

 

<a href=" {{asset('carrito')}} "><button  style="margin-left:230px; margin-top:50px "class="btn btn-success">ir a pagar </button> </a>


<p style=" margin-left: 400px; color: #48e;margin-top: -50px">Envio</p> <br> <p style="margin-left: 400px; margin-top: -30px">Selecciona tu direccion en el mapa <br>
cada kilometro desde la tienda tiene un valor de $2000 <br>
El valor estimado del envío aparecerá en la parte inferior del mapa</p>
 

<div id="map" ></div>
  <div>
    <textarea style="margin-left:580px; margin-top: 30px" id="info" rows="4" cols="50" readonly></textarea>
  </div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    var medellin = [6.2442, -75.5812]; // Coordenadas de Medellín, Colombia
    var mymap = L.map('map').setView(medellin, 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
    }).addTo(mymap);

    var storeLocation = [6.2442, -75.5812]; // Coordenadas de la tienda
    var storeMarker = L.marker(storeLocation, { draggable: false }).addTo(mymap);
    storeMarker.bindPopup("<b>Tienda</b><br>Medellín, Colombia").openPopup();

    var userMarker = null; // Variable para almacenar el marcador del usuario
    var infoTextarea = document.getElementById('info');

    // Verificar si hay una ubicación guardada en el almacenamiento local al cargar la página
    window.onload = function() {
      var savedLocation = localStorage.getItem('userLocation');
      if (savedLocation) {
        var savedLatLng = JSON.parse(savedLocation);
        userMarker = L.marker(savedLatLng, { draggable: true }).addTo(mymap);
        userMarker.bindPopup("<b>Tu dirección</b><br>").openPopup();
        calculateDistanceAndCost();
      }
    };

    mymap.on('click', function(e) {
      // Eliminar marcador existente del usuario si hay uno
      if (userMarker) {
        mymap.removeLayer(userMarker);
      }

      var userLocation = e.latlng;
      userMarker = L.marker(userLocation, { draggable: true }).addTo(mymap);
      userMarker.bindPopup("<b>Tu dirección</b><br>").openPopup();
      calculateDistanceAndCost();

      // Guardar la ubicación seleccionada por el usuario en el almacenamiento local
      localStorage.setItem('userLocation', JSON.stringify(userLocation));
    });

    function calculateDistanceAndCost() {
    if (!userMarker) return; // Salir si no hay marcador de usuario

    var distance = storeMarker.getLatLng().distanceTo(userMarker.getLatLng()) / 1000; // Distancia en kilómetros
    var cost = distance * 2000; // Costo en pesos (1000 pesos por kilómetro)
    cost = Math.floor(cost); 
    infoTextarea.value = "Distancia entre la tienda y tu casa: " + distance.toFixed(0) + " km\n";
    infoTextarea.value += "Costo estimado del envío: $" + cost.toFixed(0);

    // Guardar el costo en el localStorage
    localStorage.setItem('shippingCost', cost.toFixed(0));

   
  }
   
  </script>



  <script src="carrito.js"></script>
</body>
</html>













@endsection