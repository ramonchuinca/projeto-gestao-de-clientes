<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'total' => Client::count(),
            'ativos' => Client::where('status', true)->count(),
            'inativos' => Client::where('status', false)->count(),
            'ultimos' => Client::latest()->take(5)->get(),
        ]);
    }
}
