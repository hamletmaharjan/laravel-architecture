<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'file', 'notice_date', 'display_order', 'status', 'user_id'];
}
