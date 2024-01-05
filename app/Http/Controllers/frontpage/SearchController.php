<?php

namespace App\Http\Controllers\frontpage;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $temperatureMin = 0;
        $temperatureMax = 0;

        if (auth()->check()) {
            $temperatureMin = session('temperature_min') ?? auth()->user()->temperature_min;
            $temperatureMax = session('temperature_max') ?? auth()->user()->temperature_max;
        }

        $recommendedPlants = [];
        if (auth()->check()) {
            $recommendedPlants = Plant::where('suhu_min', '<=', $temperatureMax)
                ->where('suhu_max', '>=', $temperatureMin)
                ->get();
        }

        $allPlants = Plant::paginate(4);

        $plant = Plant::query();

        if (request()->has('s')) {
            $plant = $plant->where('nama_tanaman', 'like', '%' . request('s') . '%');
        }

        $plants = $plant->paginate(10);

        return view('frontpage.search', [
            'recommendedPlants' => $recommendedPlants,
            'allPlants' => $allPlants,
            'plants' => $plants,
        ]);
    }
}
