<?php

namespace App\Http\Controllers\API;

use App\Models\Plant;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $apiKey = config('services.openweathermap.key');
        $lat = $request->input('lat');
        $lon = $request->input('lon');

        if (empty($lat) || empty($lon)) {
            return response()->json(['error' => 'Parameter "lat" dan "lon" harus diberikan.'], 400);
        }

        $units = 'metric';

        $url = "http://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=$units&appid=$apiKey";

        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }

}
