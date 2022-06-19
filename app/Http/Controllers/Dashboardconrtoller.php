<?php

namespace App\Http\Controllers;

use App\Models\Cdr;
use App\Models\Number;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboardconrtoller extends Controller
{
    public function index()
    {
        $numbers = Number::all();
        $providers = Provider::all();
        
        $sum = Cdr::sum('billsec')/60;
        


        $cdr = DB::table('cdr')->get();
        return view('dashboard.index',['numbers' => $numbers,'providers' => $providers,'cdr' => $cdr,'sum' => $sum]);
    }
}
