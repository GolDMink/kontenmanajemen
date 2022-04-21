<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalclient = DB::table('clients')->count();
        $totaldesigner = DB::table('designer')->count();
        $totalcontentwriter = DB::table('cw')->count();
        return view('leader.dashboard',compact('totalclient','totaldesigner','totalcontentwriter'));
    }
}
