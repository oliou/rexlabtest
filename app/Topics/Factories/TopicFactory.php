<?php

namespace App\Topics\Factories;

use App\Sections\Section;
use App\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Topics\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'body' => $this->faker->text
        ];
    }

    /**
     * Set a topic for the message
     *
     * @param Section|null $section Provide a topic or the first one will be selected for you
     * @return static
     */
    public function withSection(?Section $section = null): static
    {
        return $this->state(fn() => ['section_id' => $section->id ?? Section::all()->first()->id]);
    }

    /**
     * Set a user for the message
     *
     * @param User|null $user Provide a user or a random one will be selected for you
     * @return static
     */
    public function withUser(?User $user = null): static
    {
        return $this->state(fn() => ['user_id' => $user->id ?? User::all()->random()->id]);
    }
}
