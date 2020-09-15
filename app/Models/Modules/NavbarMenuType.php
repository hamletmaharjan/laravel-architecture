<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NavbarMenuType extends Model
{
    use SoftDeletes;
    protected $fillable = ['type_name'];
    public function navbarMenus() {
        return $this->hasMany('App\Models\Modules\NavbarMenu');
    }
}
