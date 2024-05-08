<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Models\Inventoryuser;
use App\Models\RequestInven;
use Illuminate\Support\Facades\Auth;



use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showaddproduct(){
        return view("addproduct");
    }
    public function addproduct(Request $request){
        $products = new Product;
        $products->product_name = $request['name'];
        $products->category = $request['category'];
        $products->details = $request['details'];
        $products->quantity = $request['quantity'];
        //$products->warehouse_staff = $request['warehouse_staff'];
        $products->status = "Pending";

        if($products->save()) {
            return response()->json(['message' => 'New Product Added!.'], 201);
        }else{
            return response()->json(['message' => 'Error!.'], 404);
        }
    }

    public function adminstorerequests(){
        $requests = Store :: all();

        return view("requestproduct",compact("requests"));
    }

    public function approvestorerequests(Request $request){

        $status = '';
        $id = $request['id'];

        if(isset($_POST['accept'])){
            $status = "Accept";
        }else if(isset($_POST['reject'])){
            $status = "Reject";
        }

        $findrequest = Store :: find($id);
        $findrequest->status = $status;
        $findrequest->save();
        $requests = Store :: all();

        if($status == "Accept"){

            $store_request_to_warehouse = new RequestInven;
            $store_request_to_warehouse->name = $findrequest->name;
            $store_request_to_warehouse->quantity = $findrequest->quantity;
            $store_request_to_warehouse->status = "pending to ship";
            $store_request_to_warehouse->date = $findrequest->date;
            $store_request_to_warehouse->stock = $findrequest->stock;
            $store_request_to_warehouse->pid = $findrequest->pid;
            $store_request_to_warehouse->save();

        }else{
            //$findrequest->status = "Accept";
            //$findrequest->save();
            RequestInven::where('pid',$findrequest->pid)->delete();
        }
        return view("requestproduct",compact("requests"));
    }

    public function adminproducts(){
        $products = Product :: all();
        return view("adminviewproducts",compact("products"));
    }
    public function addusershow(Request $request){
        return view("adduser");
    }
    public function adduser(Request $request){
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'joining' => 'required|string',
            'password' => 'required|min:6']);

        $newuser = new Inventoryuser;
        $newuser->name = $request['name'];
        $newuser->role = $request['role'];
        $newuser->joining = $request['joining'];
        $newuser->password = Hash::make($request['password'], ['rounds' => 12]);

        $findusename = Inventoryuser :: where('name',$request['name'])->first();
        if($findusename){
            return response()->json(['message' => 'This user already exists!'], 500);
        }else if($request['joining']=='' || $request['role']==''){
            return response()->json(['message' => 'Please fillup all information!'], 500);
        }

        if($newuser->save()) {
            return response()->json(['message' => 'User added successfully!', 'user' => $newuser], 201);
        } else {
            return response()->json(['message' => 'Error!'], 500);
        }
    }

    public function signinview(){
        return view("signin");
    }
    public function signin(Request $request){

        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        //changes , check it
        $user = Inventoryuser::where('name','=',$request->name)->first();
        if($user && $request->password == $user->password){
            Auth::login($user);
            if(Auth::check()){
                return "success";
            }else{
                return "not logged in";
            }
        }else{
          return "Error";
        }
        
        $finduser = Inventoryuser :: where('name',$user->name)->first();
        $hashedPassword = $finduser->password;
        if(!$finduser){
            return response()->json(['message' => "This user doesn't exists!"], 500);
        }if (!Hash::check($user->password, $hashedPassword)) {
            return response()->json(['message' => "Password doesn't match!"], 500);
        }

        $role = $finduser->role;
        session()->put('role', $role);

        if($role == "Warehouse Staff"){
            return redirect('/warehouse');
        }else if($role == "Admin"){
            return redirect('/admin');
        }else{
            return redirect('/store');
        }

        return "Error!";


    }
    public function staffinfo(){
        $users = Inventoryuser :: all();
        return view("staff",compact("users"));
    }

    public function requestlist(){
        $requests = RequestInven :: all();
        return view("allrequests",compact("requests"));
    }

}
