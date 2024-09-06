<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Area;

class AuthController extends Controller
{

    public function checkEmailAvailability(Request $request)
    {
        $email = $request->get('email');

        // Check if the email exists in the users table
        $emailExists = User::where('email', $email)->exists();

        if ($emailExists) {
            // If email is already taken, return a 409 response (Conflict)
            return response()->json(['message' => 'Email is already taken'], 409);
        } else {
            // If email is available, return a success response
            return response()->json(['message' => 'Email is available'], 200);
        }
    }

    public function checkPhone(Request $request)
    {
        $phone = $request->get('phone');

        // Check if phone number is already in use
        $exists = User::where('phone', $phone)->exists();

        if ($exists) {
            // Return 409 Conflict if phone number is already taken
            return response()->json(['error' => 'Phone number is already taken'], 409);
        } else {
            // Return 200 OK if phone number is available
            return response()->json(['message' => 'Phone number is available']);
        }
    }

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
