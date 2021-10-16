<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(FormationSeeder::class);
        $this->call(CoursSeeder::class);
        $this->call(PhaseSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(CommentaireSeeder::class);
        $this->call(ReponseCommenttaireSeeder::class);
        $this->call(ReponseQuestionSeeder::class);

    }
}
