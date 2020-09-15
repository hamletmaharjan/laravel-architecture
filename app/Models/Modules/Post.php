<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'banner_image', 'status', 'user_id'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
