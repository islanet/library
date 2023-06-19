<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Book extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function copy()
    {
        return $this->hasOne(CopyInventory::class);
    }
}
