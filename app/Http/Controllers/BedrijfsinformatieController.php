<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BedrijfsinformatieController extends Controller
{
    public function update(Request $request)
{
    // Valideer de invoer
    $request->validate([
        'bedrijfsnaam' => 'nullable|string|max:255',
        'straat_huisnummer' => 'nullable|string|max:255',
        'postcode' => 'nullable|string|max:255',
        'plaats' => 'nullable|string|max:255',
        'land' => 'nullable|string|max:255',
        'kvknummer' => 'nullable|string|max:255',
        'telefoonnummer' => 'nullable|string|max:255',
    ]);

    // Haal de ingelogde gebruiker op
    $user = Auth::user();

    // Controleer of de gebruiker correct is opgehaald
    if (!$user) {
        return redirect()->route('login')->with('error', 'Gebruiker niet gevonden');
    }

    // Update de bedrijfsinformatie
    $user->update([
        'bedrijfsnaam' => $request->input('bedrijfsnaam'),
        'straat_huisnummer' => $request->input('straat_huisnummer'),
        'postcode' => $request->input('postcode'),
        'plaats' => $request->input('plaats'),
        'land' => $request->input('land'),
        'kvknummer' => $request->input('kvknummer'),
        'telefoonnummer' => $request->input('telefoonnummer'),
    ]);

    // Redirect naar de bewerkingspagina van het profiel met een succesmelding
    return redirect()->route('profile.edit')->with('status', 'bedrijfsinformatie-updated');
}

}
