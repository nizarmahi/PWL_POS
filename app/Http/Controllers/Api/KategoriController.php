<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return KategoriModel::all();
    }

    public function store(Request $request)
    {
        $kategori = KategoriModel::create($request->all());
        return  response()->json([
            "message" => "Successfully created kategori!",
            "data" => $kategori
        ],201);
    }

    public function show($id)
    {
       $kategori = KategoriModel::find($id);
       if (is_null($kategori)) {
           return response()->json(['message' => 'No data found for the provided id'],  404);
       }else{
           return response()->json(['data'=>$kategori]);
        // return KategoriModel::find($id);
       }
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->update($request->all());

        return response()->json([
           'message' => 'Successfully updated kategori!',
           'data' =>  $kategori
        ]);
    }

    public function destroy($id){
        try {
            $kategori = KategoriModel::findOrFail($id);
            $kategori -> delete();

          return response()->json([
              "message"=>"Record deleted successfully!"
          ]);
       } catch (\Exception $e) {
           return response()->json(['message'=> 'Failed to delete record'],400);
       }
    }
}
