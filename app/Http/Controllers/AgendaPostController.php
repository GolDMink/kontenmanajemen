<?php

namespace App\Http\Controllers;

use App\AgendaPost;
use App\Designer;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class AgendaPostController extends Controller
{
    public function indexContent(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('agenda_post as a')
                ->join('contentwriter as cw', 'cw.id_user', 'a.id_conwrit')
                ->join('clients as c', 'c.id', 'a.id_client')
                ->join('designer as d', 'd.id', 'a.id_designer')
                ->select('a.*', 'c.nama_client as client')
                ->get();

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" onclick="editKonten(' . $data->id . ')" class="edit btn btn-info btn-sm"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= ' <a href="#" onclick="hapusKonten(' . $data->id . ')" class="delete btn btn-danger btn-sm" id="btnHapus" data-toggle="modal" data-id="' . $data->id . '"><i class="far fa-trash-alt"></i></a>';
                    return $button;
                })
                ->addColumn('jadwal', function ($data) {
                    $button = '<a href="#" onclick="editKonten(' . $data->id . ')" class="edit btn btn-info btn-sm"><i class="far fa-edit"></i></a>';
                    return $button;
                })
                ->addColumn('designer', function ($data) {

                    $arr = explode(",", $data->id_designer);
                    $category = Designer::select('nama')->whereIn('id', $arr)->pluck('nama')->toArray();
                    return $category;
                })
                ->rawColumns(['action', 'jadwal'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('Cw.indexkonten');
    }
    public function simpanContent(Request $request)
    {
        $input = [
            'id_conwrit' => Auth::user()->id,
            'id_client' => $request->cl,
            'id_designer' => implode(',', $request->designer),
            'nama_projek' => $request->nama,
            'jadwal_dateline' => $request->jdwl,
            'status' => 0,
        ];
        DB::table('agenda_post')->insert($input);
        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }

    public function editContent($id)
    {
        $data = DB::table('agenda_post as a')
            ->join('clients as c', 'c.id', 'a.id_client')
            ->select('a.*', 'c.nama_client')
            ->where('a.id', $id)
            ->first();
        return response()->json(['kntn' => $data]);
    }

    public function updateContent(Request $request, $id)
    {
        $data = DB::table('agenda_post')->where('id', $id)->update([
            'id_client' => $request->namaklien,
            'id_designer' =>  implode(",", $request->designer),
            'nama_projek' => $request->namaprojek,
            'jadwal_post' => $request->jadwal,
        ]);

        return response()->json(['Cw' => $data]);
    }

    public function hapusContent($id)
    {
        $data = DB::table('agenda_post')->where('id', $id)->delete();
        Alert::success('Berhasil Hapus', 'Data Berhasil dihapus!');
        return redirect()->back();
    }

    public function showKonten(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('agenda_post as a')
                ->join('clients as c', 'c.id', 'a.id_client')
                ->join('designer as d', 'd.id', 'a.id_designer')
                ->select('a.*', 'c.nama_client as client')
                ->where('d.id_user', Auth::user()->id)
                ->get();

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    if ($data->file) {
                        $checkbox = '<input type="checkbox" name="check" onclick="konfirmasiDesign(' . $data->id . ')"></input>';
                        if ($data->status == 1) {
                            $checkbox = '<input type="checkbox" checked ></input>';
                        } else {
                            $checkbox = '<input type="checkbox" name="check" onclick="konfirmasiDesign(' . $data->id . ')"></input>';
                        }
                    } else {
                        $checkbox = '-';
                    }
                    return $checkbox;
                })
                ->addColumn('file', function ($data) {
                    $input = $data->file;
                    if ($input) {
                        $file = '<a id="lihat" onclick="lihatKonten(' . $data->id . ')" class="btn btn-success"><i class="fa fa-file" aria-hidden="true"></i> Lihat </a>';
                    } else {
                        $file = '<button type="button" class="btn btn-warning text-white upload" data-id="' . $data->id . '" data-toggle="modal" data-target="#upload">
                        Upload Design
                      </button>';
                    }
                    return $file;
                })
                ->addColumn('designer', function ($data) {
                    $arr = explode(",", $data->id_designer);
                    $category = Designer::select('nama')->whereIn('id', $arr)->pluck('nama')->toArray();
                    return $category;
                })
                ->rawColumns(['action', 'file'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('designer.index');
    }

    public function konfirmasi($id)
    {
        $data = DB::table('agenda_post')->where('id', $id)->update(['status' => 1]);
        Alert::success('Berhasil', 'Data Berhasil dikonfirmasi');
        return redirect()->route('designer.konten');
    }

    public function uploaddesign(Request $request, $id)
    {
        $file = $request->file('file');
        $name_foto = \Illuminate\Support\Str::random(32);
        $tujuan_upload = 'design'; //nama folder
        $file->move($tujuan_upload, $name_foto . '.' . $file->getClientOriginalExtension());

        AgendaPost::where('id', $id)->update(['file' => "/design/" . $name_foto . '.' . $file->getClientOriginalExtension()]);
        DB::table('log_activity')->insert([
            'post_id' => $id,
            'user_id' => Auth::user()->id,
            'kode_log' => 1,
        ]);
        return Response()->json([
            "success" => true,
            "file" => ''
        ]);
    }

    public function hapusDesign($id)
    {
        DB::table('agenda_post')->where('id', $id)->update(['status' => 0, 'file' => null]);
        $data = DB::table('agenda_post')->where('id', $id)->first();
        if (File::exists(public_path($data->file))) {
            File::delete(public_path($data->file));
        }
        Alert::success('Berhasil Hapus', 'Data Design Berhasil dihapus!');
        return redirect()->back();
    }

    public function designerIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('agenda_post as a')
                ->join('clients as c', 'c.id', 'a.id_client')
                ->join('designer as d', 'd.id', 'a.id_designer')
                ->select('a.*', 'c.nama_client as client')
                ->get();

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" onclick="editKonten(' . $data->id . ')" class="edit btn btn-info btn-sm"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= ' <a href="#" onclick="hapusKonten(' . $data->id . ')" class="delete btn btn-danger btn-sm" id="btnHapus" data-toggle="modal" data-id="' . $data->id . '"><i class="far fa-trash-alt"></i></a>';
                    return $button;
                })
                ->addColumn('designer', function ($data) {

                    $arr = explode(",", $data->id_designer);
                    $category = Designer::select('nama')->whereIn('id', $arr)->pluck('nama')->toArray();
                    return $category;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('designer.agendapost');
    }

    public function getDesign($id)
    {
        $data = DB::table('agenda_post')->where('id', $id)->get();
        return $data;
    }
// ---------------------------------------------------------------------------
    public function indexAgenda(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('agenda_post as a')
                ->join('contentwriter as cw', 'cw.id_user', 'a.id_conwrit')
                ->join('clients as c', 'c.id', 'a.id_client')
                ->join('designer as d', 'd.id', 'a.id_designer')
                ->select('a.*', 'c.nama_client as client')
                ->get();

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" onclick="editAgenda(' . $data->id . ')" class="edit btn btn-info btn-sm"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= ' <a href="#" onclick="hapusAgenda(' . $data->id . ')" class="delete btn btn-danger btn-sm" id="btnHapus" data-toggle="modal" data-id="' . $data->id . '"><i class="far fa-trash-alt"></i></a>';
                    return $button;
                })
                ->addColumn('jadwal', function ($data) {
                    if($data->jadwal_post == NULL){
                        $button = '<a href="#" onclick="postAgenda(' . $data->id . ')" class="edit btn btn-info btn-sm"><i class="far fa-edit"></i>Atur Jadwal Post</a>';
                    }else{

                        $jdwl = $data->jadwal_post;
                        $button = \Carbon\Carbon::parse($jdwl)->translatedFormat('d F Y H:i');
                    }
                    return $button;
                })
                ->addColumn('designer', function ($data) {

                    $arr = explode(",", $data->id_designer);
                    $category = Designer::select('nama')->whereIn('id', $arr)->pluck('nama')->toArray();
                    return $category;
                })
                ->rawColumns(['action', 'jadwal'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('Cw.indexAgenda');
    }

    public function postAgenda(Request $request)
    {
        $data = DB::table('agenda_post')->where('id', $request->id)->update(['jadwal_post'=>$request->jadwalpost]);

        return response()->json($data);
    }

    public function getAgenda($id)
    {
        $data = DB::table('agenda_post')->where('id', $id)->first();
        $jadwal = Carbon::parse($data->jadwal_post)->format('Y-m-d\TH:i');
        return response()->json(['agenda' => $data,'jadwal'=>$jadwal]);
    }
    public function hapusAgenda($id){
        $data = DB::table('agenda_post')->where('id', $id)->update(['jadwal_post'=>NULL]);
        Alert::success('Berhasil Hapus', 'Data Jadwal Agenda Berhasil dihapus!');
        return redirect()->route('cw.agenda');
    }
}
