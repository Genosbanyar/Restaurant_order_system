<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tables')->insert([
            'number' => "1"
        ]);
        DB::table('tables')->insert([
            'number' => "2"
        ]);
        DB::table('tables')->insert([
            'number' => "3"
        ]);
        DB::table('tables')->insert([
            'number' => "4"
        ]);DB::table('tables')->insert([
            'number' => "5"
        ]);
    }
}
