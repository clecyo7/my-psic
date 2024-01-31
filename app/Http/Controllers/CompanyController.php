<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
      // dd(auth()->user());

        return Inertia::render('Company/Index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('chegou1');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('chegou2');
    }

    public function getCompany()
    {

       // $usuario = Auth::user();
      //  $company = Company::
     
       // return Inertia::render('Company/Index', ['companies' => $companies]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $companies = Company::all();
        return Inertia::render('Company/Index', ['companies' => $companies]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        dd('oi');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        dd($request, $company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        dd('chegou');
    }
}
