<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TodosTableSeeder;
use Database\Seeders\TagsTableSeeder;

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
        $this->call([

            TagsTableSeeder::class,
            TodosTableSeeder::class
        ]);
    }
}
