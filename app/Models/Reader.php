<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reader extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'lastname',
        'firstname',
        'patronymic',
        'type_of_reader',
        'group_id',
        'can_get_books',
    ];

    public function books_actions()
    {
        return $this->hasMany(Books_Action::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
