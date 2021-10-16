<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commentaire;

class CommentaireSeeder extends Seeder
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
                'commentaire' => 'commentaire1',
                'phase_id' => '1',
                'user_id' => '1'
            ],
            [
                'commentaire' => 'commentaire2',
                'phase_id' => '1',
                'user_id' => '1'
            ],
            [
                'commentaire' => 'commentaire3',
                'phase_id' => '1',
                'user_id' => '1'
            ],
        ];

        foreach ($table as $item) {
            Commentaire::create($item);
        }
    }
}
