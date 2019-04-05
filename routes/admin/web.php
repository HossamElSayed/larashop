<?php

//Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth' => 'admin'])->group(function () {
    Route::get('/','AdminController@index')->name('index');
    Route::get('profile','AdminController@profile')->name('profile');
    Route::get('addproduct','AdminController@addProduct')->name('addproduct');
    Route::post('saveproduct','AdminController@saveProduct')->name('saveproduct');
    Route::view('products','admin.products',["products"=>App\Product::all()])->name('products');
    Route::get('editproduct/{id}',function ($id){
        $product=\App\Product::where('id',$id)->get();
        return view('admin.editproduct',compact('product'));
    });
    Route::Delete('deleteproduct/{id}','AdminController@deleteProduct');
    Route::view('changeimage/{id}','admin.changeimage');
    Route::post('uploadimage','AdminController@uploadImage');
    //Routes of Category
    Route::get('addcategory','CategoryController@addCategory')->name('addcategory');
    Route::any('savecategory','CategoryController@saveCategory')->name('savecategory');
   Route::view('categories','admin.categories',["categories"=>App\Category::all()])->name('categories');
    Route::get('editcategory/{id}',function ($id){
        $category=\App\Product::where('id',$id)->get();
        return view('admin.editcategory',compact('category'));
    });

});




//Routes of Front WebsIte (for any Guest)
Route::view('/products','front.products',['products'=>App\Product::all(),'cat'=>'All Product']);
Route::get('products/{cat}','ProductController@srotBycat');
Route::get('search','ProductController@search');
Route::get('productsCat','ProductController@productsCat');
