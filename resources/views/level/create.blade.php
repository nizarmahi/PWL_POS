@extends('layouts.app')

{{-- Customize layout sections --}} 

@section('subtitle', 'Level') 
@section('content_header_title', 'Level') 
@section('content_header_subtitle', 'Create') 

{{-- Content body: main page content --}} 
@section('content')
    <div class="container">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as  $error)
                    <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Buat Level Baru</h3> 
        </div>

        <form method="post" action="{{ route('level.store') }}">
            <div class="card-body">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Level Kode:</strong>
                        <input type="text" class="form-control @error('level_kode') is-invalid @enderror" 
                        id="level_kode" name="level_kode" placeholder="Masukkan level kode">
                        @error('level_kode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>                    
                    <div class="form-group">
                        <strong>Level Nama:</strong>
                        <input type="text" class="form-control @error('level_nama') is-invalid @enderror" 
                        id="level_nama" name="level_nama" placeholder="Masukkan level nama">
                        @error('level_nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="../level" class="btn btn-secondary">Kembali</a>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        </div>
    </div>
@endsection
{{-- Custom scripts --}}


{{-- @extends('m_user/template')
@section('content')
<div class="row mt-5 mb-5">
<div class="col-lg-12 margin-tb">
<div class="float-left">
<h2>Membuat Daftar User</h2>
</div>
<div class="float-right">
<a class="btn btn-secondary" href="{{ route('m_user.index') }}"> Kembali</a>
</div>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
<strong>Ops</strong> Input gagal<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('m_user.store') }}" method="POST">
@csrf


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Username:</strong>
<input type="text" name="username" class="form-control" placeholder="Masukkan username"></input>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>nama:</strong>
    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama"></input>
    </div>
    </div>

    
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Password:</strong>
    <input type="password" name="password" class="form-control" placeholder="Masukkan password"></input>
    </div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection --}}
