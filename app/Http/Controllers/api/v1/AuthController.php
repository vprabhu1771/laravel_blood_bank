<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

class AuthController extends Controller
{
    public function getLocation(Request $request)
    {
        $pincode = $request->get('pincode');

        // Fetch area based on pincode and eager load the relationships
        $record = Area::where('pincode', $pincode)
            ->with(['district.city.state.country']) // Eager load related models
            ->first();

        // Check if area was found
        if ($record) {
            $district = $record->district;
            $city = $district->city;
            $state = $city->state;
            $country = $state->country;

            // Return the location details in JSON format
            return response()->json([
                'area' => $record->name,
                'district' => $district->name,
                'city' => $city->name,
                'state' => $state->name,
                'country' => $country->name,
            ]);
        } else {
            // If pincode is not found, return a 404 response
            return response()->json(['error' => 'Pincode not found'], 404);
        }
    }
}
