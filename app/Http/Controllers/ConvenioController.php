<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profissionais = User::all();
    
        $teste = $profissionais->map(function ($profissional) {
            return [
                'id' => $profissional->id,
                'name' => $profissional->name,
            ];
        });
    
       //  dd($teste);
    
        return Inertia::render('Clinica/Convenio', ['teste' => $teste]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $StoreConvenioRequest)
    {
        $convenio = Convenio::create($StoreConvenioRequest);

        $convenio->users()->attach($StoreConvenioRequest['profissionais']);

        return response()->json(['message' =>  'Convenio Criado com sucesso']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Convenio $convenio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Convenio $convenio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Convenio $convenio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Convenio $convenio)
    {
        //
    }
}
