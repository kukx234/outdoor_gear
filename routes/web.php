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
    Route::name('category_list')->get('categories', 'Admin\CategoryController@allCategories');
    Route::name('category_details')->get('category/{id}', 'Admin\CategoryController@categoryDetails');
    Route::name('category-save')->post('categorySave','Admin\CategoryController@save');
    Route::name('new-category')->get('newCategory', 'Admin\CategoryController@newCategory');
    Route::name('category-delete')->get('deleteCategory/{id}', 'Admin\CategoryController@deleteCategory');

    //Podkategorije
    Route::name('sub_category_list')->get('subcategories', 'Admin\SubCategoryController@allSubCategories');
    Route::name('new_sub_category')->get('newsubcategory', 'Admin\SubCategoryController@newSubCategory');
    Route::name('sub_category_save')->post('subcategorysave', 'Admin\SubCategoryController@save');
    Route::name('sub_category_delete')->get('deletesubcategory/{id}', 'Admin\SubCategoryController@delete');

    //Produkti
    Route::name('products_list')->get('products', 'Admin\ProductController@allProducts');
    Route::name('new_product')->get('newProduct', 'Admin\ProductController@newProduct');
    Route::name('save_new_product')->post('newProduct', 'Admin\ProductController@save');

    Route::name('ajax-category-call')->get('ajaxcategorycall', 'Admin\ProductController@ajaxCategoryCall');
});
