@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('info'))
                <div class="alert alert-info">{{ session('info') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="container mt-3">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>Judul Gambar</th>
                        <td>{{$file->name}}</td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td><img src="{{$file->path}}" style="width: auto; height: 12em;"></td>
                    </tr>
                    <tr>
                        <th>Link Gambar</th>
                        <td><a href="{{$file->path}}">{{$file->name}}</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
