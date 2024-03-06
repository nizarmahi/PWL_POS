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

        // $user = UserModel::findOr(20,['username','nama'], function(){
        //     abort(404);
        // });

        // $user = UserModel::where('username', 'manager9')->firstOrFail();

        // $user = UserModel::where('level_id', 2)->count();

        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]
        // );
        
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]
        // );
        // $user->save();

        // $user = UserModel::create(
        //     [
        //         'username' => 'manager55',
        //         'nama' => 'Manager Lima Lima',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]
        // );
        // $user->username = 'manager56';
        // $user->isDirty(); // true
        // $user->isDirty ('username'); // true
        // $user->isDirty ('nama'); // false
        // $user->isDirty (['nama', 'username']); // true

        // $user->isClean(); // false
        // $user->isClean ('username'); // false
        // $user->isClean ('nama'); // true
        // $user->isClean (['nama', 'username']); // false

        // $user->save();

        // $user->isDirty(); // false  
        // $user->isClean(); // true 
        // dd ($user->isDirty());

        $user = UserModel::create(
            [
                'username' => 'manager11',
                'nama' => 'Manager11',
                'password' => Hash::make('12345'),
                'level_id' => 2       
            ]
        );
        $user->username = 'manager12';

        $user->save();

        $user->wasChanged(); // true
        $user->wasChanged('username'); // true
        $user->wasChanged (['username', 'level_id']); // true 
        $user->wasChanged ('nama'); // false
        dd($user->wasChanged (['nama', 'username'])); // true
    }   
}
