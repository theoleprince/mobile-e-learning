<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Phase;

class PhaseSeeder extends Seeder
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
                'titre' => 'phase1',
                'video' => 'video',
                'numero' => '23',
                'temps' => '23',
                'activated' => false,
                'finish' => false,
                'cours_id' => '1',
                'created_id' => '1'
            ],
            [
                'titre' => 'phase2',
                'video' => 'video',
                'numero' => '23',
                'temps' => '23',
                'activated' => false,
                'finish' => false,
                'cours_id' => '1',
                'created_id' => '1'
            ],
            [
                'titre' => 'phase3',
                'video' => 'video',
                'numero' => '23',
                'temps' => '23',
                'activated' => false,
                'finish' => false,
                'cours_id' => '1',
                'created_id' => '1'
            ],
        ];

        foreach ($table as $item) {
            Phase::create($item);
        }
    }
}
