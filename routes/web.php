<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\API\PlantController;
use App\Http\Controllers\API\WeatherController;
use App\Http\Controllers\frontpage\UserController;
use App\Http\Controllers\frontpage\LandingController;
use App\Http\Controllers\Backpage\DashboardController;
use App\Http\Controllers\frontpage\LocationController;
use App\Http\Controllers\Backpage\PlantsAdminController;
use App\Http\Controllers\Backpage\CategoryAdminController;
use App\Http\Controllers\frontpage\MapsController;
use App\Http\Controllers\frontpage\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.admin');

    Route::resource('plant-admin', PlantsAdminController::class)->names([
        'index' => 'plants.admin',
    ])->except(['edit']);
    Route::get('plant-admin/{slug}/edit', [PlantsAdminController::class, 'edit'])->name('plants.admin.edit');

    Route::resource('category-admin', CategoryAdminController::class)->names([
        'index' => 'category.admin',
    ])->except(['edit']);
    Route::get('category-admin/{slug}/edit', [CategoryAdminController::class, 'edit'])->name('category.admin.edit');
});


Route::get('/get-weather', [WeatherController::class, 'getWeather']);
Route::get('/get-recommended-plants', [PlantController::class, 'getRecommendedPlants']);
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/plants', [LandingController::class, 'all'])->name('all.plants');
Route::post('/update-location', [MapsController::class, 'updateLocation']);
Route::post('/update-recommendation', [LandingController::class, 'updateRecommendation']);
Route::get('/category/{category}', [LandingController::class, 'plantsByCategory'])->name('plants.by.category');


Route::middleware(['auth'])->group(function () {
    Route::get('/plant/{slug}', [LandingController::class, 'show'])->name('plant.detail');
    Route::get('/maps', [MapsController::class, 'index'])->name('maps');
    Route::get('/get-recommendations', [MapsController::class, 'getRecommendations']);
});


require __DIR__.'/auth.php';
