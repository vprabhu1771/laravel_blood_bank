<?php

namespace Database\Seeders;

use App\Models\User;

use Spatie\Permission\Models\Role;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);
        

       $roles=[
            [
                'name' => 'admin'
            ],
            [
                'name' => 'donar'
            ],
            [
                    'name' => 'paitent'
            ]
       ];

       foreach($roles as $row)
       {
            Role::create($row);
       }


       $this->call(CountrySeeder::class);
       $this->call(StateSeeder::class);
       $this->call(CitySeeder::class);
       $this->call(DistrictSeeder::class);
       $this->call(BloodGroupSeeder::class);
       $this->call(AreaSeeder::class);

    }

}
