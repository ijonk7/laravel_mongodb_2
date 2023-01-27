<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Book::factory()->count(15)->create();

        $user = User::factory()->create();
        $books = Book::factory()
                     ->count(3)
                     ->for($user)
                     ->create();
    }
}
