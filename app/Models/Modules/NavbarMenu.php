<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NavbarMenu extends Model
{
    
    use SoftDeletes;
    protected $fillable = ['menu_name', 'navbar_menu_type_id', 'page_slug', 'parent_id', 'status'];
    public function navbarMenuType() {
        return $this->belongsTo('App\Models\Modules\NavbarMenuType');
    }

    public function childs() {
        return $this->hasMany('App\Models\Modules\NavbarMenu', 'parent_id', 'id');
    }
}
