<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user =  \App\Models\User::factory(10)->create();

    }
}
