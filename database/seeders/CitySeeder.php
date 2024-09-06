<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\State;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find a state by name
        $state = State::where('name', 'Tamil Nadu')->first();

        // Sorted districts (cities)
        $cities = [
            [$state->id, "Ariyalur"],
            [$state->id, "Chengalpattu"],
            [$state->id, "Chennai"],
            [$state->id, "Coimbatore"],
            [$state->id, "Cuddalore"],
            [$state->id, "Dharmapuri"],
            [$state->id, "Dindigul"],
            [$state->id, "Erode"],
            [$state->id, "Kallakurichi"],
            [$state->id, "Kancheepuram"],
            [$state->id, "Karur"],
            [$state->id, "Krishnagiri"],
            [$state->id, "Madurai"],
            [$state->id, "Mayiladuthurai"],
            [$state->id, "Nagapattinam"],
            [$state->id, "Nagercoil"],
            [$state->id, "Namakkal"],
            [$state->id, "Perambalur"],
            [$state->id, "Pudukkottai"],
            [$state->id, "Ramanathapuram"],
            [$state->id, "Ranipet"],
            [$state->id, "Salem"],
            [$state->id, "Sivagangai"],
            [$state->id, "Tenkasi"],
            [$state->id, "Thanjavur"],
            [$state->id, "Theni"],
            [$state->id, "Thiruvallur"],
            [$state->id, "Thiruvarur"],
            [$state->id, "Thoothukudi"],
            [$state->id, "Tiruchirappalli"],
            [$state->id, "Tirunelveli"],
            [$state->id, "Tirupathur"],
            [$state->id, "Tiruppur"],
            [$state->id, "Tiruvannamalai"],
            [$state->id, "Udagamandalam (Ootacamund)"],
            [$state->id, "Vellore"],
            [$state->id, "Viluppuram"],
            [$state->id, "Virudhunagar"]
        ];

        // Insert data into the cities table        
        foreach ($cities as $citiesData) {
            City::insert([
                'state_id' => $citiesData[0],
                'name' => $citiesData[1],
            ]);
        }
    }
}
