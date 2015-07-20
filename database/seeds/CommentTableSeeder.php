<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        DB::statement('ALTER TABLE comments AUTO_INCREMENT=1');
        DB::table('comments')->insert([
            [
                'email'=>'alan@yopmail.com',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ligula justo, euismod nec auctor vitae, pellentesque ut sem. Nunc in eros nec lectus tempor auctor ut vitae justo. Nulla ac tristique dui. Pellentesque ac bibendum purus. Donec lobortis nibh nulla, non congue lacus maximus quis. Donec vitae neque ultrices, euismod massa vitae, aliquet libero. In ex libero, tristique vestibulum metus et, lacinia faucibus orci. Proin pellentesque elit vitae metus maximus volutpat. Etiam mi felis, hendrerit in libero quis, ultricies aliquet orci. Donec sit amet mi nibh. Nulla facilisi. Suspendisse non tellus ullamcorper, interdum est at, gravida massa. Integer congue faucibus eros id convallis. Nulla sollicitudin fermentum nisl a suscipit. Aliquam eu egestas nisi, vitae interdum nibh.',
                'status' => 'publish',
                'post_id'=> '1',
            ],
            [
                'email'=>'mika@yahoo.com',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ligula justo, euismod nec auctor vitae, pellentesque ut sem. Nunc in eros nec lectus tempor auctor ut vitae justo. Nulla ac tristique dui. Pellentesque ac bibendum purus. Donec lobortis nibh nulla, non congue lacus maximus quis. Donec vitae neque ultrices, euismod massa vitae, aliquet libero. In ex libero, tristique vestibulum metus et, lacinia faucibus orci. Proin pellentesque elit vitae metus maximus volutpat. Etiam mi felis, hendrerit in libero quis, ultricies aliquet orci. Donec sit amet mi nibh. Nulla facilisi. Suspendisse non tellus ullamcorper, interdum est at, gravida massa. Integer congue faucibus eros id convallis. Nulla sollicitudin fermentum nisl a suscipit. Aliquam eu egestas nisi, vitae interdum nibh.',
                'status' => 'publish',
                'post_id'=> '2',
            ],
            [
                'email'=>'kevin@yopmail.com',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ligula justo, euismod nec auctor vitae, pellentesque ut sem. Nunc in eros nec lectus tempor auctor ut vitae justo. Nulla ac tristique dui. Pellentesque ac bibendum purus. Donec lobortis nibh nulla, non congue lacus maximus quis. Donec vitae neque ultrices, euismod massa vitae, aliquet libero. In ex libero, tristique vestibulum metus et, lacinia faucibus orci. Proin pellentesque elit vitae metus maximus volutpat. Etiam mi felis, hendrerit in libero quis, ultricies aliquet orci. Donec sit amet mi nibh. Nulla facilisi. Suspendisse non tellus ullamcorper, interdum est at, gravida massa. Integer congue faucibus eros id convallis. Nulla sollicitudin fermentum nisl a suscipit. Aliquam eu egestas nisi, vitae interdum nibh.',
                'status' => 'publish',
                'post_id'=> '1',

            ],
            [
                'email'=>'bob@gmail.com',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ligula justo, euismod nec auctor vitae, pellentesque ut sem. Nunc in eros nec lectus tempor auctor ut vitae justo. Nulla ac tristique dui. Pellentesque ac bibendum purus. Donec lobortis nibh nulla, non congue lacus maximus quis. Donec vitae neque ultrices, euismod massa vitae, aliquet libero. In ex libero, tristique vestibulum metus et, lacinia faucibus orci. Proin pellentesque elit vitae metus maximus volutpat. Etiam mi felis, hendrerit in libero quis, ultricies aliquet orci. Donec sit amet mi nibh. Nulla facilisi. Suspendisse non tellus ullamcorper, interdum est at, gravida massa. Integer congue faucibus eros id convallis. Nulla sollicitudin fermentum nisl a suscipit. Aliquam eu egestas nisi, vitae interdum nibh.',
                'status' => 'publish',
                'post_id'=> '2',

            ]
        ]);
    }
}
