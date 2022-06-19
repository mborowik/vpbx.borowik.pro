<?php

namespace App\Http\Controllers;

use App\Models\Cdr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cdrcontroller extends Controller
{
    public function index()
    {
        $cdry = Cdr::all();

        return view('cdr.index', ['cdry' => $cdry]);
    }
}
