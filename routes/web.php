<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('check_role');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Admin stranice
Route::prefix('admin')->middleware(['auth', 'check_role'])->group(function ()
{
    Route::name('admin-home')->get('home', 'Admin\HomeController@index');

    //kategorije
    Route::name('category-save')->post('categories/save','Admin\CategoryController@save');
    Route::name('new-category')->get('categories/new', 'Admin\CategoryController@newCategory');
    Route::name('category_list')->get('categories', 'Admin\CategoryController@allCategories');
    Route::name('category_details')->get('categories/{id}', 'Admin\CategoryController@categoryDetails');
    Route::name('category-delete')->get('categoriesdelete', 'Admin\CategoryController@deleteCategory');
    Route::name('category_edit')->get('categories/edit/{id}', 'Admin\CategoryController@editCategory');
    Route::name('category_edit_save')->post('categories/edit/{id}', 'Admin\CategoryController@editCategorySave');

    //Podkategorije
    Route::name('sub_category_list')->get('subcategory', 'Admin\SubCategoryController@allSubCategories');
    Route::name('new_sub_category')->get('newsubcategory', 'Admin\SubCategoryController@newSubCategory');
    Route::name('sub_category_save')->post('subcategorysave', 'Admin\SubCategoryController@save');
    Route::name('sub_category_delete')->get('deletesubcategory', 'Admin\SubCategoryController@delete');
    Route::name("sub_category_details")->get('subcategoryDetails/{id}', "Admin\SubCategoryController@details");
    Route::name('sub_category_edit')->get('subcategory/edit/{id}','Admin\SubCategoryController@edit');
    Route::name('sub_edit_save')->post('subcategory/editsave/{id}','Admin\SubCategoryController@editSave');

    //Produkti
    Route::name('products_list')->get('product', 'Admin\ProductController@allProducts');
    Route::name('new_product')->get('newproduct', 'Admin\ProductController@newProduct');
    Route::name('save_new_product')->post('newproduct', 'Admin\ProductController@save');
    Route::name('product_delete')->get('productDelete', 'Admin\ProductController@delete');
    Route::name('product_details')->get('productDetails/{id}', 'Admin\ProductController@details');
    Route::name('product_edit')->get('product/edit/{id}', 'Admin\ProductController@edit');

    Route::name('ajax-category-call')->get('ajaxcategorycall', 'Admin\ProductController@ajaxCategoryCall');

});
