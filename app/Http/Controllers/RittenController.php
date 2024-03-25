<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Ritten;

class RittenController extends Controller
{

    protected $pricePerKm;

    public function setPricePerKm($price)
    {
        $this->pricePerKm = $price;
    }

    public function create()
    {
        return view('ritten.create');
    }

    public function store(Request $request)
    {
        // Valideer de invoer van het formulier
        $validatedData = $request->validate([
            'naam_verzender' => 'required|string',
            'adres_verzender' => 'required|string',
            'postcode_verzender' => 'required|string',
            'plaats_verzender' => 'required|string',
            'naam_ontvanger' => 'required|string',
            'adres_ontvanger' => 'required|string',
            'postcode_ontvanger' => 'required|string',
            'plaats_ontvanger' => 'required|string',
        ]);

        // Roep de Distance Matrix API aan om de afstand te berekenen
        $client = new Client();
        $apiKey = 'hAelhHY0uWLDZhyberjMQBlYdpgo9Bl82pY813tOqYbXdR3OJp2I4IVJgcbUSsC0';
        $distanceMatrixUrl = 'https://api.distancematrix.ai/maps/api/distancematrix/json';
        
        $response = $client->get($distanceMatrixUrl, [
            'query' => [
                'origins' => $validatedData['adres_verzender'] . ', ' . $validatedData['postcode_verzender'] . ', ' . $validatedData['plaats_verzender'],
                'destinations' => $validatedData['adres_ontvanger'] . ', ' . $validatedData['postcode_ontvanger'] . ', ' . $validatedData['plaats_ontvanger'],
                'key' => $apiKey,
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        // Controleer of de 'distance' sleutel aanwezig is in de API-response
        if (isset($data['rows'][0]['elements'][0]['distance']['value'])) {
            // Haal de afstand op uit de respons en zet deze om naar kilometers
            $distanceInMeters = $data['rows'][0]['elements'][0]['distance']['value'];
            $distanceInKm = $distanceInMeters / 1000;

            // Haal de prijs per kilometer op uit de admin-instellingen
            $pricePerKm = 0.5; // Vervang dit met de daadwerkelijke prijs per kilometer

            // Bereken de kosten van de rit op basis van de afstand en de prijs per kilometer
            $cost = $distanceInKm * $pricePerKm;

            // Sla de rit op in de database
            $rit = Ritten::create([
                'naam_verzender' => $validatedData['naam_verzender'],
                'adres_verzender' => $validatedData['adres_verzender'],
                'postcode_verzender' => $validatedData['postcode_verzender'],
                'plaats_verzender' => $validatedData['plaats_verzender'],
                'naam_ontvanger' => $validatedData['naam_ontvanger'],
                'adres_ontvanger' => $validatedData['adres_ontvanger'],
                'postcode_ontvanger' => $validatedData['postcode_ontvanger'],
                'plaats_ontvanger' => $validatedData['plaats_ontvanger'],
                'kosten' => $cost,
                'aantal_km' => $distanceInKm,
            ]);

            return redirect()->route('dashboard')->with('success', 'Rit succesvol geboekt.');
        } else {
            // Als de afstand niet kon worden berekend, geef een foutmelding terug
            return redirect()->back()->with('error', 'Kon de afstand niet berekenen.');
        }
    }
}
