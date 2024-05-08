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
        $barang = BarangModel::create($request->all());
        return  response()->json([
            "message" => "Successfully created barang!",
            "data" => $barang
        ],201);
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
