<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Event extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('event', function (Builder $builder) {
            $builder->where('user_id', Auth::id());
        });
    }

    public function celebraters()
    {
        return $this->belongsToMany('App\Celebrater',
                                    'celebrations',
                                    'event_id',
                                    'celebrater_id');
    }
}
