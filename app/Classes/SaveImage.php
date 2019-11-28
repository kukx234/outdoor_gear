<?php

namespace App\Classes;

use App\Models\CategoryImages;
use App\Models\SubCategoryImages;
use App\Models\ProductImages;
use App\Models\HeaderImage;

class SaveImage 
{
    public static function showFormImages($parameters)
    {
        $parameter  = explode("=",$parameters[1]);
        $model = $parameter[0];
        $id = $parameter[1];
   
        if($model == "categories_id"){
            return CategoryImages::where('categories_id', $id)->get();
        }
        elseif($model == "subcategory_id"){
            return SubCategoryImages::where('sub_categories_id', $id)->get();
        }
        elseif($model == "product_id"){
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


    public static function saveImageToDatabase($image, $parameters)
    {
        $image_name = time().".".$image->getClientOriginalExtension();
        $model = "header";
        if(count($parameters) > 1){
            $parameter = explode("=", $parameters[1]);
            $model = $parameter[0];
            $id = $parameter[1];
        }
        
        if($model == "category_id"){
    
            CategoryImages::insert([
                'image' => $image_name,
                'categories_id' => $id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return CategoryImages::where('categories_id', $id)->get();
        }
        elseif($model == "subcategory_id"){
            SubCategoryImages::insert([
                'image' => $image_name,
                'sub_categories_id' => $id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return SubCategoryImages::where('sub_categories_id', $id)->get();
        }
        elseif($model == "product_id"){
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


    public static function deleteImageFromDatabase($parameters)
    {
        $model = $parameters['model'];
        $id = $parameters['image_id'];
        
        if($model == "cat"){
            $filename = CategoryImages::where('id', $id)->first();
            CategoryImages::where('id', $id)->delete();
        }else if($model == "subcat"){
            $filename = SubCategoryImages::where('id', $id)->first();
            SubCategoryImages::where('id', $id)->delete();
        }
        elseif($model == "product"){
            $filename = ProductImages::where('id', $id)->first();
            ProductImages::where('id', $id)->delete();
        }else {
            $filename = HeaderImage::where('id', $id)->first();
            HeaderImage::where('id', $id)->delete();
        }
        $image_path = public_path('/images/upload');
        unlink($image_path."/".$filename->image);
    }
}

?>