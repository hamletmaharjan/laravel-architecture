<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/26/18
 * Time: 11:25 AM
 */

namespace App\Repository\Modules;


use App\Models\Modules\Gallery;

class GalleryRepository
{
    
    private $gallery;


   
    public function __construct(Gallery $gallery) {
        $this->gallery = $gallery;
    }

    public function all() {
        $result = $this->gallery->get();
        return $result;
    }
    public function findById($id) {
        $result = $this->gallery->find($id);
        return $result;
    }

    public function galleryImagesById($id) {
        $result = $this->gallery->galleryImages->get();
        return $result;
    }

    public function slides() {
        $gallery = $this->gallery->where('gallery_name', 'Slides')->first();
        $result = $gallery->galleryImages()->get();
        return $result;
    }

}