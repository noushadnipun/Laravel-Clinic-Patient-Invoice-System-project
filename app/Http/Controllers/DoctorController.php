<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Doctor;

use DB;

use Session;

class DoctorController extends Controller
{
    public function listDoctors() {
        //Show Query
        $DoctorList =  Doctor::paginate(20);
        //View
        return view('doctors.doctorlist', compact('DoctorList'));
    }

    //Save Doctor to DB
    public function stroeDoctor(Request $request){
          
        //Validation

        $request->validate(
            [
            'name' => 'required|unique:doctors,name',
           ]
        );

         //ORM Query
         $saveDoctors = new Doctor();
         $saveDoctors->name   = $request->name;
         $saveDoctors->email   = $request->email;
         $saveDoctors->phone   = $request->phone;
         $saveDoctors->address  = $request->address;
         $saveDoctors->department = $request->department;
         $saveDoctors->save();
 
         return redirect('doctor/all')->with('savemsg','Added successfully');

    }

    public function editDoctor($id){
        $editDoctor =  Doctor::find($id);
        return view('doctors.editdoctor',compact('editDoctor'));
    }

    // Update Doctor to DB
    public function updateDoctor(Request $request) {
        $updateDoctor = Doctor::find($request->id);
        $updateDoctor->name   = $request->name;
        $updateDoctor->email   = $request->email;
        $updateDoctor->phone  = $request->phone;
        $updateDoctor->address     = $request->address;
        $updateDoctor->department = $request->department;
        $updateDoctor->save();

        return redirect('doctor/all')->with('updatemsg','Update successfully');
     }

     // Delete Doctor
    public function deleteDoctor($id) {
        $deleteDoctor = Doctor::find($id);
        $deleteDoctor->delete();
        return back()->with('dltlmsg', 'Deleted Successfully.');
    }

}
