<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Return the listing data.
     *
     * @return array{listings: mixed}
     */
    public function index(): array
    {
        $listings = Listing::where('user_id', Auth::user()['id'])->get();
        return[
            'listings'=>$listings
        ];
    }
}
