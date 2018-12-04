<?php

use Illuminate\Database\Seeder;

class ExpenseTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ExpenseType::class, 10)->create();
    }
}
