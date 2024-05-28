<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        $breadcrumb = (object)[
            'title' => 'File Upload',
            'list' => ['Home', 'Upload'],
        ];
        $page = (object)[
            'title' => 'File Upload',
        ];
        $activeMenu = 'file-upload';
        return view('file-upload', ['breadcrumb'=>$breadcrumb, 'page'=>$page,'activeMenu'=>$activeMenu]);
    }

    public function prosesFileUpload(Request $request)
    {
        $breadcrumb = (object)[
            'title' => 'File Upload',
            'list' => ['Home', 'Upload'],
        ];
        $page = (object)[
            'title' => 'File Upload',
        ];
        $activeMenu = 'file-upload';

        $request->validate([
            'name' => 'required|min:3',
            'file' => 'required|file|image|max:50000',
        ]);

        $extFile = $request->file->getClientOriginalExtension();
        $namaFile = $request->name.".".$extFile;

        $path = $request->file->move('gambar', $namaFile);
        $path = str_replace("\\","//",$path);

        $pathBaru = asset('gambar/'.$namaFile);

        $file = (object)[
            'name' => $namaFile,
            'path' => $pathBaru,
        ];

        return view('file-uploaded', ['breadcrumb'=>$breadcrumb, 'page'=>$page,'activeMenu'=>$activeMenu,'file'=>$file]);
    }
}
