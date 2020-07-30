<?php

use Illuminate\Database\Seeder;

class post extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\Post::class, 100)->create();
    }
}
