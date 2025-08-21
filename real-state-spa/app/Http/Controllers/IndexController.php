<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        //dd(Listing::where('beds', '>=', 4)->orderBy('price', 'asc')->first());
        //dd(Auth::user());
        return inertia(
            'Index/Index',
            ['message' => 'Hello from IndexController']
        );
    }

    public function show()
    {
        return inertia('Index/Show');
    }
}
