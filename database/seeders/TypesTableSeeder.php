<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'back-end'],
            ['name' => 'front-end'],
            ['name' => 'full-stack'],
        ];

        DB::table('types')->insert($types);
    }
}
