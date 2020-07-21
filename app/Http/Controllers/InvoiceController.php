<?php

namespace App\Http\Controllers;

use App\InvoiceMdl;

use App\PatientMdl;

use App\Doctor;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function listInvoice() {
        $PatientList =  PatientMdl::paginate(20);
        return view ('invoice/list', compact('PatientList'));
    }

    public function createInvoice() {
        $DoctorList =  Doctor::all();
        return view('invoice.create', compact('DoctorList'));
    }


    public function store(Request $request){
        $data = $request->all();
        $lastid=PatientMdl::create($data)->id;
        if(count($request->item_name) >0 ){
            foreach($request->item_name as $item=>$v){
                 $data2 = array(
                      'orders_id' => $lastid,
                      'item_name' => $request->item_name[$item],
                      'description' => $request->description[$item],
                      'single_amount' => $request->single_amount[$item],
                      'single_paid' => $request->single_paid[$item],
                      'single_due' => $request->single_due[$item],
                    //   'total_amount' => $request->total_amount[$item],
                    //   'total_paid' => $request->total_paid[$item],
                    //   'total_due' => $request->total_due[$item],
                 );
               InvoiceMdl::insert($data2);
            }
        }
        return redirect('invoice/all')->with('savemsg','Added successfully');
    }

    public function item($id){
        $PatientList = PatientMdl::where('id', '=', $id)->get();
        $invoiceList = InvoiceMdl::where('orders_id', '=', $id)->get();
        return view('invoice.item', compact('invoiceList','PatientList'));
    }


       // Delete Invoice
       public function deleteInvoice($id) {
        $deleteDoctor = PatientMdl::find($id);
        $deleteDoctor->delete();
        return back()->with('dltlmsg', 'Deleted Successfully.');
    }



}
