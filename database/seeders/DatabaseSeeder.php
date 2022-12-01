<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(1)->create();
        \App\Models\Exam::factory(2)->create();
        \App\Models\Participant::factory(2)->create();
        \App\Models\ExamReg::factory(1)->create();
    }
}
