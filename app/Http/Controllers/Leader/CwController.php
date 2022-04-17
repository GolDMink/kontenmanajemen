<?php

namespace App\Http\Controllers\Leader;

use App\ContentWritter;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CwController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('contentwriter as c')
                    ->join('designer as d','d.di','c.')
                    ->where('role', 1)->get();

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" onclick="editCw(' . $data->id . ')" class="edit btn btn-info btn-sm"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= ' <a href="#" onclick="hapusCw(' . $data->id . ')" class="delete btn btn-danger btn-sm" id="btnHapus" data-toggle="modal" data-id="' . $data->id . '"><i class="far fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('leader.Cw.index');
    }
    public function simpan(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = '2';
        $user->save();

        $cw = new ContentWritter();
        $cw->user_id = $user->id;
        $cw->id_lead = Auth::user()->id;
        $cw->nama_cowrit = $request->nama;
        $cw->alamat = $request->alamat;
        $cw->tgl_lahir = $request->tgl;
        $cw->telp = $request->telp;
        $cw->email = $request->email;
        $cw->save();

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }

    public function edit($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        return response()->json(['Cw' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = DB::table('users')->where('id', $id)->update($request->all());

        return response()->json(['Cw' => $data]);
    }

    public function hapus($id)
    {
        $data = DB::table('users')->where('id', $id)->delete();
        Alert::success('Berhasil Hapus', 'Data Berhasil dihapus!');
        return redirect()->back();
    }
}
