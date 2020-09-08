<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    
    public function galleryImages() {
        return $this->hasMany('App\Models\Modules\GalleryImage');
    }
}
