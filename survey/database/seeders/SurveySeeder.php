<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surveys = [
            [
                'category_id' => 1,
                'question' => 'What is your favorite color?',
            ],
            [
                'category_id' => 1,
                'question' => 'What is your favorite food?',
            ],
            [
                'category_id' => 2,
                'question' => 'What is your favorite programming language?',
            ],
            [
                'category_id' => 2,
                'question' => 'What is your favorite framework?',
            ],
            [
                'category_id' => 3,
                'question' => 'What is your favorite planet?',
            ],
            [
                'category_id' => 3,
                'question' => 'What is your favorite element?',
            ],
            [
                'category_id' => 4,
                'question' => 'What is your favorite sport?',
            ],
            [
                'category_id' => 4,
                'question' => 'What is your favorite team?',
            ],
            [
                'category_id' => 5,
                'question' => 'What is your favorite movie?',
            ],
            [
                'category_id' => 5,
                'question' => 'What is your favorite TV show?',
            ],
        ];

        foreach ($surveys as $survey) {
            \App\Models\Survey::create($survey);
        }
    }
}
