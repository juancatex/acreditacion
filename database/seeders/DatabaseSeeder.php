<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = new \App\Models\User(); 
        $user->name = 'REUNION NACIONAL';  //es el admin
        $user->email = 'reunion@ascinalss.org';
        $user->password = bcrypt('ascinalss');
        $user->save();
    }
}
