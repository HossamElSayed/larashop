<?php

namespace App\Http\Controllers\admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function addProduct()
    {
      return view('admin.addproduct');
    }

    public function saveProduct(Request $request){
          $pro_name = $request->pro_name;
          $pro_code = $request->pro_code;
          $pro_price = $request->pro_price;
          $cat_id = $request->cat_id;

          if(isset($request->id))
          {
              $id=$request->id;
              $add_product = DB::table("products")->where('id',$id)->update([
                  'pro_name' => $pro_name,
                  'pro_code' => $pro_code,
                  'pro_price' => $pro_price,
                  'pro_image'=>'default-avatar.png',
                 // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                  'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
              ]);
          }
          else
          {
              $add_product = DB::table("products")->insert([
                  'pro_name' => $pro_name,
                  'pro_code' => $pro_code,
                  'pro_price' => $pro_price,
                  'cat_id' => $cat_id,
                  'pro_image'=>'default-avatar.png',
                  'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                  'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
              ]);
          }


          if($add_product){
            echo "done";
          }
          else{
            echo "Error";
          }
        }
        public function deleteProduct($id)
        {
            $product=Product::find($id);
            $product->delete();
            return back();
        }
        public function uploadImage(Request $request)
        {
            $img=$request->file('img');
            $id=$request->id;
            $file_name=$img->getClientOriginalName();
           $file_name=time().$file_name;
           $path='uploads/img_product';
           $img->move($path,$file_name);

           $upload=DB::table('products')->where('id',$id)->update(['pro_image'=>$file_name]);

           if($upload)
           {
               return view('admin.editproduct',['product'=>Product::where('id',$id)->get()]);
           }
           else{
               echo 'error';
           }
        }


}
