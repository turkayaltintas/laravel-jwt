<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Türkay ALTINTAŞ',
            'email' => 'turkayaltints@hotmail.com',
            'password' => bcrypt('turkotrko'),
        ]);
    }
}
