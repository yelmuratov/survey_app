<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            [
                'survey_id' => 1,
                'user_id' => 1,
                'option' => 'Red',
            ],
            [
                'survey_id' => 1,
                'user_id' => 2,
                'option' => 'Blue',
            ],
            [
                'survey_id' => 1,
                'user_id' => 3,
                'option' => 'Green',
            ],
            [
                'survey_id' => 2,
                'user_id' => 1,
                'option' => 'Pizza',
            ],
            [
                'survey_id' => 2,
                'user_id' => 2,
                'option' => 'Burger',
            ],
            [
                'survey_id' => 2,
                'user_id' => 3,
                'option' => 'Pasta',
            ],
            [
                'survey_id' => 3,
                'user_id' => 1,
                'option' => 'PHP',
            ],
            [
                'survey_id' => 3,
                'user_id' => 2,
                'option' => 'Python',
            ],
            [
                'survey_id' => 3,
                'user_id' => 3,
                'option' => 'JavaScript',
            ],
            [
                'survey_id' => 4,
                'user_id' => 1,
                'option' => 'Laravel',
            ],
            [
                'survey_id' => 4,
                'user_id' => 2,
                'option' => 'Django',
            ],
            [
                'survey_id' => 4,
                'user_id' => 3,
                'option' => 'React',
            ],
            [
                'survey_id' => 5,
                'user_id' => 1,
                'option' => 'Earth',
            ],
            [
                'survey_id' => 5,
                'user_id' => 2,
                'option' => 'Mars',
            ],
            [
                'survey_id' => 5,
                'user_id' => 3,
                'option' => 'Venus',
            ],
            [
                'survey_id' => 6,
                'user_id' => 1,
                'option' => 'Hydrogen',
            ],
            [
                'survey_id' => 6,
                'user_id' => 2,
                'option' => 'Oxygen',
            ],
        ];

        foreach ($options as $option) {
            \App\Models\Option::create($option);
        }
    }

}   
