<?php
/**
 * Created by PhpStorm.
 * User: santosh
 * Date: 3/20/18
 * Time: 2:20 PM
 */

namespace App\Repository;



class FileRepository
{

    public function moveFileWithName($file, $fileType){
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/uploads/'.$fileType),$fileName);
        return $fileName;
    }
    
    
}