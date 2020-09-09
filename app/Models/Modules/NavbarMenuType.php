<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

class NavbarMenuType extends Model
{
    

    public function navbarMenus() {
        return $this->hasMany('App\Models\Modules\NavbarMenu');
    }
}
