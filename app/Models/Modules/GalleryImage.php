<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'display_order', 'status', 'gallery_id', 'image'];
    public function gallery() {
        return $this->belongsTo('App\Models\Modules\Gallery');
    }
}
