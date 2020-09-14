<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/26/18
 * Time: 11:25 AM
 */

namespace App\Repository\Modules;


use App\Models\Modules\Page;

class PageRepository
{
    
    private $page;


   
    public function __construct(Page $page) {
        $this->page = $page;
    }

    public function all() {
        $result = $this->page->get();
        return $result;
    }
    public function findById($id) {
        $result = $this->page->find($id);
        return $result;
    }

    public function toSlug($title) {
        $arr = explode(" ", $title);
        return implode("-", $arr);
    }

    public function findBySlug($slug) {
        $result = $this->page->where('slug', '=', $slug)->where('status','active')->first();
            
        return $result;
    }
}