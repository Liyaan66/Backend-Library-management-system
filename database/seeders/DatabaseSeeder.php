<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookKeeper;
use App\Models\BorrowBook;
use App\Models\Category;
use App\Models\Reader;
use App\Models\Timetable;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Category::factory(5)->create();
        Book::factory(10)->create();
        Reader::factory(5)->create();
        BookKeeper::factory(3)->create();
        BorrowBook::factory(15)->create();
        Timetable::factory(7)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
