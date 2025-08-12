<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        //dd(Listing::where('beds', '>=', 4)->orderBy('price', 'asc')->first());
        dd();
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
