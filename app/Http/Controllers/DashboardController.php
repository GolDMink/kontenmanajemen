<?php

namespace App\Http\Controllers;

use App\Designer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function dataPost()
    {
        $data = DB::table('agenda_post as a')
            ->join('clients as c', 'c.id', 'a.id_client')
            ->join('designer as d', 'd.id', 'a.id_designer')
            ->select('a.*', 'c.nama_client as client')
            ->get();

        return datatables()->of($data)

            ->addColumn('designer', function ($data) {

                $arr = explode(",", $data->id_designer);
                $category = Designer::select('nama')->whereIn('id', $arr)->pluck('nama')->toArray();
                return $category;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function dataContent()
    {
        $data = DB::table('agenda_post as a')
            ->join('clients as c', 'c.id', 'a.id_client')
            ->join('designer as d', 'd.id', 'a.id_designer')
            ->select('a.*', 'c.nama_client as client')
            ->get();

        return datatables()->of($data)

            ->addColumn('designer', function ($data) {

                $arr = explode(",", $data->id_designer);
                $category = Designer::select('nama')->whereIn('id', $arr)->pluck('nama')->toArray();
                return $category;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);

    }
    public function leaderIndex()
    {

        $totalclient = DB::table('clients')->count();
        $totaldesigner = DB::table('designer')->count();
        $totalcontentwriter = DB::table('contentwriter')->count();
        return view('leader.dashboard', compact('totalclient', 'totaldesigner', 'totalcontentwriter'));
    }
    public function indexcw()
    {
        return view('cw.dashboard');
    }
}
