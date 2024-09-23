<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'taskID' => Str::uuid(),
            'title' => $this->faker->text(20),
            'created_at' => now(),
            'updated_at' => now(),
            'userID' => User::factory()  // This links the task to a random user
        ];
    }
}
