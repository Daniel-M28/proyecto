
@extends('layouts.app')

@section('content')
   
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Título Aquí</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>

<body>
<div class="contenido-ventas-carrito ">

  <div id="titulo-carrito" class="titulo-carrito "> <h2>carrito de compras</h2> 

   <p class="carro-vacio"> Tu carrito esta vacio <i class="fa-regular fa-face-frown-open"></i></p> 
</div>

<div id="titulo2-carrito" class="titulo2-carrito "> <h2 class="titulo-compra-carro"></h2> 

   <!-- <p class="carro-compra" style="margin: -200px; auto;height: 500px; width: 600px">  <i class="fa-regular fa-face-laugh-beam"></i></p>  -->
   <div class="factura-container" style="overflow-y: auto; max-height: 500px; width: 600px;margin-top:-100px"> </div>
</div>



<div class="menu-lateral-carrito">

<a class="seguir-compra" href="{{ asset('tienda') }}"> <button class="boton-seguir-compra btn btn-warning"> <i class="fa-solid fa-basket-shopping "></i> seguir comprando</button> </a> 

</div>



<div id="productos-carrito" class="productos-carrito ">
</div>

 <!-- los productos van en el script js-->
 <div id="botones-compra-carrito" class="botones-compra-carrito">
     <div >
         <button id="vaciar-carrito" class="vaciar-carrito btn btn-danger">vaciar carrito</button>
         
     </div>
     

            <div class="botones-derecha">
           
                 <div class="total-carrito"> <p id="precio-total" class="precio-total"> Total $0</p></div>

                 <div> <a  href="{{asset('mapa')}}"> <button style="margin-top:20px; margin-left:-70px " class="btn btn-success "> envío </button> </a> </div>
        
         <div><button id="boton-comprar-carrito" class="boton-comprar-carrito btn btn-success">comprar ahora</button></div>
                  
               
 
 
         </div>
 








</div>



<script >


let productosEnCarrito = localStorage.getItem("productos-en-carrito");
    productosEnCarrito = JSON.parse(productosEnCarrito);

    const contenedorCarritoVacio = document.querySelector("#titulo-carrito");
    const contenedorCarritoCompra = document.querySelector("#titulo2-carrito");
    const contenedorCarritoProductos = document.querySelector("#productos-carrito");
    const contenedorCarritoBotones = document.querySelector("#botones-compra-carrito");
    let botonesEliminar = document.querySelectorAll(".eliminar-producto-carrito");
    const botonVaciar = document.querySelector("#vaciar-carrito");
    const total = document.querySelector("#precio-total");

    function generarFactura(productosEnCarrito, userName) {
    const idFactura = new Date().getTime();
    const fechaActual = new Date();
    const fechaFormateada = `${fechaActual.getDate()}/${fechaActual.getMonth() + 1}/${fechaActual.getFullYear()} ${fechaActual.getHours()}:${fechaActual.getMinutes()}`;


    const userAddress = localStorage.getItem('userAddress') || 'Dirección no especificada';

    let facturaHTML = `
        <div style='font-family: Arial, sans-serif; width: 100%; border: 1px solid #aaa;padding:20px;'>
            <div style='text-align:center; padding: 10px 0;'>
                <img src='logo-farmacia.png' alt='Logo Farmacia' style='height:60px; width:80px;'>
                <h2 style='margin-top: 10px; color: #48e;'>Farmacia Zeus</h2>
                <h3 style='margin-top: 10px; color: #48e;'>Factura</h3>
            </div>
            <div style='border-top: 2px solid #333; margin-top: 20px;'></div>
            <div style='padding: 20px 0;'>
                <p><strong>ID Factura:</strong> ${idFactura}</p>
                <p><strong>Fecha:</strong> ${fechaFormateada}</p>
                <p><strong>Cliente:</strong> ${userName}</p>  
                <p><strong>Dirección de envío:</strong> ${userAddress}</p> 
            </div>
            <div style='border-top: 1px dashed #ccc;'></div>
            <div class="factura-container" style='padding: 20px 0; overflow-y: auto; max-height: 300px;'>
                <table style='width: 100%; border-collapse: collapse;'>
                    <thead>
                        <tr>
                            <th style='border-bottom: 1px solid #ccc; padding: 8px;'>Producto</th>
                            <th style='border-bottom: 1px solid #ccc; padding: 8px;'>Cantidad</th>
                            <th style='border-bottom: 1px solid #ccc; padding: 8px;'>Precio Unitario</th>
                            <th style='border-bottom: 1px solid #ccc; padding: 8px;'>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
    `;

    let total = 0;
    let shippingCostAdded = false;

    productosEnCarrito.forEach((producto, index) => {
        facturaHTML += `
            <tr>
                <td style='border-bottom: 1px solid #ccc; padding: 8px;'>${producto.titulo}</td>
                <td style='border-bottom: 1px solid #ccc; padding: 8px;'>${producto.cantidad}</td>
                <td style='border-bottom: 1px solid #ccc; padding: 8px;'>$${producto.precio}</td>
                <td style='border-bottom: 1px solid #ccc; padding: 8px;'>$${producto.precio * producto.cantidad}</td>
            </tr>
        `;

        total += producto.precio * producto.cantidad;

        if (index === productosEnCarrito.length - 1 && !shippingCostAdded) {
            facturaHTML += `
                <tr>
                    <td colspan='3' style='text-align: right; padding: 8px;'><strong>Envío:</strong></td>
                    <td style='border-bottom: 1><td style='border-bottom: 1px solid #ccc; padding: 8px;'>$${shippingCost}</td>
                </tr>
            `;
            total += parseInt(shippingCost);
            shippingCostAdded = true;
        }
    });

    facturaHTML += `
                    </tbody>
                </table>
            </div>
            <div style='border-top: 1px dashed #ccc;'></div>
            <div style='padding: 20px 0;'>
                <p style='margin-left:470px'><strong>Total:</strong> $${total}</p>
            </div>
            <div style='text-align:center; margin-top: 20px;'>
                <p style='color: #48e;'>¡Gracias por tu compra!</p>
            </div>
        </div>
    `;

    // Mostrar la factura dentro del contenedor de la factura
    const facturaContainer = document.querySelector(".factura-container");
    facturaContainer.innerHTML = facturaHTML;

    // Genera el PDF usando html2pdf
    html2pdf().from(facturaContainer).save(`factura-${userName}-${idFactura}.pdf`); 
     // Guardar la factura con el nombre del usuario
      
}





    const botonComprar = document.querySelector("#boton-comprar-carrito");

    const userName = "{{ Auth::user()->name }}";  

