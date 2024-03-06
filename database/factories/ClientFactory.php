<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
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
                'email' => 'client@gmail.com',
                'picture' => 'kisspng-computer-icons-google-account-user-profile-iconfin-png-icons-download-profile-5ab0301e32cb90.1777380215214960942081.png'
            ])
        ];
    }
}