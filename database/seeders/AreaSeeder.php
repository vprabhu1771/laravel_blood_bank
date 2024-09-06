<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the district by name
        $district = District::where('name', 'Cuddalore')->first();

        // Array of areas and their corresponding names
        $areas = [
            [$district->id, "Annamalai Nagar", "608002"],
            [$district->id, "Bhuvanagiri", "608601"],
            [$district->id, "Chidambaram", "608001"],
            [$district->id, "Gangaikondan", "627352"],
            [$district->id, "Kattumannarkoil", "608306"],
            [$district->id, "Killai", "608102"],
            [$district->id, "Kovilampoondi Gram Panchayat", "607803"],
            [$district->id, "Kurinjipadi", "607302"],
            [$district->id, "Lalpet", "608303"],
            [$district->id, "Mangalampet", "607403"],
            [$district->id, "Nellikuppam", "607105"],
            [$district->id, "Neyveli", "607803"],
            [$district->id, "Panruti", "607106"],
            [$district->id, "Parangipettai", "608502"],
            [$district->id, "Pennadam", "606105"],
            [$district->id, "Sethiathoppu", "608701"],
            [$district->id, "Srimushnam", "608703"],
            [$district->id, "Thirupathiripuliyur", "607002"],
            [$district->id, "Tittakudi", "606106"],
            [$district->id, "Vadalur", "607303"],
            [$district->id, "Veyyalore Nagar Panchayat", "607204"],
            [$district->id, "Virudhachalam", "606001"],
            [$district->id, "Manjakuppam", "607001"],
        ];
        // Insert each area into the 'areas' table
        foreach ($areas as $areaData) {
            Area::insert([
                'district_id' => $areaData[0],  // foreign key for district
                'name' => $areaData[1],         // area name
                'pincode' =>$areaData[2],
            ]);
        }
    }
}