botonComprar.addEventListener("click", () => {

    
    const userAddress = localStorage.getItem('userAddress');


    generarFactura(productosEnCarrito, userName);  
    productosEnCarrito.length = 0;
    localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));
    cargarProductosCarrito();
});



function cargarProductosCarrito(){

if(productosEnCarrito && productosEnCarrito.length > 0) {


contenedorCarritoVacio.classList.add("disabled");
contenedorCarritoProductos.classList.remove ("disabled");
contenedorCarritoBotones.classList.remove ("disabled");
contenedorCarritoCompra.classList.add ("disabled");

contenedorCarritoProductos.innerHTML= ""  

 productosEnCarrito.forEach(producto =>{
    
const div = document.createElement("div");
div.classList.add ("carrito-producto");
div.innerHTML = `
<div class="detalles-producto-carrito">
<img class="img-producto-carrito" src="${producto.imagen}">

<div>
<h4 style="font-size:16px;font-weight:bold">producto</h4>
<p>${producto.titulo}</p>
</div>

<div ><h4 style="font-size:16px;font-weight:bold">cantidad </h4>
<p> ${producto.cantidad} </p>
</div>

<div>
<h4 style="font-size:16px;font-weight:bold">precio</h4>
<p>${producto.precio}</p>
</div>

<div>
<h4 style="font-size:16px;font-weight:bold">subtotal </h4>
<p>${producto.precio * producto.cantidad}</p>
</div>

<div>
<button id="${producto.id}" class ="eliminar-producto-carrito btn btn-danger mt-3 mr-3"> eliminar </button>
</div>

`;
contenedorCarritoProductos.append(div);

})



} else {
contenedorCarritoVacio.classList.remove("disabled");
contenedorCarritoProductos.classList.add("disabled");
contenedorCarritoBotones.classList.add ("disabled");
contenedorCarritoCompra.classList.add("disabled");
}

actualizarBotonesEliminar();
actualizarTotal();

}

cargarProductosCarrito();

actualizarBotonesEliminar();

function actualizarBotonesEliminar(){
    botonesEliminar = document.querySelectorAll(".eliminar-producto-carrito");

    botonesEliminar.forEach(boton=>{
        boton.addEventListener("click",eliminarDelCarrito)});
    }

    function eliminarDelCarrito(e){
  const idBoton = e.currentTarget.id;
   
   const index = productosEnCarrito.findIndex (producto=> producto.id ===idBoton)
     console.log(productosEnCarrito)
     productosEnCarrito.splice(index, 1);

 localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito))

cargarProductosCarrito();
    }


   botonVaciar.addEventListener("click",vaciarCarrito);
    function vaciarCarrito(){
       productosEnCarrito.length = 0;
        localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));
        cargarProductosCarrito();

    }

function actualizarTotal(){
   const totalCalculado = productosEnCarrito.reduce((acc, producto)=> acc + (producto.precio * producto.cantidad ),0) ;
total.textContent = `Total:$ ${totalCalculado}`;

}


botonComprar.addEventListener("click",comprarCarrito);
    function comprarCarrito(){ 
      
       productosEnCarrito.length = 0;
        localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));      
contenedorCarritoVacio.classList.add("disabled");
contenedorCarritoProductos.classList.add("disabled");
contenedorCarritoBotones.classList.add ("disabled");
contenedorCarritoCompra.classList.remove("disabled");}


var shippingCost = localStorage.getItem('shippingCost');






</script>









@php
    $ocultarFooter = true;
@endphp


@endsection
