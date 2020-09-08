<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //

    public function user() {
        return $this->belongsTo('App\User');
    }
}
