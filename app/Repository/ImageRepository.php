<?php
/**
 * Created by PhpStorm.
 * User: santosh
 * Date: 3/20/18
 * Time: 2:20 PM
 */

namespace App\Repository;



class ImageRepository
{

    public function moveImageWithName($image, $imageType){
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/uploads/'.$imageType),$imageName);
        return $imageName;
    }
    
}