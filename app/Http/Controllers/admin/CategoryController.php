<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('admin.addcategory');
    }
    public function saveCategory(Request $request)
    {
        $cat_name = $request->cat_name;
        $id = $request->id;
        if(isset($id))
        {
            $add_category = DB::table("categories")->where('id',$id)->update([
                'cat_name' => $cat_name,

                // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);
        }
        else
        {
            $add_category = DB::table("categories")->insert([
                'cat_name' => $cat_name,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);
        }



        if($add_category){
            echo "done";
        }
        else{
            echo "Error";
        }
    }
    public function deleteProduct($id)
    {
        $category=Category::find($id);
        $category->delete();
        return back();
    }
}
