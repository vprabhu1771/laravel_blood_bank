<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the city by name, adjust based on your actual City or State model
        $city = City::where('name', 'Cuddalore')->first();

        if (!$city) {
            $this->command->error("City not found");
            return;
        }

        // Define districts related to that city
        $districts = [
            [$city->id, "Cuddalore"],
            [$city->id, "Kurinjipadi"],
            [$city->id, "Panruti"],
            [$city->id, "Vadalur"],
            [$city->id, "Chidhambaram"],
       
            
            
            // Add more districts here
        ];

        // Insert data into the districts table        
        foreach ($districts as $districtData) {
            District::insert([
                'city_id' => $districtData[0],
                'name' => $districtData[1],
            ]);
        }
    }
}
