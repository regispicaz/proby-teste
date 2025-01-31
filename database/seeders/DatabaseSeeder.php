<?php

namespace Database\Seeders;

use App\Models\{
    Project,
    User
};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Gestor',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        Project::factory(30)->create();
    }
}
