<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function graphic()
    {

        $userCount = User::all()->count();

        return Inertia::render('Painel/Index', ['userCount' => $userCount]);
    }
}
