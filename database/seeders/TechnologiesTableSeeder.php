<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologiesTableSeeder extends Seeder
{
    public function run()
    {
        $technologies = [
            ['name' => 'js'],
            ['name' => 'html'],
            ['name' => 'css'],
            ['name' => 'laravel'],
            ['name' => 'vue'],
            ['name' => 'php'],
            ['name' => 'java'],
            ['name' => 'angular'],
            ['name' => 'spring boot'],
        ];

        DB::table('technologies')->insert($technologies);
    }
}
