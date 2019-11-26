<?php

namespace App\Classes;

use App\Models\CategoryImages;
use App\Models\SubCategoryImages;
use App\Models\ProductImages;
use App\Models\HeaderImage;

class SaveImage 
{
    public static function showFormImages($model, $id)
    {
        if($model == "category"){
            return CategoryImages::where('categories_id', $id)->get();
        }
        elseif($model == "sub_category"){
            return SubCategoryImages::where('sub_categories_id', $id)->get();
        }
        elseif($model == "product"){
            return ProductImages::where('product_id', $id)->get();
        }
        else {
            return HeaderImage::all();
        }
    }

    public static function saveImageToFolder($image)
    {
        $image_name = time().".".$image->getClientOriginalExtension();
        $image_path = public_path('/images/upload');
        $image->move($image_path, $image_name);
    }

    public static function saveImageToDatabase($image, $model, $id)
    {
        $image_name = time().".".$image->getClientOriginalExtension();

        if($model == "category"){
            CategoryImages::insert([
                'image' => $image_name,
                'categories_id' => $id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return CategoryImages::where('categories_id', $id)->get();
        }
        elseif($model == "sub_category"){
            SubCategoryImages::insert([
                'image' => $image_name,
                'sub_categories_id' => $id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return SubCategoryImages::where('sub_categories_id', $id)->get();
        }
        elseif($model == "product"){
            ProductImages::insert([
                'image' => $image_name,
                'product_id' => $id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return ProductImages::where('product_id', $id)->get();
        }
        else {
            HeaderImage::insert([
                'image' => $image_name,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return HeaderImage::all();
        }
    }

    public static function deleteImageFromDatabase($model, $id)
    {
        if($model == "category"){
            CategoryImages::where('id', $id)->delete();
        }else if($model == "subcategory"){
            SubCategoryImages::where('id', $id)->delete();
        }
        elseif($model == "product"){
            ProductImages::where('id', $id)->delete();
        }
    }
}

?>