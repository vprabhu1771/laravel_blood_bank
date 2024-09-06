<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\BloodGroup;
use App\Enums\BloodGroupStatus;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $blood_group = [
            [
                'name' => 'A+', 
                'status' => BloodGroupStatus::AVAILABLE
            ],

            [
                'name' => 'A-', 
                'status' => BloodGroupStatus::AVAILABLE
            ],

            [
                'name' => 'B+', 
                'status' => BloodGroupStatus::AVAILABLE
            ],
            [
                'name' => 'B-', 
                'status' => BloodGroupStatus::AVAILABLE
            ],
            [
                'name' => 'O+', 
                'status' => BloodGroupStatus::AVAILABLE
            ],
            [
                'name' => 'O-', 
                'status' => BloodGroupStatus::AVAILABLE
            ],
            [
                'name' => 'AB+', 
                'status' => BloodGroupStatus::AVAILABLE
            ],
            [
                'name' => 'AB-', 
                'status' => BloodGroupStatus::AVAILABLE
            ],
        ];

        foreach($blood_group as $row)
        {
            BloodGroup::create($row);
        }
    }
}
