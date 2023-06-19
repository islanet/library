<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_number', 'name', 'last_name', 'phone','loans_books_limit','active',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
