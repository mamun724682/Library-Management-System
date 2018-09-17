<?php

use Illuminate\Database\Seeder;

class ShelvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shelf1 = ['name' => 'Shelf 1'];
        $shelf2 = ['name' => 'Shelf 2'];

        App\Shelf::create($shelf1);
        App\Shelf::create($shelf2);
    }
}
