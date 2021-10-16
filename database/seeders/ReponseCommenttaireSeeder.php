<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReponseC;

class ReponseCommenttaireSeeder extends Seeder
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
                'reponse' => 'reponse1',
                'commentaire_id' => '1',
                'created_id' => '1'
            ],
            [
                'reponse' => 'reponse2',
                'commentaire_id' => '1',
                'created_id' => '1'
            ],
            [
                'reponse' => 'reponse3',
                'commentaire_id' => '1',
                'created_id' => '1'
            ],
        ];

        foreach ($table as $item) {
            ReponseC::create($item);
        }
    }
}
