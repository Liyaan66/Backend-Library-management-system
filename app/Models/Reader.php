<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'gender',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_borrow')
            ->withPivot('borrowed_at', 'returned_at')
            ->withTimestamps();
    }
    protected $fillable = ['name', 'email', 'gender'];

}
