@extends('layouts.app')
{{-- Customize layout sections --}} 
@section('subtitle', 'Kategori') 
@section('content_header_title', 'Kategori') 
@section('content_header_subtitle', 'Update') 

{{-- Content body: main page content --}} 
@section('content')
<div class="container">
    <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Update kategori</h3> 
    </div>

    <form method="post" action="../update_save/{{$data->kategori_id}}">
        
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="card-body">
            <div class="form-group">
                <label for="kodeKategori">Kode Kategori</label>
                <input type="text" class="form-control" id="kodeKategori" name="kategori_kode" value="{{$data->kategori_kode}}"></div>
            <div class="form-group">
                <label for="namaKategori">Nama Kategori</label>
                <input type="text" class="form-control" id="namaKategori" name="kategori_nama" value="{{$data->kategori_nama}}"></div>
        </div>
        
        <div class="card-footer">
            <a href=".." class="btn btn-secondary">Kembali</a>
            <button type="reset" class="btn btn-warning">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    </div>
</div>
@endsection