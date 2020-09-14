<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/26/18
 * Time: 11:25 AM
 */

namespace App\Repository\Modules;


use App\Models\Modules\NavbarMenu;

class NavbarMenuRepository
{
    
    private $navbarMenu;


   
    public function __construct(NavbarMenu $navbarMenu) {
        $this->navbarMenu = $navbarMenu;
    }

    public function all() {
        $result = $this->navbarMenu->get();
        return $result;
    }
    public function findById($id) {
        $result = $this->navbarMenu->find($id);
        return $result;
    }

}