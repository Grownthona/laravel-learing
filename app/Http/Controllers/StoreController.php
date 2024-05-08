<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Store;
use App\Models\Inventoryuser;
use App\Models\RequestInven;

use Illuminate\Support\Facades\DB;


class StoreController extends Controller
{
    public function showstoreproducts(){
        
        /*$flag = Store :: count();
        
        if($flag==0){
            $products = Product :: all();
            return view("storeproducts",compact("products"));
        }

        $products = DB::table('products')
        ->leftJoin('stores', 'products.id', '=', 'stores.pid')
        ->where('stores.pid',NULL)
        ->select('products.id','products.product_name','products.category','products.quantity','products.status')
        ->get();
       
        return view("storeproducts",compact("products"));
        */
        $products = Product :: all();
        return view("storeproducts",compact("products"));

    }

    public function storestoresummary(){
        $requests = Store :: all();

        return view("storesummary",compact("requests"));
    }

    public function requestproduct(Request $request){

        $new_req = new Store;
        $new_req->name = $request["name"];
        $new_req->quantity = $request["quantity"];
        $new_req->category = $request["category"];
        $new_req->stock = $request["stock"];
        $new_req->status = "requested";
        $new_req->date = $request["date"];
        $new_req->pid = $request["id"];

        $find_prod = Product :: find($request["id"]);
        $remaining = (int)$find_prod->quantity - (int)$request["stock"];
        if($remaining <0){
            return response()->json(['message' => 'The stock amount is too high!'], 500);
        }

        if($new_req ->save()) {
            /*$flag = Store :: count();
            if($flag==0){
                $products = Product :: all();
                return view("storeproducts",compact("products"));
            }
            $products = DB::table('products')
            ->leftJoin('stores', 'products.id', '=', 'stores.pid')
            ->where('stores.pid',NULL)
            ->select('products.id','products.product_name','products.category','products.quantity','products.status')
            ->get();
            
            return view("storeproducts",compact("products"));*/
            $products = Product :: all();
            return view("storeproducts",compact("products"));
        }else{
            return response()->json(['message' => 'Error!.'], 404);
        }
    }
}
