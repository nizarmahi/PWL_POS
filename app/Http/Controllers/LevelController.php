<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index(){
        // DB::insert('insert into m_level(level_kode, level_nama, created_at) values (?, ?, ?)', ['CUS', 'Pelanggan', now()]); 
        // return 'Insert data baru berhasil';

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate:' . $row .'baris';

        // $row = DB::delete('delete from m_level where level_kode=?', ['CUS']); 
        // return 'Delete data berhasil. Jumlah data yang dihapus:' . $row. 'baris';

        $data = DB::select('select * from m_level');
        return view('level', ['data' => $data]);
    }

    public function store(LevelRequest $request){
        $validated = $request->validated();

        $validated = $request->safe()->only(['level_kode','level_nama']);
        $validated = $request->safe()->except(['level_kode','level_nama']);

        LevelModel::create($request->all());

        return  redirect('/level')->with('status', 'Data Berhasil Ditambahkan!');
    }

    public function show(string $id, LevelModel $data)
    {
        $data = LevelModel::findOrFail($id);
        return view('level.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = LevelModel::find($id);
        return view('level.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
            ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        LevelModel::find($id)->update($request->all());
        
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('level.index')
        ->with('success', 'Data Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= LevelModel::findOrFail($id)->delete();
        return \redirect()->route('level.index')

        -> with('success', 'data Berhasil Dihapus');
    }
}
