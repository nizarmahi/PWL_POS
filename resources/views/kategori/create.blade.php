@extends('layouts.app')

{{-- Customize layout sections --}} 

@section('subtitle', 'Kategori') 
@section('content_header_title', 'Kategori') 
@section('content_header_subtitle', 'Create') 

{{-- Content body: main page content --}} 
@section('content')
    <div class="container">
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Buat kategori baru</h3> 
        </div>

        <form method="post" action="../kategori">
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" class="form-control" id="kodeKategori" name="kategori_kode" placeholder="untuk makanan, contoh : MKN"> </div>
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="kategori_nama" placeholder="nama kategori, contoh : Makanan"> </div>
            </div>
            
            <div class="card-footer">
                <a href="../kategori" class="btn btn-secondary">Kembali</a>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        </div>
    </div>
@endsection