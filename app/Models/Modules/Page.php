<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    protected $fillable = ['page_title', 'content', 'slug', 'file', 'status', 'user_id'];
    public function user() {
        return $this->belongsTo('App\User');
    }
}
