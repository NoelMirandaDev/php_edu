<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Book::factory(33)->create()->each(function ($book){
            $numOfReviews = random_int(5, 30);

            Review::factory($numOfReviews)
                ->good()
                ->for($book)
                ->create();
        });

        Book::factory(33)->create()->each(function ($book){
            $numOfReviews = random_int(5, 30);

            Review::factory($numOfReviews)
                ->average()
                ->for($book)
                ->create();
        });

        Book::factory(34)->create()->each(function ($book){
            $numOfReviews = random_int(5,30);

            Review::factory($numOfReviews)
                ->bad()
                ->for($book)
                ->create();
        });
    }
}
