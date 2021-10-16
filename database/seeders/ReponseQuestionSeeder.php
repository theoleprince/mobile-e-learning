<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReponseQ;

class ReponseQuestionSeeder extends Seeder
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
                'Reponse' => 'Reponse1',
                'note' => '12',
                'statut' => 'accepté',
                'finish' => false,
                'question_id' => '1',
                'created_id' => '1'
            ],
            [
                'Reponse' => 'Reponse2',
                'note' => '12',
                'statut' => 'accepté',
                'finish' => false,
                'question_id' => '1',
                'created_id' => '1'
            ],
            [
                'Reponse' => 'Reponse3',
                'note' => '12',
                'statut' => 'accepté',
                'finish' => false,
                'question_id' => '1',
                'created_id' => '1'
            ],
        ];

        foreach ($table as $item) {
            ReponseQ::create($item);
        }
    }
}
