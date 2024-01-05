<?php

namespace App\Http\Controllers\frontpage;

use Carbon\Carbon;
use App\Models\Plant;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;

class LandingController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $formattedDateTime = $now->format('l | j M Y');

        $temperatureMin = 0;
        $temperatureMax = 0;

        if (auth()->check()) {
            $user = auth()->user();
            $recommendation = Location::where('user_id', $user->id)->first();

            if ($recommendation) {
                $temperatureMin = $recommendation->temperature_min;
                $temperatureMax = $recommendation->temperature_max;
            } else {

                $temperatureMin = $user->temperature_min;
                $temperatureMax = $user->temperature_max;
            }
        }

        $recommendedPlants = Plant::where('suhu_min', '<=', $temperatureMax)
            ->where('suhu_max', '>=', $temperatureMin)
            ->get();

        $allPlants = Plant::paginate(4);

        return view('frontpage.landing', [
            'formattedDateTime' => $formattedDateTime,
            'recommendedPlants' => $recommendedPlants,
            'allPlants' => $allPlants,
        ]);
    }

    public function show($slug)
    {
        $slug = str_replace('-', ' ', $slug);

        $plant = Plant::where('nama_tanaman', $slug)->firstOrFail();

        return view('frontpage.detail', compact('plant'));
    }

    public function all(){
        $temperatureMin = 0;
        $temperatureMax = 0;

        if (auth()->check()) {
            $user = auth()->user();
            $recommendation = Location::where('user_id', $user->id)->first();

            if ($recommendation) {
                $temperatureMin = $recommendation->temperature_min;
                $temperatureMax = $recommendation->temperature_max;
            } else {

                $temperatureMin = $user->temperature_min;
                $temperatureMax = $user->temperature_max;
            }
        }

        $recommendedPlants = Plant::where('suhu_min', '<=', $temperatureMax)
            ->where('suhu_max', '>=', $temperatureMin)
            ->get();

        $allPlants = Plant::paginate(4);

        return view('frontpage.all', [
            'recommendedPlants' => $recommendedPlants,
            'allPlants' => $allPlants,
        ]);
    }

    public function plantsByCategory($category)
    {
        $selectedCategory = Category::where('nama', $category)->firstOrFail();

        $plants = $selectedCategory->plants;

        return view('frontpage.category', compact('plants', 'selectedCategory'));
    }

    public function updateRecommendation(Request $request)
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
}
