<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        // // tambah data user dengan Eloquent Model
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_3', 
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'), 
        // ];

        // UserModel::insert($data); // tambahkan data ke tabel m_user
        
        // coba akses model UserModel
        // $user = UserModel::where('level_id', 1);

        $user = UserModel::findOr(20,['username','nama'], function(){
            abort(404);
        });
        return view('user', ['data' => $user]); 
    }   
}
