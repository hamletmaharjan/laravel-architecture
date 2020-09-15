<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'details', 'file', 'status', 'user_id'];
    public function user() {
        return $this->belongsTo('App\User');
    }
}
