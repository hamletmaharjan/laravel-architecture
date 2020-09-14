<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;
    protected $fillable = ['gallery_name'];
    public function galleryImages() {
        return $this->hasMany('App\Models\Modules\GalleryImage');
    }
}
