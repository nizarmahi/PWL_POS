<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserModel::all();
    }

    public function store(Request $request)
    {
        $user = UserModel::create($request->all());
        return  response()->json([
            "message" => "Successfully created user!",
            "data" => $user
        ],201);
    }

    public function show($id)
    {
       $user = UserModel::find($id);
       if (is_null($user)) {
           return response()->json(['message' => 'No data found for the provided id'],  404);
       }else{
           return response()->json(['data'=>$user]);
        // return UserModel::find($id);
       }
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);
        $user->update($request->all());

        return response()->json([
           'message' => 'Successfully updated user!',
           'data' =>  $user
        ]);
    }

    public function destroy($id){
        try {
            $user = UserModel::findOrFail($id);
            $user -> delete();

          return response()->json([
              "message"=>"Record deleted successfully!"
          ]);
       } catch (\Exception $e) {
           return response()->json(['message'=> 'Failed to delete record'],400);
       }
    }
}
