<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/26/18
 * Time: 11:25 AM
 */

namespace App\Repository\Modules;


use App\Models\Modules\News;

class NewsRepository
{
    
    private $news;


   
    public function __construct(News $news) {
        $this->news = $news;
    }

    public function all() {
        $result = $this->news->get();
        return $result;
    }
    public function findById($id) {
        $result = $this->news->find($id);
        return $result;
    }

}