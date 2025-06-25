<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowBook extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowBookFactory> */
    use HasFactory;

    // ✅ Mass assignable fields
    protected $fillable = [
        'quantity',
        'book_id',
        'reader_id',
        'bookkeeper_id',
        'borrowed_at',
        'returned_at',
    ];

    // ✅ Relationships
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }

    public function bookkeeper()
    {
        return $this->belongsTo(BookKeeper::class);
    }
}

