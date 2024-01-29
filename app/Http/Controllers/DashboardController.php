<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    public function getRealTimeLocation()
    {
        $ip = request()->ip();
        //$apiKey = 'VOTRE_CLE_API'; // Remplacez par votre clé API ipinfo.io

        $response = Http::get("http://ipinfo.io/{$ip}");

        if ($response->successful()) {
            $locationData = $response->json();
            $city = $locationData['city'];
            $country = $locationData['country'];

            return view('pages.index', compact('city', 'country'));
        }

        // Gestion des erreurs si la requête échoue
        return view('votre_vue', ['error' => 'Impossible d\'obtenir les informations de localisation en temps réel.']);
    }

}
