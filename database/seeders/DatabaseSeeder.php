<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Event;
use App\Models\Organisateur;
use App\Models\Reservation;
use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'client']);
        Role::create(['name' => 'organisateur']);
        Role::create(['name' => 'admin']);

        $admin = Admin::factory()->create();
        $admin->user()->first()->assignRole('admin');
        
        $client = Client::factory()->create();
        $client->user()->first()->assignRole('client');

        $orga = Organisateur::factory()->create();
        $orga->user()->first()->assignRole('organisateur');

        Categorie::factory(10)->create();
        Event::factory(10)->create();

        Reservation::factory(5)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}