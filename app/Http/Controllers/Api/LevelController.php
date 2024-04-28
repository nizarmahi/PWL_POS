<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LevelModel;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    // public function index()
    // {
    //     return LevelModel::all();
    // }
    public function index()
    {
        $data = LevelModel::orderBy('level_id', 'asc')->get();
        return response()->json($data,  200);
    }

    public function store(Request $request)
    {
        $level = LevelModel::create($request->all());
        return  response()->json([
            "message" => "Successfully created level!",
            "data" => $level
        ],201);
    }

    public function show($id)
    {
       $level= LevelModel::find($id);
       if (is_null($level)) {
           return response()->json(['message' => 'No data found for the provided id'],  404);
       }else{
           return response()->json(['data'=>$level]);
        // return LevelModel::find($id);
       }
    }

    public function update(Request $request, $id)
    {
        $level = LevelModel::findOrFail($id);
        $level->update($request->all());

        return response()->json([
           'message' => 'Successfully updated level!',
           'data' =>  $level
        ]);
    }

    public function destroy($id){
        try {
            $level = LevelModel::findOrFail($id);
            $level -> delete();

          return response()->json([
              "message"=>"Record deleted successfully!"
          ]);
       } catch (\Exception $e) {
           return response()->json(['message'=> 'Failed to delete record'],400);
       }
    }
}
