<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\BloodGroup;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_groups')->insert([
            ['name' => 'A+', 'status' => 'Available '],
            ['name' => 'A-', 'status' => 'Available '],
            ['name' => 'B+', 'status' => 'Available '],
            ['name' => 'B-', 'status' => 'Available '],
            ['name' => 'O+', 'status' => 'Available '],
            ['name' => 'O-', 'status' => 'Available '],
            ['name' => 'AB+', 'status' => 'Available '],
            ['name' => 'AB-', 'status' => 'Available '],
        ]);
    }
}
