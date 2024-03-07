<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::role('organisateur')->first();
        $cats = Categorie::first();
        return [
            'name'=>fake()->word(),
            'description'=>fake()->sentence(),
            'date'=>fake()->dateTime(),
            'nbrPlacesDispo'=>fake()->randomNumber(),
            'price'=>fake()->buildingNumber(),
            'picture'=>'Covening-Asia-Pacific-Sydney-1.jpg',
            'Validation_type'=>'automatique',
            'validated_at'=>fake()->dateTime(),
            'user_id'=>$users->id,
            'category_id'=>$cats->id
        ];
    }
}