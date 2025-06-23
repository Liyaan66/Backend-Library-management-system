<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function bookKeeper()
    {
        return $this->belongsTo(BookKeeper::class);
    }


    public function readers()
    {
        return $this->belongsToMany(Reader::class, 'book_borrow')
            ->withPivot('borrowed_at', 'returned_at')
            ->withTimestamps();
    }
}
