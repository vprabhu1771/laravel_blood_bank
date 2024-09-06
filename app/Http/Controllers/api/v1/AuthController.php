<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Aera;

class AuthController extends Controller
{
    //

    public function getLocation(Request $request)
    {
        $pincode = $request->get('pincode');

        $record = Aera::where('pincode', $pincode)->with('city.state.country')->first();
        
        // Simulate getting the data based on the pincode (this could be from a database or an external API)
        // $city = 'Sample City';
        // $state = 'Sample State';
        // $country = 'Sample Country';

        // return response()->json([
        //     'city' => $city,
        //     'state' => $state,
        //     'country' => $country,
        // ]);

        if ($record) {
            $state = $record->state;
            $country = $state->country;

            return response()->json([
                'city' => $city,
                'state' => $state,
                'country' => $country,
            ]);
        } else {
            return response()->json(['error' => 'pincode not found'], 404);
        }
    }

}
