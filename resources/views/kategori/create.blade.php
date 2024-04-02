@extends('layouts.app')

{{-- Customize layout sections --}} 

@section('subtitle', 'Kategori') 
@section('content_header_title', 'Kategori') 
@section('content_header_subtitle', 'Create') 

{{-- Content body: main page content --}} 
@section('content')
    <div class="container">
        {{-- @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as  $error)
                    <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
        @endif --}}
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Buat kategori baru</h3> 
        </div>

        <form method="post" action="../kategori">
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input class="form-control @error('kategori_kode') is-invalid @enderror" 
                        type="text" id="kodeKategori" name="kategori_kode" 
                        placeholder="untuk makanan, contoh : MKN"> 
                </div>
                    @error('kategori_kode')  
                        <div class="alert alert-danger">{{ $message }}</div>    
                    @enderror
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input class="form-control @error('kategori_nama') is-invalid @enderror"
                        type="text" id="namaKategori" name="kategori_nama" placeholder="nama kategori, contoh : Makanan"> 
                </div>
                    @error('kategori_nama')  
                        <div class="alert alert-danger">{{ $message }}</div>    
                    @enderror
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
{{-- Custom scripts --}}
