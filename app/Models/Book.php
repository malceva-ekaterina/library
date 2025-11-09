<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Book extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'fullname',
        'type_of_book_id',
        'author_id',
        'publishing_id',
        'year_of_publish',
        'count_of_sheets',
        'count_of_items',
    ];

    public function books_actions()
    {
        return $this->hasMany(Books_Action::class);
    }

    public function type_of_book()
    {
        return $this->belongsTo(Type_of_book::class);
    }

    public function publishing()
    {
        return $this->belongsTo(Publishing::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
