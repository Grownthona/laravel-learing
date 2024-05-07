<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Store;
use App\Models\Inventoryuser;
use App\Models\RequestInven;


class WarehouseController extends Controller
{
    public function showproduct(){
        $products = Product :: all();
        return view("products",compact("products"));
    }

    public function updateproduct(Request $request){

        $update_product = Product :: find($request['id']);
        $update_product->product_name = $update_product->product_name;
        $update_product ->category = $update_product ->category;
        $update_product ->details = $update_product ->details ;
        $update_product ->quantity =  $update_product ->quantity;
        $update_product ->status = "Received";
       
        if($update_product ->save()) {
            $products = Product :: all();
            return view("products",compact("products"));
        }else{
            return response()->json(['message' => 'Error!.'], 404);
        }
    }

    public function storerequests(){
        $stores = RequestInven :: all();
        return view("warehousestores",compact("stores"));
    }
    public function acceptwarehousereq(Request $request){
        
        $id = $request['id'];
        $findrequest = RequestInven :: find($id);
        if(isset($_POST['accept'])){
            $findproduct = Product :: where('id',$findrequest->pid)->first();

            $findrequest->status = "Shipped";
            $findrequest->date = date('Y-m-d H:i:s');
            $remaining  = (int)$findrequest->quantity - (int)$findrequest->stock;
            $findrequest->quantity = $remaining;

            $findproduct->quantity = $remaining;


            $findrequest->save();
            $findproduct->save();

            
            $stores = RequestInven :: all();
            return view("warehousestores",compact("stores"));
        }else if(isset($_POST['reject'])){

            RequestInven::where('id',$id)->delete();
            //Store :: where('pid',$findrequest->pid)->delete();
        }

        return $findrequest;
    }
}
