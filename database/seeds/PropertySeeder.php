<?php

use App\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFilePath = database_path('seeds/property-data.csv');

        if (! file_exists($csvFilePath)) {
            return;
        }

        $rows = explode("\n", file_get_contents($csvFilePath));
        $header = str_getcsv(strtolower(array_shift($rows)));

        foreach ($rows as $row) {
            if (empty($row)) {
                continue;
            }

            Property::query()->create(array_combine($header, str_getcsv($row)));
        }
    }
}
