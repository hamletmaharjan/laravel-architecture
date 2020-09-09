<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

class NavbarMenu extends Model
{
    

    public function navbarMenuType() {
        return $this->belongsTo('App\Models\Modules\NavbarMenuType');
    }
}
