<?php

namespace App\Http\Controllers\Backpage;

use App\Models\Category;
use App\Models\User;
use App\Models\Plant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $userCount = User::count();
        $plantCount = Plant::count();
        $categoryCount = Category::count();
        $user = User::Paginate(10);

        return view('backpage.dashboard', compact('userCount', 'user', 'plantCount', 'categoryCount'));
    }
}
