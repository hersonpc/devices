<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $guarded = [];

    public function path()
    {
//        return route('ui.device.show', $this->id);
    }

    public function sector() {
        return $this->belongsTo(Sector::class);
    }
}
