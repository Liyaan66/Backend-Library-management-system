<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookKeeper extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }
}
