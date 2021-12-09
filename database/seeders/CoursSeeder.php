<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cour;

class CoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = [
            [
                'nom' => 'cours1',
                'temps' => '30',
                'numero' => '30',
                'activated' => true,
                'formation_id' => '1',
                'created_id' => '1',
            ],
            [
                'nom' => 'cours2',
                'temps' => '30',
                'numero' => '30',
                'activated' => true,
                'formation_id' => '1',
                'created_id' => '1',
            ],
            [
                'nom' => 'cours3',
                'temps' => '30',
                'numero' => '30',
                'activated' => true,
                'formation_id' => '1',
                'created_id' => '1',
            ],
        ];

        foreach ($table as $item) {
            Cour::create($item);
        }
    }
}
