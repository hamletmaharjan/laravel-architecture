<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function user() {
        return $this->belongsTo('App\User');
    }
}
