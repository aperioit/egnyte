<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewHire extends Model
{
    use SoftDeletes, HasSlug;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the options for generating the slug.
     *
     * @return SlugOptions
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function assignment()
    {
        return $this->hasOne(Assignment::class);
    }

    public function activeTasks()
    {
        return $this->hasMany(ActiveTask::class);
    }
}
