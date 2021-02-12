<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountryModel;

class CountryController extends Controller
{
    //Display all countries
    public function country() {
        return response()->json(CountryModel::get(), 200);
    }
    //Display country by id
    public function countryById($id) {
        return response()->json(CountryModel::find($id), 200);
    }
}
