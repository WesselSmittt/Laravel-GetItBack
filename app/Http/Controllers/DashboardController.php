<?php

namespace App\Http\Controllers;
use App\Models\Ritten;
use App\Models\User;
use App\Http\Controllers\RittenController;
use App\Http\Controllers\UsersController;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $rittenController;

    public function index()
    {
        $ritten = Ritten::all();

        return view('dashboard', compact('ritten'));
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

        public function __construct(RittenController $rittenController)
        {
            $this->rittenController = $rittenController;
        }

        public function updatePrijs(Request $request)
        {
            $validatedData = $request->validate([
                'prijs' => 'required|numeric',
            ]);

            // Sla de nieuwe prijs op in de database
            $admin = User::where('role', 'admin')->first();
            $admin->prijs_per_km = $validatedData['prijs'];
            $admin->save();

            // Update de prijs in de RittenController
            $this->rittenController->setPricePerKm($validatedData['prijs']);

            return redirect()->route('admin.dashboard')->with('success', 'Prijs succesvol bijgewerkt');
        }
    }

