@extends('layouts.app')

{{-- Customize layout sections --}} 

@section('subtitle', 'User') 
@section('content_header_title', 'User') 
@section('content_header_subtitle', 'Show')

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
        <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Show User : <strong>{{ $useri->nama }}</strong></h3> 
        </div>

        <form method="post" action="../kategori">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>User_id:</strong>
                            {{ $useri->user_id }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Level_id:</strong>
                            {{ $useri->level_id }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Username:</strong>
                            {{ $useri->username }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama:</strong>
                            {{ $useri->nama }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Password:</strong>
                            {{ $useri->password }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="../m_user" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
        </div>
    </div>
@endsection
{{-- Custom scripts --}}

{{-- 
@extends('m_user/template')
@section('content')
<div class="row mt-5 mb-5">
<div class="col-lg-12 margin-tb">
<div class="float-left">
<h2> Show User</h2>
</div>
<div class="float-right">
<a class="btn btn-secondary" href="{{ route('m_user.index') }}"> Kembali</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>User_id:</strong>
{{ $useri->user_id }}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Level_id:</strong>
{{ $useri->level_id }}
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Username:</strong>
{{ $useri->username }}
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Nama:</strong>
    {{ $useri->nama }}
    </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Password:</strong>
{{ $useri->password }}
</div>
</div>

</div>
@endsection --}}
