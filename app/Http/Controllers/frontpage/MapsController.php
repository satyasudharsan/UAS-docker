<?php

namespace App\Http\Controllers\frontpage;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class MapsController extends Controller
{
    public function index()
    {
        return view('frontpage.maps');
    }

    public function updateLocation(Request $request)
    {
        $user = auth()->user();

        $recommendation = Location::updateOrCreate(
            ['user_id' => $user->id],
            [
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'temperature_min' => $request->input('temperatureMin'),
                'temperature_max' => $request->input('temperatureMax'),
            ]
        );

        return response()->json(['message' => 'Recommendation updated successfully']);
    }

    public function getRecommendations(Request $request)
    {
        $user = auth()->user();

        // Get latitude and longitude from the request
        $latitude = $request->input('lat');
        $longitude = $request->input('lon');

        // Retrieve recommendation data for the logged-in user
        $recommendation = Location::where('user_id', $user->id)->first();

        if ($recommendation) {
            // Use the recommendation data to get temperature range
            $temperatureMin = $recommendation->temperature_min;
            $temperatureMax = $recommendation->temperature_max;

            // Get recommended plants based on temperature range
            $recommendedPlants = Plant::where('suhu_min', '<=', $temperatureMax)
                ->where('suhu_max', '>=', $temperatureMin)
                ->get();

            return response()->json(['recommendedPlants' => $recommendedPlants, 'temperatureMin' => $temperatureMin, 'temperatureMax' => $temperatureMax]);
        } else {
            return response()->json(['recommendedPlants' => []]);
        }
    }
}
