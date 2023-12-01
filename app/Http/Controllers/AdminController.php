<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Mount the listing owner setting page data.
     *
     * @return array
     */
    public function setListingOwnerIndex(): array
    {
        $listings = Listing::paginate(10);

        return [
            'listings'=>$listings
        ];
    }
}
