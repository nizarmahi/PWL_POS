<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function create():View{
        return view('kategori.create');
    }

    public function store(StorePostRequest $request) :RedirectResponse{

        $validated = $request->validated();

        $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);

        KategoriModel::create($request->all());
        
        return redirect('/kategori');
    }
    public  function index(KategoriDataTable $dataTable) {
        return $dataTable->render('kategori.index');
    }

    public function update($id){
        $kategori = KategoriModel::find($id);
        return view('kategori.update',['data' => $kategori]);
    }

    public function update_save($id, Request $request){
        $kategori= KategoriModel::find($id);
        
        $kategori->kategori_kode = $request->kategori_kode;
        $kategori->kategori_nama = $request->kategori_nama;

        $kategori->save();
    
        return redirect('/kategori');
    }

    public function destroy($id){
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}

