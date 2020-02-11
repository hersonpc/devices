<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $guarded = [];

    public function path()
    {
//        return route('ui.sector.show', $this->id);
    }

    public function devices() {
        return $this->hasMany(Device::class);
    }

}
