<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Customer;
use Illuminate\Http\Request;

class CrudController extends Controller
{

  public function __construct(){
    $this->middleware("auth")->except(['contactUs']);
  }

   public function index() {
        return view("landingpage");
    }

    public function contactUS(){
        return view("contactUs");
    }

    public function contactDB(Request $req){
      $customer = Customer::create([
        "firstname" => $req->firstname,
        "lastname" => $req->lastname,
        "email" => $req->email,
        "mobilenumber" => $req->mobilenumber,
      ]);

      return redirect()->route("contactUs")->with('msg', "Successfully created");
    }

   public function customer(){
    $customer = Customer::all();
    // dd($customer);
    return view("customers",compact("customer"));
    // return $customer;
   }

public function customerEdit($id){
   $customer  =  Customer::where("id",$id)->get();

   return view("contactUs",compact("customer"));
}


public function customerUpdate(Request $req,$id){
   $customer  =  Customer::where("id",$id)->update([
    "firstname" => $req->firstname,
    "lastname" => $req->lastname,
    "email" => $req->email,
    "mobilenumber" => $req->mobilenumber,
   ]);

   return redirect()->route("customer")->with('msg', "Successfully Updated");
}

public function customerDelete($id){
  try{
    Customer::where("id",$id)->delete();
    return redirect()->route("customer")->with('msg', "Successfully Deleted");
  }catch(Exception $e){
    return redirect()->route("customer")->with('msg', "Failed to Deleted: ".$e->getMessage());
  }
 
}

}
