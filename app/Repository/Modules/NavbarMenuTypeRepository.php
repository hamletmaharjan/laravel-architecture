<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/26/18
 * Time: 11:25 AM
 */

namespace App\Repository\Modules;


use App\Models\Modules\NavbarMenuType;

class NavbarMenuTypeRepository
{
    
    private $navbarMenuType;


   
    public function __construct(NavbarMenuType $navbarMenuType) {
        $this->navbarMenuType = $navbarMenuType;
    }

    public function all() {
        $result = $this->navbarMenuType->get();
        return $result;
    }
    public function findById($id) {
        $result = $this->post->find($id);
        return $result;
    }

}