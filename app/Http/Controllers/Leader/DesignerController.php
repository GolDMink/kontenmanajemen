<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DesignerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')->where('role',2)->get();

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" onclick="editDesigner(' . $data->id . ')" class="edit btn btn-info btn-sm"><i class="far fa-edit"></i></a>';
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
        $input = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'role' => '2',
        ];
        DB::table('Users')->insert($input);
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
        return response()->json(['designer' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = DB::table('users')->where('id', $id)->update($request->all());

        return response()->json(['designer' => $data]);
    }

    public function hapus($id)
    {
        $data = DB::table('users')->where('id', $id)->delete();
        Alert::success('Berhasil Hapus', 'Data Berhasil dihapus!');
        return redirect()->back();
    }
}
