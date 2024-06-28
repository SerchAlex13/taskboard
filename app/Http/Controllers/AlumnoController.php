<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Models\Alumno;
use Illuminate\Http\{RedirectResponse, Request};
use Inertia\Response;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $alumnos = Alumno::paginate(25);

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
