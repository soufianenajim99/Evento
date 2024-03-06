<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisateur>
 */
class OrganisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create([
                'email' => 'orga@gmail.com',
                'picture' => 'transparent-batman-superhero-character-in-black-and-yellow-suit65ddcb5c50e633.0714882917090343323314.png'
            ])
        ];
    }
}