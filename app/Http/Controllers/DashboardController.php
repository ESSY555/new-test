<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        // Get dashboard statistics
        $totalProducts = Product::count();
        $userProducts = Product::where('user_id', $user->id)->count();
        $recentProducts = Product::latest()->take(5)->get();
        
        // Get category distribution
        $categories = Product::selectRaw('category, COUNT(*) as count')
            ->whereNotNull('category')
            ->groupBy('category')
            ->orderBy('count', 'desc')
            ->take(5)
            ->get();
        
        return view('dashboard.index', compact(
            'user',
            'totalProducts', 
            'userProducts',
            'recentProducts',
            'categories'
        ));
    }
}
