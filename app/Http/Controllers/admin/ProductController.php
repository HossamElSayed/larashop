<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function srotBycat(Request $request)
    {
        $cat= $request->cat;


       $products=DB::table('products')->join('categories','products.cat_id','categories.id')
            ->where('categories.cat_name',$cat)->get();
       return view('front.products',compact('cat','products'));
    }
    public function productsCat(Request $request ,Category $category)
    {
        $cat_id=$request->cat_id;
        $price = explode("-",$request->price);
        $priceCount = count($price);
        if($cat_id!="" && $priceCount!="1")
        {
            $start = $price[0];
            $end = $price[1];
            //"both are selected";
            $products = DB::table('products')->join('categories', 'products.cat_id', 'categories.id')
                ->where('products.cat_id', $cat_id)
                ->where('products.pro_price', ">=", $start)
                ->where('products.pro_price', "<=", $end)->get();
        }
        else if($priceCount!="1")
        {
            $start = $price[0];
            $end = $price[1];
            //echo "price is selected";
            $products = DB::table('products')->join('categories', 'products.cat_id', 'categories.id')
                ->where('products.pro_price', ">=", $start)
                ->where('products.pro_price', "<=", $end)->get();
        }
        else if($cat_id!="")
        {
            //echo "cat is selected";
            $products = DB::table('products')->join('categories', 'products.cat_id', 'categories.id')
                ->where('products.cat_id', $cat_id)->get();
        }
        else{
            //echo "nothing is slected";
            return "<h1 align='center'>Please select atleast one filter from dropdown</h1>";

        }
        if(count($products)=="0")
        {
            echo "<h1 align='center'>no products found under <b style='color: red'> ".$start."-".$end."</b> price range</h1>";
        }
        else
        {
            return view('front.produtsPage',['products' => $products, 'cat' => $category->cat_name]);
        }




    }
    public function search(Request$request)
    {
        $searchData=$request->searchData;
        $produtcs=DB::table('products')
            ->join('categories','products.cat_id','categories.id')
            ->where('products.pro_name','like','%'.$searchData.'%')
            ->get();
        return view('front.products',['products'=>$produtcs,'cat'=>$searchData]);
    }
}
