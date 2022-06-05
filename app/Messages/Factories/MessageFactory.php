<?php

namespace App\Messages\Factories;

use App\Topics\Topic;
use App\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Messages\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'parent_id' => null,
            'body' => $this->faker->text,
            'is_highlight' => $this->faker->boolean
        ];
    }

    /**
     * Set a topic for the message
     *
     * @param Topic|null $topic Provide a topic or the first one will be selected for you
     * @return static
     */
    public function withTopic(?Topic $topic = null){
        return $this->state(fn() => ['topic_id' => $topic->id ?? Topic::all()->first()->id]);
    }

    /**
     * Set a user for the message
     *
     * @param User|null $user Provide a user or a random one will be selected for you
     * @return static
     */
    public function withUser(?User $user = null){
        return $this->state(fn() => ['user_id' => $user->id ?? User::all()->random()->id]);
    }
}
