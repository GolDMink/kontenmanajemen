<?php

namespace App\Http\Controllers;

use App\Designer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DesignerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users as u')
            ->select('u.id','u.username','u.email','c.telp','c.alamat','c.id_user as id_user')
            ->join('designer as c', 'u.id', 'c.id_user')
            ->get();


            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" onclick="editDesigner(' . $data->id_user . ')" class="edit btn btn-info btn-sm"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= ' <a href="#" onclick="hapusDesigner(' . $data->id . ')" class="delete btn btn-danger btn-sm" id="btnHapus" data-toggle="modal" data-id="' . $data->id . '"><i class="far fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('leader.designer.index');
    }
    public function simpan(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 2;
        $user->save();

        $user1 = new Designer();
        $user1->id_user = $user->id;
        $user1->nama = $request->username;
        $user1->telp = $request->telp;
        $user1->alamat = $request->alamat;
        $user1->save();

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }

    public function edit($id)
    {
        $data = DB::table('users as u')->where('u.id', $id)
            ->select('u.id','u.username','u.email','c.telp','c.alamat','c.id_user as id_user')
            ->join('designer as c', 'c.id_user', 'u.id')
            ->first();
        return response()->json(['designer' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = DB::table('users as u')->join('designer as d', 'd.id_user', 'u.id')->where('id_user', $id)->update([
            'username' => $request->username,
            'u.email' => $request->email,
            'd.telp' => $request->telp,
            'd.alamat' => $request->alamat,
        ]);


        return response()->json(['designer' => $data]);
    }

    public function hapus($id)
    {
        DB::table('users')->where('id', $id)->delete();
        DB::table('designer')->where('id_user',$id)->delete();
        Alert::success('Berhasil Hapus', 'Data Berhasil dihapus!');
        return redirect()->back();
    }
}
