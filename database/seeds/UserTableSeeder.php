<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();# Supprimer la table
        DB::statement('ALTER TABLE users AUTO_INCREMENT=1'); # Remettre la table à 1.
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password'=> \Illuminate\Support\Facades\Hash::make('admin')
            ],
        ]);
    }
}
