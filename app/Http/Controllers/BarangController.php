<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Barang',
            'list' => ['Home', 'Barang'],
        ];
        $page = (object)[
            'title' => 'Daftar Barang',
        ];
        $activeMenu = 'barang';
        $kategori = KategoriModel::all();

        return view('barang.index', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'kategori'=>$kategori,'activeMenu'=>$activeMenu]);
    }


    public function list(Request $request)
    {
        $BarangList = BarangModel::select('barang_id', 'kategori_id', 'barang_kode', 'barang_nama','harga_beli','harga_jual')
                ->with('kategori');
        //filter data Barang berdasarkan kategori_id
        if($request->kategori_id)
        {
            $BarangList->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($BarangList)
                ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
                ->addColumn('aksi', function ($barang) { // menambahkan kolom aksi
                    $btn = '<a href="'.url('/barang/' . $barang->barang_id).'" class="btn btn-info btn-sm">Detail</a> ';
                    $btn .= '<a href="'.url('/barang/' . $barang->barang_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                    $btn .= '<form class="d-inline-block" method="POST" action="'. url('/barang/'.$barang->barang_id).'">'
                        . csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
                })
                ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
                ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah'],
        ];
        $page =  (object)[
            'title' => 'Tambah Barang'
        ];
        $kategori = KategoriModel::all();
        $activeMenu = 'barang';
        return view('barang.create',['breadcrumb'=>$breadcrumb, 'page'=>$page, 'kategori'=>$kategori, 'activeMenu'=>$activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'kategori_id' => 'required',
            'barang_kode' => 'required',
            'barang_nama' => 'required|min:5|max:20',
            'harga_beli'  => 'required|numeric',
            'harga_jual'  => 'required|numeric',
        ]);

        BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
    }

    public function show(string $id){
        $barang = BarangModel::with('kategori')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Barang',
            'list' => ['Home', 'Barang', 'Detail'],
        ];
        $page =  (object)['title'=> "Detail Barang"];
        $show = true;
        $activeMenu = 'barang';

        return view('barang.show', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'barang'=>$barang,'activeMenu'=>$activeMenu]);
    }

    public function edit(string $id){
        $barang = BarangModel::find($id);
        $kategori = KategoriModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit Data Barang',
            'list' => ['Home','Barang', 'Ubah']
        ];
        $page = (object)['title' =>  'Form Ubah Data Barang'];

        $activeMenu = 'barang';

        return view('barang.edit', [
            'breadcrumb'=>$breadcrumb,
            'page'=>$page,
            'barang'=>$barang,
            'kategori'=>$kategori,
            'activeMenu'=>$activeMenu
        ]);
    }

    public function  update(Request $request, string $id){
        //validasi data yang dikirim oleh user
        $request->validate([
            'barang_kode' => 'required',
            'kategori_id' => 'required',
            'barang_nama' => 'required|min:5|max:20',
            'harga_jual'  => 'required|numeric',
            'harga_beli'  => 'required|numeric',
        ]);

        BarangModel::find($id)->update([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli'  => $request->harga_beli,
            'harga_jual'  => $request->harga_jual,
        ]);

        return redirect('/barang')->with('info', 'Data barang berhasil diubah');
    }

    public function destroy(string $id){
        $check = BarangModel::find($id);
        if (!$check) {
            return response()->json(['status'=>404,'message'=>'data tidak ditemukan'],404);
        }
        try{
            BarangModel::destroy($id);
            // return response()->json(['status'=>200,'message'=>'data telah di hapus']);
            return redirect('/barang')->with('success','Data barang berhasil dihapus');

        }catch(\Exception $e){
            // return response()->json(['status'=>500,'message'=>'Terjadi Kesalahan !']);
            return redirect('/barang')->with('error','Terjadi kesalahan saat menghapus data!');
        }
    }
}
