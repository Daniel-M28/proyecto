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
    #map { height: 400px; width:800px; margin-left: 400px; margin-top: 40px}
  </style>
</head>
<body>

<a href="{{ asset('carrito') }}"><button style="margin-left:230px; margin-top:50px " class="btn btn-success">ir a pagar </button> </a>

<p style=" margin-left: 400px; color: #48e;margin-top: -50px">Envio</p> <br> <p style="margin-left: 400px; margin-top: -30px">Ingresa tu dirección o seleccionala en el mapa <br>
cada kilometro desde la tienda tiene un valor de $2000 <br>
El valor estimado del envío aparecerá en la parte inferior del mapa</p>

<div id="map"></div>
<div>
  <input type="text" id="userAddress" placeholder="Ingrese su dirección" style="margin-left:400px; margin-top: 30px; width: 800px">
  <textarea style="margin-top:10px; margin-left: 400px; width: 800px"id="info" rows="4" cols="50" readonly></textarea>
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
  var userAddressInput = document.getElementById('userAddress');

 
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
   
    if (userMarker) {
      mymap.removeLayer(userMarker);
    }

    var userLocation = e.latlng;
    userMarker = L.marker(userLocation, { draggable: true }).addTo(mymap);
    userMarker.bindPopup("<b>Tu dirección</b><br>").openPopup();
    getAddressFromCoordinates(userLocation); // Obtener la dirección cuando se hace clic en el mapa
    calculateDistanceAndCost();

    // Guardar la ubicación seleccionada por el usuario en el almacenamiento local
    localStorage.setItem('userLocation', JSON.stringify(userLocation));
  });

  userAddressInput.addEventListener('change', function() {
    
    var address = userAddressInput.value;

    
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${address}`)
      .then(response => response.json())
      .then(data => {
        if (data.length > 0) {
          var lat = parseFloat(data[0].lat);
          var lon = parseFloat(data[0].lon);
          var userLocation = [lat, lon];

          // Establecer el marcador del usuario en la nueva ubicación
          if (userMarker) {
            mymap.removeLayer(userMarker);
          }
          userMarker = L.marker(userLocation, { draggable: true }).addTo(mymap);
          userMarker.bindPopup("<b>Tu dirección</b><br>").openPopup();
          calculateDistanceAndCost();

          // Guardar la nueva ubicación en el almacenamiento local
          localStorage.setItem('userLocation', JSON.stringify(userLocation));
        } else {
          console.error('No se encontraron coordenadas para la dirección ingresada');
        }
      })
      .catch(error => {
        console.error('Error fetching address coordinates:', error);
      });
  });

  function getAddressFromCoordinates(coordinates) {
    var lat = coordinates.lat;
    var lon = coordinates.lng;

    
    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&addressdetails=1&zoom=18`)
      .then(response => response.json())
      .then(data => {
        var address = data.display_name;
        
      
        var street = data.address.road ? data.address.road : "";
        var houseNumber = data.address.house_number ? `#${data.address.house_number}` : "";
        var fullAddress = `${street} ${houseNumber}, ${data.address.neighbourhood}, ${data.address.suburb}, ${data.address.city}, ${data.address.country}`;

        userAddressInput.value = fullAddress.trim(); 

        // Guardar la dirección en el localStorage
        localStorage.setItem('userAddress', fullAddress.trim());

        // Mostrar el valor del input de dirección en la consola
        console.log(userAddressInput.value);
      })
      .catch(error => {
        console.error('Error fetching address:', error);
      });
}

// Llamar a getAddressFromCoordinates cuando la página se carga
window.onload = function() {
    var savedLocation = localStorage.getItem('userLocation');
    if (savedLocation) {
      var savedLatLng = JSON.parse(savedLocation);
      userMarker = L.marker(savedLatLng, { draggable: true }).addTo(mymap);
      userMarker.bindPopup("<b>Tu dirección</b><br>").openPopup();
      calculateDistanceAndCost();
      getAddressFromCoordinates(savedLatLng);
    }
};


mymap.on('click', function(e) {
   
    if (userMarker) {
      mymap.removeLayer(userMarker);
    }

    var userLocation = e.latlng;
    userMarker = L.marker(userLocation, { draggable: true }).addTo(mymap);
    userMarker.bindPopup("<b>Tu dirección</b><br>").openPopup();
    getAddressFromCoordinates(userLocation); // Obtener la dirección cuando se hace clic en el mapa
    calculateDistanceAndCost();

    // Guardar la ubicación seleccionada por el usuario en el almacenamiento local
    localStorage.setItem('userLocation', JSON.stringify(userLocation));
});


userAddressInput.addEventListener('change', function() {
    // Obtener la dirección ingresada por el usuario
    var address = userAddressInput.value;

    // Realizar una solicitud de geocodificación para obtener las coordenadas de la dirección ingresada
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${address}`)
      .then(response => response.json())
      .then(data => {
        if (data.length > 0) {
          var lat = parseFloat(data[0].lat);
          var lon = parseFloat(data[0].lon);
          var userLocation = [lat, lon];

          // Establecer el marcador del usuario en la nueva ubicación
          if (userMarker) {
            mymap.removeLayer(userMarker);
          }
          userMarker = L.marker(userLocation, { draggable: true }).addTo(mymap);
          userMarker.bindPopup("<b>Tu dirección</b><br>").openPopup();
          calculateDistanceAndCost();

          // Guardar la nueva ubicación en el almacenamiento local
          localStorage.setItem('userLocation', JSON.stringify(userLocation));
        } else {
          console.error('No se encontraron coordenadas para la dirección ingresada');
        }
      })
      .catch(error => {
        console.error('Error fetching address coordinates:', error);
      });
});
  
  function calculateDistanceAndCost() {
    if (!userMarker) return; 

    var distance = storeMarker.getLatLng().distanceTo(userMarker.getLatLng()) / 1000; // Distancia en kilómetros
    var cost = distance * 2000; // Costo en pesos (2000 pesos por kilómetro)
    cost = Math.floor(cost); 
    infoTextarea.value = "Distancia entre la tienda y tu casa: " + distance.toFixed(0) + " km\n";
    infoTextarea.value += "Costo estimado del envío: $" + cost.toFixed(0);

    // Guardar el costo en el localStorage
    localStorage.setItem('shippingCost', cost.toFixed(0));
  
  }

  calculateDistanceAndCost();

  setTimeout(function() {
    var infoValue = infoTextarea.value;
    console.log(infoValue);
    var addressValue = userAddressInput.value;
    console.log(addressValue);
}, 100); // 100 milisegundos de retraso
</script>

<script src="carrito.js"></script>


</body>
</html>







@php
    $ocultarFooter = true;
@endphp

@endsection