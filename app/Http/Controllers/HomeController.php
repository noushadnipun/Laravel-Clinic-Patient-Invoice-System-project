<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Doctor;
use App\PatientMdl;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
         //count
        $totalDoctor = Doctor::count();
        $totalInvoice = PatientMdl::count();
        return view('index', [
            'totaldoctor' => $totalDoctor,
            'totalinvoice' => $totalInvoice,
        ]);
    }
}
