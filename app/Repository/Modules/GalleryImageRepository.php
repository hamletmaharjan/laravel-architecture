<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/26/18
 * Time: 11:25 AM
 */

namespace App\Repository\Modules;


use App\Models\Modules\GalleryImage;

class GalleryImageRepository
{
    
    private $galleryImage;


   
    public function __construct(GalleryImage $galleryImage) {
        $this->galleryImage = $galleryImage;
    }

    public function all() {
        $result = $this->galleryImage->get();
        return $result;
    }
    public function findById($id) {
        $result = $this->galleryImage->find($id);
        return $result;
    }

}