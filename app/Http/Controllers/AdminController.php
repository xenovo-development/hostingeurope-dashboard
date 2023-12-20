<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Mount the listing owner setting page data.
     *
     * @return array
     */
    public function listingIndex(): array
    {
        $listings = Listing::all();
        $users = User::all();

        return [
            'listings'=>$listings,
            'users'=>$users
        ];
    }

    /**
     * Set the listings owner for given user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function setOwner(Request $request): RedirectResponse
    {
        $listing = Listing::find($request['listing_id']);
        $user = User::findOrFail($request['user_id']);
        if ($listing && $user){
            $listing->update(['user_id'=>$user['id']]);

            return back()->with('success','Listing owner set successfully!');
        }else{
            return back()->with('error',$listing->errors());
        }
    }
}
