<?php

namespace Database\Seeders;

use App\Models\User as UserAlias;
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
        UserAlias::factory(10)->create();
    }
}
