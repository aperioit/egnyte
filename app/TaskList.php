<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notify_group()
    {
        return $this->hasOne(NotifyGroup::class);
    }
}
