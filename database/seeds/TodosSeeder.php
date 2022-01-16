<?php

use App\Todos;
use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Todos::create([
            'message'=> 'Go to Market',
            'is_complete'=> 0,
        ]);
        Todos::create([
            'message'=> 'Go to Mosque',
            'is_complete'=> 0,
        ]);
    }
}
