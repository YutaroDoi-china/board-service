<?php

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
        DB::table('boards')->insert([
            [
                'kind' => 2,
                'text' => Str::random(12),
                'delete_at' => 1577545200,
                'title' => Str::random(10)
            ],
            [
                'kind' => 1,
                'text' => Str::random(12),
                'delete_at' => 1577545300,
                'title' => Str::random(10)
            ],
            [
                'kind' => 2,
                'text' => Str::random(12),
                'delete_at' => 1577545500,
                'title' => Str::random(10)
            ],
            [
                'kind' => 1,
                'text' => Str::random(12),
                'delete_at' => 1577535200,
                'title' => Str::random(10)
            ]
        ]);
    }
}
