<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run()
    {
        // You can add more countries as needed
        $countries = [
            [
                'name' => 'United States of America',
                'code' => 'USA'
            ],
            [
                'name' => 'Canada',
                'code' => 'CAN'
            ],
            [
                'name' => 'United Kingdom',
                'code' => 'UK'
            ],
            [
                'name' => 'India',
                'code' => 'IND'
            ],
            // Add more countries here
        ];

        // Insert data into the countries table
        // DB::table('countries')->insert($countries);

	// or
	foreach ($countries as $row) 
        {
            Country::create($row);
        }
    }
}