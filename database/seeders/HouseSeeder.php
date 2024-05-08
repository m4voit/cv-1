<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        House::truncate();

        $csvFile = fopen(base_path("database/seeders/data/property-data.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                House::create([
                    'name' => $data[0],
                    'price' => $data[1],
                    'bedroom' => $data[2],
                    'bathroom' => $data[3],
                    'storey' => $data[4],
                    'garage' => $data[5]
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
