<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Category extends Model
{
    use HasFactory;

    // ✅ Fillable attributes (must be outside any function)
    protected $fillable = ['type', 'description'];

    // ✅ Relationship method (must be after fillable)
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
