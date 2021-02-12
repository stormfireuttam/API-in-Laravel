<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use Validator;

class CountryController extends Controller
{
    //Display all countries
    // Status : 200 (Okay)
    public function country() {
        return response()->json(CountryModel::get(), 200);
    }
    //Display country by id
    // Status : 404 (Not Found)
    public function countryById($id) {
        $country = CountryModel::find($id);
        if (is_null($country)) {
            return response()->json(["message"=>"Record Not Found!"], 404);
        }
        return response()->json($country, 200);
    }
    //Add a new country
    // Status : 201 (Created)
    public function createCountry(Request $request) {
        $rules = [
            'name' => 'required|min:3',
            'iso' => 'required|min:2|max:2'
        ];
//        Status : 400 (Server could not understand the request)
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }
    //Editing a country
    public function updateCountry(Request $request, $id) {
        $country = CountryModel::find($id);
        if (is_null($country)) {
            return response()->json(["message"=>"Record Not Found!"], 404);
        }
        $country->update($request->all());
        return response()->json($country, 200);
    }
    //Deleting a country
    // Status : 204(No Content)
    public function deleteCountry(Request $request, $id) {
        $country = CountryModel::find($id);
        if (is_null($country)) {
            return response()->json(["message"=>"Record Not Found!"], 404);
        }
        $country->delete();
        return response()->json(null, 204);
    }
}
