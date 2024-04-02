<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\m_user;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index(){
    //     // // tambah data user dengan Eloquent Model
    //     // $data = [
    //     //     'level_id' => 2,
    //     //     'username' => 'manager_3', 
    //     //     'nama' => 'Manager 3',
    //     //     'password' => Hash::make('12345'), 
    //     // ];

    //     // m_user::insert($data); // tambahkan data ke tabel m_user
        
    //     // coba akses model m_user
    //     // $user = m_user::where('level_id', 1);

    //     // $user = m_user::findOr(20,['username','nama'], function(){
    //     //     abort(404);
    //     // });

    //     // $user = m_user::where('username', 'manager9')->firstOrFail();

    //     // $user = m_user::where('level_id', 2)->count();

    //     // $user = m_user::firstOrCreate(
    //     //     [
    //     //         'username' => 'manager22',
    //     //         'nama' => 'Manager Dua Dua',
    //     //         'password' => Hash::make('12345'),
    //     //         'level_id' => 2
    //     //     ]
    //     // );
        
    //     // $user = m_user::firstOrNew(
    //     //     [
    //     //         'username' => 'manager33',
    //     //         'nama' => 'Manager Tiga Tiga',
    //     //         'password' => Hash::make('12345'),
    //     //         'level_id' => 2
    //     //     ]
    //     // );
    //     // $user->save();

    //     // $user = m_user::create(
    //     //     [
    //     //         'username' => 'manager55',
    //     //         'nama' => 'Manager Lima Lima',
    //     //         'password' => Hash::make('12345'),
    //     //         'level_id' => 2
    //     //     ]
    //     // );
    //     // $user->username = 'manager56';
    //     // $user->isDirty(); // true
    //     // $user->isDirty ('username'); // true
    //     // $user->isDirty ('nama'); // false
    //     // $user->isDirty (['nama', 'username']); // true

    //     // $user->isClean(); // false
    //     // $user->isClean ('username'); // false
    //     // $user->isClean ('nama'); // true
    //     // $user->isClean (['nama', 'username']); // false

    //     // $user->save();

    //     // $user->isDirty(); // false  
    //     // $user->isClean(); // true 
    //     // dd ($user->isDirty());

    //     // $user = m_user::create(
    //     //     [
    //     //         'username' => 'manager11',
    //     //         'nama' => 'Manager11',
    //     //         'password' => Hash::make('12345'),
    //     //         'level_id' => 2       
    //     //     ]
    //     // );
    //     // $user->username = 'manager12';

    //     // $user->save();

    //     // $user->wasChanged(); // true
    //     // $user->wasChanged('username'); // true
    //     // $user->wasChanged (['username', 'level_id']); // true 
    //     // $user->wasChanged ('nama'); // false
    //     // dd($user->wasChanged (['nama', 'username'])); // true

    //     $user = m_user::all();
    //     return view('user', ['data'=> $user]);
    // }
    public function index(){
        $user = m_user::with('level')->get();
        return view('user', ['data'=> $user]);
    }

    public function tambah(){
        return view('user_tambah');
    }  
    
    public function tambah_simpan(UserRequest $request){
        $validated = $request->validated();

        $validated = $request->safe()->only('username', 'nama', 'password');
        $validated = $request->safe()->except('username', 'nama', 'password');

        m_user::create($request->all());
        return redirect('/user')->with('status','Data Berhasil Ditambahkan!');
        // if(!$validated) {
        //     return redirect()->back()
        //         ->withErrors($request->validate())
        //         ->withInput();
        // }
        // $pass = Hash::make($request->input('password'));
        // $user = new m_user([
        //     'username' => $request->input('username'),
        //     'nama' => $request->input('nama'),
        //     'password' => $pass,
        //     'level_id' => $request->input('level')
        // ]);
        // $user->save();
        // return redirect('/user')->with('sukses','Data Berhasil Di Tambahkan!');
    }

    public function ubah($id){
        $user = m_user::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request){
        $user = m_user::find($id);
        
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id){
        $user = m_user::find($id);
        $user->delete();

        return redirect('/user');
    }
}
