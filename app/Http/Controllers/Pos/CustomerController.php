<?php
namespace App\Http\Controllers\Pos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Illuminate\Support\Carbon;
use Image;
use App\Models\Payment;

class CustomerController extends Controller
{
    //Method responsible for loading the Customers View All page
    public function CustomerAll()
    {
        $customersList = Customer::latest()->get();
        return view('backend.customer.customer_all', compact('customersList'));
    } 

    //Loads AddNewCustomer view
    public function CustomerAdd()
    {
        return view('backend.customer.customer_add');
    }

    //Method responsible for storing a new customer record in the database
    public function CustomerStore(Request $request)
    {
        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(200, 200)->save('upload/customer/' . $name_gen);
        $save_url = 'upload/customer/' . $name_gen;

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Customer Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

    } 

    //Method responsible for loading the Edit Customer View
    public function CustomerEdit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }

    //Method responsible fpr updating an existing customer record in the database
    public function CustomerUpdate(Request $request)
    {

        $customer_id = $request->id;
        if ($request->file('customer_image')) {

            $image = $request->file('customer_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); 
            Image::make($image)->resize(200, 200)->save('upload/customer/' . $name_gen);
            $save_url = 'upload/customer/' . $name_gen;

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'customer_image' => $save_url,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Customer Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.all')->with($notification);

        } else {

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Customer Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.all')->with($notification);

        }

    } 

    //Method used to delete an existing customer
    public function CustomerDelete($id)
    {
        $customers = Customer::findOrFail($id);
        $img = $customers->customer_image;
        unlink($img);
        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 

    public function CreditCustomer(){
        $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.customer.customer_credit',compact('allData'));
    }

    public function CreditCustomerPrintPdf(){
        $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_credit_pdf',compact('allData'));

    }