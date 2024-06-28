<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Models\Alumno;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        define('ALUMNOS_POR_PAGINA', 10);

        $alumnos = Alumno::paginate(ALUMNOS_POR_PAGINA);

        return inertia('Alumnos/Index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return inertia('Alumnos/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlumnoRequest $request): RedirectResponse
    {
        Alumno::create($request->validated());

        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno): Response
    {
        return inertia('Alumnos/Edit', ['alumno' => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlumnoRequest $request, Alumno $alumno): RedirectResponse
    {
        $alumno->update($request->validated());

        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno): RedirectResponse
    {
        $alumno->delete();

        return redirect()->route('alumnos.index');
    }
}
