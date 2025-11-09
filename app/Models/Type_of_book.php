<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_of_book extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);

    }
}
