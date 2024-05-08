<?php

namespace App\Http\Controllers\Api;

use App\Models\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,giv,svg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Buat pengguna baru
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'image' => $request->image->hashName(),
        ]);

        // Kembalikan respons JSON jika pengguna berhasil dibuat
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Pengguna berhasil dibuat',
                'data' => $user,
            ], 201);
        }

        // Kembalikan respons JSON jika proses pembuatan pengguna gagal
        return response()->json([
            'success' => false,
            'message' => 'Gagal membuat pengguna',
        ], 409);
    }
}
