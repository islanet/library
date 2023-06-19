<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'copy_inventory_id', 'member_id','from','to'
    ];

    public function copy()
    {
        return $this->belongsTo(CopyInventory::class,'copy_inventory_id','id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
