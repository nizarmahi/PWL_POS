<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        // Validasi data yang diinput oleh user
        $request->validate([
            'kategori_id' => 'required',
            'barang_kode' => 'required',
            'barang_nama' => 'required|min:5|max:20',
            'harga_beli'  => 'required|numeric',
            'harga_jual'  => 'required|numeric',
            'image'       => 'required|image|mimes:jpeg,png,jpg,giv,svg|max:2048',
        ]);

        // Buat objek baru dari model Barang dan simpan data ke database

        $barang = BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli'  => $request->harga_beli,
            'harga_jual'  => $request->harga_jual,
            'image'       => $request->image->hashName(),
        ]);

        // Kembalikan respons JSON jika pengguna berhasil dibuat
        if ($barang) {
            return response()->json([
                'success' => true,
                'message' => 'Barang berhasil ditambahkan',
                'data' => $barang,
            ], 201);
        }

        // Kembalikan respons JSON jika proses pembuatan pengguna gagal
        return response()->json([
            'success' => false,
            'message' => 'Gagal menambah barang',
        ], 409);
    }

    public function show($id)
    {
       $barang = BarangModel::find($id);
       if (is_null($barang)) {
           return response()->json(['message' => 'No data found for the provided id'],  404);
       }else{
           return response()->json(['data'=>$barang]);
        // return BarangModel::find($id);
       }
    }

    public function update(Request $request, $id)
    {
        $barang = BarangModel::findOrFail($id);
        $barang->update($request->all());

        return response()->json([
           'message' => 'Successfully updated barang!',
           'data' =>  $barang
        ]);
    }

    public function destroy($id){
        try {
            $barang = BarangModel::findOrFail($id);
            $barang -> delete();

          return response()->json([
              "message"=>"Record deleted successfully!"
          ]);
       } catch (\Exception $e) {
           return response()->json(['message'=> 'Failed to delete record'],400);
       }
    }


}
