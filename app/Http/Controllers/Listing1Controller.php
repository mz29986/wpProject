<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\listings;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function all(){
        return view ('listings', Listing::all());
    }
}
