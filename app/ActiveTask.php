<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveTask extends Model
{
    protected $guarded = [];

    public function newHire()
    {
        return $this->belongsTo(Position::class);
    }
}
