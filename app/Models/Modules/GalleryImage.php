<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    

    public function gallery() {
        return $this->belongsTo('App\Models\Modules\Gallery');
    }
}
