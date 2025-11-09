<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books_Action extends Model
{
    protected $table='books_actions';
    public $timestamps = false;

    protected $fillable = [
        'book_id',
        'reader_id',
        'get_date',
        'return_date',
        'count',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }
}
