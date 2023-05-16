<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;
use Illuminate\Support\Carbon;

//Controller responsible for dealing with suppliers of our plant nursery
class SupplierController extends Controller
{
	//load all suppliers
    public function SupplierAll(){
  		// $suppliers = Supplier::all();
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all',compact('suppliers'));
    }

    //method responsible for opening the add new supplier view
    public function SupplierAdd(){
    	return view('backend.supplier.supplier_add');
    } 

    //method responsible for saving the supplier into the database
    public function SupplierStore(Request $request){
        Supplier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Supplier Added Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('supplier.all')->with($notification);
    } 

    //method that opens the edit supplier blade view
    public function SupplierEdit($id){
        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit',compact('supplier'));
    }

    //method that actually edits the supplier record on the db
    public function SupplierUpdate(Request $request){

        $sullier_id = $request->id;
        Supplier::findOrFail($sullier_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 
        ]);

         $notification = array(
            'message' => 'Supplier Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }

    //method responsible for deleting a supplier from the database
    public function SupplierDelete($id){
        Supplier::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Supplier Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
}