<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'This is my First Post',
                'des'   => 'This is my First Post This is my First Post This is my First Post This is my First Post',
            ],
            [
                'title' => 'This is my Second Post',
                'des'   => 'This is my First Post This is my First Post This is my First Post This is my First Post',
            ],
            [
                'title' => 'This is my Third Post',
                'des'   => 'This is my First Post This is my First Post This is my First Post This is my First Post',
            ]
        ]);
    }
}
