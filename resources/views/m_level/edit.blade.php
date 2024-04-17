@extends('layouts.app')
{{-- Customize layout sections --}} 
@section('subtitle', 'Level') 
@section('content_header_title', 'Level') 
@section('content_header_subtitle', 'Edit') 

{{-- Content body: main page content --}} 
@section('content')
<div class="container">
    <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit level</h3> 
    </div>

    <form action="{{ route('level.update', $leveli->level_id) }}" method="POST">
        
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>level_id:</strong>
                    <input type="text" name="levelid" value="{{ $leveli->level_id }}" class="form-control" placeholder="Masukkan level id">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Level_id:</strong>
                    <input type="text" name="levelid" value="{{ $leveli->level_id }}" class="form-control" placeholder="Masukkan level">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>levelname:</strong>
                    <input type="text" value= "{{ $leveli->levelname }}" class="form-control" name="levelname" placeholder="Masukkan Nomor levelname"">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nama:</strong>
                    <input type="text" value= "{{ $leveli->nama }}"name="nama" class="form-control" placeholder="Masukkan nama"></input>
                </div>
            </div>
                   
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" value= "{{ $leveli->password }}"name="password" class="form-control" placeholder="Masukkan password"></input>
                </div>
            </div>
        </div>
        
        <div class="card-footer">
            <a href=".." class="btn btn-secondary">Kembali</a>
            <button type="reset" class="btn btn-warning">Reset</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
</div>
@endsection