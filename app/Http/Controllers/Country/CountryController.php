<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountryModel;

class CountryController extends Controller
{
    //Display all countries Status : 200 (Okay)
    public function country() {
        return response()->json(CountryModel::get(), 200);
    }
    //Display country by id
    public function countryById($id) {
        return response()->json(CountryModel::find($id), 200);
    }
    //Add a new country Status : 201 (Created)
    public function createCountry(Request $request) {
        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }
}
