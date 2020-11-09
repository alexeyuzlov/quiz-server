<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
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
        User::factory(2)
            ->create();

        Question::factory(3)
            ->has(Answer::factory(1)->setCorrect())
            ->has(Answer::factory(1))
            ->create();
    }
}
