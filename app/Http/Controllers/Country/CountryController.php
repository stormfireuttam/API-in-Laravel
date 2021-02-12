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
    //Editing a country
    public function updateCountry(Request $request, CountryModel $country) {
        $country->update($request->all());
        return response()->json($country, 200);
    }
    //Deleting a country Status : 204(No Content)
    public function deleteCountry(Request $request, CountryModel $country) {
        $country->delete();
        return response()->json(null, 204);
    }
}
