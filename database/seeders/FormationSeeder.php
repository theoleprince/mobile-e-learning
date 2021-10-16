<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
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
                'nom' => 'formation1',
                'description' => 'description formation',
                'activated' => false
            ],
            [
                'nom' => 'formation2',
                'description' => 'description formation',
                'activated' => false
            ],
            [
                'nom' => 'formation3',
                'description' => 'description formation',
                'activated' => false
            ],
        ];

        foreach ($table as $item) {
            Formation::create($item);
        }
    }
}
