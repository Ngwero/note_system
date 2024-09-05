<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition()
    {
        return [
            'note' => $this->faker->text,
            'user_id' => \App\Models\User::factory(), // This creates a new user for each note
        ];
    }
}
