<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'start_date', 'end_date', 'start_time', 'end_time', 'venue', 'status', 'user_id'];
    public function user() {
        return $this->belongsTo('App\User');
    }
}
