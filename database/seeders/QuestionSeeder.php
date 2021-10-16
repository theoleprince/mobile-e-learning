<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
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
                'question' => 'question1',
                'nbre_point' => '10',
                'cours_id' => '1',
                'created_id' => '1'
            ],
            [
                'question' => 'question2',
                'nbre_point' => '10',
                'cours_id' => '1',
                'created_id' => '1'
            ],
            [
                'question' => 'question3',
                'nbre_point' => '10',
                'cours_id' => '1',
                'created_id' => '1'
            ],
        ];

        foreach ($table as $item) {
            Question::create($item);
        }
    }
}
