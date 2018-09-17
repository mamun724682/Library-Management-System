<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book1 = [
            'title' => 'Data Structure',
            'author' => 'Mamun',
            'edition' => '5th',
            'session' => '2018-2019',
            'category_id' => 1,
            'page' => 500,
            'publisher' => 'Gono Bishwabidyalay',
            'language' => 'English',
            'isbn' => '544464',
            'purchase_date' => '2018-09-13',
            'quantity' => 54,
            'price' => 200,
            'shelf_id' => 1,
            'image' => 'default.jpg',
        ];
        $book2 = [
            'title' => 'Algorithm',
            'author' => 'Tony',
            'edition' => '6th',
            'session' => '2018-2019',
            'category_id' => 2,
            'page' => 505,
            'publisher' => 'Gono Bishwabidyalay',
            'language' => 'English',
            'isbn' => '5444646',
            'purchase_date' => '2018-09-13',
            'quantity' => 8,
            'price' => 205,
            'shelf_id' => 1,
            'image' => 'default.jpg',
        ];

        App\BookManagement::create($book1);
        App\BookManagement::create($book2);
    }
}
