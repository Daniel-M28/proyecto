<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\FacturaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio')->middleware('auth');;

Route::get('/tienda', function () {
    return view('tienda');
})->name('tienda')->middleware('auth');;

Route::get('/carrito', function () {
    return view('carrito');
})->name('carrito')->middleware('auth');;

Route::get('/preguntas', function () {
    return view('preguntas');
})->name('preguntas')->middleware('auth');;

Route::get('/pqrs', function () {
    return view('pqrs');
})->name('pqrs')->middleware('auth');;

Route::get('/mapa', function () {
    return view('mapa');
})->name('mapa')->middleware('auth');;





Route::get('/cargar-pdf', [PdfController::class, 'showForm'])->name('certificados')-> middleware('auth');
Route::post('/cargar-pdf', [PdfController::class, 'uploadPdf'])-> middleware('auth');
Route::get('/descargar-pdf/{filename}', [PdfController::class, 'downloadPdf'])-> middleware('auth');
Route::get('/ver-pdf/{filename}', [PdfController::class, 'viewPdf'])-> middleware('auth');
Route::get('/eliminar-pdf/{filename}', [PdfController::class, 'deletePdf'])-> middleware('auth');
Route::get('/descargar-pdf/{filename}', [PdfController::class, 'viewPdf'])->middleware('auth');




Route::resource ('citas', App\Http\Controllers\CitaController::class)-> middleware('auth');

Route::resource ('inventario', App\Http\Controllers\InventarioController::class)-> middleware(['auth','can:inventario.index']);


Route::resource ('usuario', App\Http\Controllers\UsuarioController::class)->middleware(['auth','can:usuario.index']);


Route::resource('compras', CompraController::class);



Route::post('/api/inventario/existencias', [InventarioController::class, 'getExistencias']);

Route::post('/inventario/existencias', 'InventarioController@getExistencias');


Route::get('/facturas', [FacturaController::class, 'index']);
Route::post('/facturas', [FacturaController::class, 'store']);








Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    // Redirige a la página de inicio después de iniciar sesión
    Route::get('/', function () {
        return view('inicio');
    })->name('inicio');
});
