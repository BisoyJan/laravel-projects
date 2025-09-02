<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ListingController extends Controller
{

    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = request()->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo']);

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                ->filter($filters)
                ->paginate(10)
                ->withQueryString()
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    // Uncomment the following method if you want to use a specific ID
    // public function show(string $id)
    // {
    //      return inertia(
    //         'Listing/Show',
    //         [
    //             'listings' => Listing::find($id)
    //         ]
    //     );
    // }

    /**
     * Display the specified resource using route model binding.
     *
     * @param Listing $listing
     * @return \Inertia\Response
     */
    // Uncomment the following method if you want to use route model binding
    public function show(Listing $listing)
    {
        // if(Auth::user()->cannot('view', $listing)) {
        //     abort(403);
        // }

        //$this->authorize('view', $listing);

        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */

}
