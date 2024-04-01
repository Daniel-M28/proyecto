<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


/**
 * Class CitaController
 * @package App\Http\Controllers
 */
class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Obtener el usuario autenticado
       $user = Auth::user();

       // Verificar el rol del usuario
       if ($user->hasRole('admin')) {
     // Si es administrador, mostrar todas las citas
           $citas = Cita::paginate();
       } else {
        // Si es usuario, mostrar solo sus propias citas
           $citas = Cita::where('user_id', $user->id)->paginate();
       }

       return view('cita.index', compact('citas'))
           ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $nombreUsuario = $user->name;
    
       // Obtener citas ocupadas
       $citasOcupadas = Cita::pluck('fecha')->toArray();
    
       
        $cita = new Cita();
    
        return view('cita.create', compact('cita', 'nombreUsuario', 'citasOcupadas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // Validación de campos
    $request->validate([
        'nombre' => 'required',
        'cedula' => 'required',
        'fecha' => 'required|date_format:Y-m-d\TH:i', // Ajusta el formato de fecha y hora
    ]);

    // Obtener la fecha y hora de la nueva cita
    $fecha_cita = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('fecha'));

    // Verificar el límite de citas por día para el usuario actual (2)
    $user = Auth::user();
    $cantidad_citas_hoy = Cita::where('user_id', $user->id)
                                ->whereDate('fecha', now()->toDateString())
                                ->count();

    // Verificar si el usuario ha alcanzado el límite de citas por día
    if ($cantidad_citas_hoy >= 2) {
        return redirect()->back()->withErrors(['fecha' => 'Has alcanzado el límite de citas por día.'])->withInput();
    }

    // Verificar que no haya otra cita programada en la misma hora
    $cita_existente = Cita::where('fecha', $fecha_cita)->exists();

    if ($cita_existente) {
        return redirect()->back()->withErrors(['fecha' => 'Ya hay una cita programada en esa hora.'])->withInput();
    }

    // Crear la nueva cita
    $cita = new Cita();
    $cita->nombre = $request->input('nombre');
    $cita->cedula = $request->input('cedula');
    $cita->fecha = $fecha_cita;
    $cita->user_id = Auth::id(); 
    $cita->save();

    return redirect()->route('citas.index')->with('success', 'Cita creada con éxito');
}

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = Cita::find($id);

        return view('cita.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);
        $user = Auth::user();
        $nombreUsuario = $user->name;

        // Obtener citas ocupadas
        $citasOcupadas = Cita::pluck('fecha')->toArray();

        return view('cita.edit', compact('cita', 'nombreUsuario', 'citasOcupadas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cita $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        request()->validate(Cita::$rules);

        $cita->update($request->all());

        return redirect()->route('citas.index')
            ->with('success', 'Cita actualizada con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cita = Cita::find($id)->delete();

        return redirect()->route('citas.index')
            ->with('success', 'Cita eliminada con exito');
    }
}
