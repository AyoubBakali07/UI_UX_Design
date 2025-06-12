<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call seeders in a specific order to respect dependencies
        $this->call(FormateurSeeder::class);
        $this->call(ApprenantSeeder::class);
        // Assuming GroupeSeeder is run by FormateurSeeder or already exists
        $this->call(AutoformationSeeder::class);
        $this->call(TutoSeeder::class);
        $this->call(RealisationAutoformationSeeder::class);
        $this->call(RealisationTutorielSeeder::class);

        // You might also have a default User seeder if needed separately
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',\n        //     'email' => 'test@mail.com',
        // ]);

        // Assuming FormationSeeder is independent if it doesn't have FK dependencies on the above
        // $this->call(FormationSeeder::class);
    }
}
