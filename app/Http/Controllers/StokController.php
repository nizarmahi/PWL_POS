<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Stok Barang',
            'list' => ['Home', 'Stok'],
            'link' => '/stok/index'
        ];
        $page = (object)['title' => 'Daftar Stok Barang'];
        $activeMenu = 'stok';
        $barang = BarangModel::all();
        $user = UserModel::all();

        return view('stok.index', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'activeMenu'=>$activeMenu, 'barang'=>$barang, 'user'=>$user]);
    }

    public function list(Request $request){
        $stokList = StokModel::select( 'stok_id', 'barang_id', 'user_id', 'stok_jumlah', 'stok_tanggal')->with('barang')->with('user');
        if($request->user_id !=''){
            $stokList->where('user_id', $request->user_id);
        } elseif($request->barang_id !=''){
            $stokList->where('barang_id', $request->barang_id);
        }elseif($request->user_id and $request->barang_id){
            $stokList->where('user_id', $request->user_id and 'barang_id', $request->barang_id);
        }
        return DataTables::of($stokList)
                ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
                ->addColumn('aksi', function ($stok) { // menambahkan kolom aksi
                    $btn = '<a href="'.url('/stok/' . $stok->stok_id).'" class="btn btn-info btn-sm">Detail</a> ';
                    $btn .= '<a href="'.url('/stok/' . $stok->stok_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                    $btn .= '<form class="d-inline-block" method="POST" action="'. url('/stok/'.$stok->stok_id).'">'
                        . csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
                })
                ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
                ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Stok Barang',
            'list' => ['Home', 'Stok', 'Tambah'],
            'link' => '/stok/create'
        ];
        $page = (object)['title' => 'Daftar Stok Barang'];
        $activeMenu = 'stok';
        $barang = BarangModel::all();
        $user = UserModel::all();

        return view('stok.create', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'activeMenu'=>$activeMenu, 'barang'=>$barang, 'user'=>$user]);
    }

    public function store(Request $request){
        $request->validate([
            'barang_id' => 'required',
            'user_id' => 'required',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer',
        ]);

        StokModel::create($request->all());

        return redirect('/stok')->with('success', 'Data Barang berhasil disimpan');
    }

    public function edit(string $id){
        $breadcrumb = (object)[
            'title' => 'Ubah Stok Barang',
            'list' => ['Home', 'Stok', 'Ubah'],
            'link' => '/stok/create'
        ];
        $page = (object)['title' => 'Daftar Stok Barang'];
        $activeMenu = 'stok';
        $barang = BarangModel::all();
        $user = UserModel::all();
        $stok = StokModel::find($id);
        
        if(!$stok){
            abort(404, "Halaman tidak ditemukan");
        }

        return view('stok.edit', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'activeMenu'=>$activeMenu, 'barang'=>$barang, 'user'=>$user, 'stok'=>$stok]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'barang_id' => 'required',
            'user_id' => 'required',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer',
        ]);

        StokModel::find($id)->update($request->all());

        return redirect('/stok')->with('success', 'Data Barang berhasil disimpan');
    }

    public function show(string $id){
        $breadcrumb = (object)[
            'title' => 'Detail Stok Barang',
            'list' => ['Home', 'Stok', 'Detail'],
            'link' => '/stok/show'
        ];
        $page = (object)['title' => 'Daftar Stok Barang'];
        $activeMenu = 'stok';
        $stok = StokModel::with('barang')->with('user')->find($id);

        return view('stok.show', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'activeMenu'=>$activeMenu, 'stok'=>$stok]);
    }

    public function destroy(string $id){
        $check = StokModel::find($id);
        if (!$check) {
            return response()->json(['status'=>404,'message'=>'data tidak ditemukan'],404);
        }
        try{
            StokModel::destroy($id);
            // return response()->json(['status'=>200,'message'=>'data telah di hapus']);
            return redirect('/stok')->with('success','Data stok berhasil dihapus');
            
        }catch(\Exception $e){
            // return response()->json(['status'=>500,'message'=>'Terjadi Kesalahan !']);
            return redirect('/stok')->with('error','Terjadi kesalahan saat menghapus data!');
        }
    }
}
