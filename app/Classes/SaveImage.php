<?php

namespace App\Classes;

class SaveImage 
{
    public function saveImageToFolder($image)
    {
        $image_name = time().".".$image->getClientOriginalExtension();
        $image_path = public_path('/images/upload');
        $image->move($image_path, $image_name);
    }
}

?>