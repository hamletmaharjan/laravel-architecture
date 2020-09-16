<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/26/18
 * Time: 11:25 AM
 */

namespace App\Repository\Modules;


use App\Models\Modules\Post;

class PostRepository
{
    
    private $post;


   
    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function all() {
        $result = $this->post->get();
        return $result;
    }
    public function findById($id) {
        $result = $this->post->find($id);
        return $result;
    }

    public function allActive() {
        $result = $this->post->where('status', 'active')->get();
        return $result;
    }

}