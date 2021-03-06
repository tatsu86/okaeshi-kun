<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Celebrater extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('celebrater', function (Builder $builder) {
            $builder->where('user_id', Auth::id());
        });
    }

    public function events()
    {
        return $this->belongsToMany('App\Celebrater',
                                    'celebrations',
                                    'celebrater_id',
                                    'event_id');
    }
}
