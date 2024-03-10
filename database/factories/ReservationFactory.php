<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Event;
use App\Models\Organisateur;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     
    public function definition(): array
    {
       
        return [
            'user_id' => Client::first()->user->id,
            'event_id'=> Event::factory()->create(),
            'validated_at' => Carbon::now()
        ];
    }
}