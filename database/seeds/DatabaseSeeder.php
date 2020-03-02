<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersSeeder::class);

        DB::table('users') -> insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),

        ]);
    }
}
