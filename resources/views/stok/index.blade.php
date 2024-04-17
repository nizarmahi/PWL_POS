@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a href="{{url('stok/create')}}" class="btn btn-sm btn-primary mt-1">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if (session('info'))
                <div class="alert alert-info">{{session('info')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="">- Semua -</option>
                                @foreach ($user as $item)
                                    <option value="{{$item->user_id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">user stok</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_stok">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Nama User</th>
                        <th>Jumlah Stok</th>
                        <th>Tanggal Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function(){
            var dataStok = $('#table_stok').DataTable({
                serverSide: true, //serverside true jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('stok/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function (d){
                        d.kategori_id = $('#kategori_id').val();
                        d.user_id = $('#user_id').val();
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex", //nomor urut dari laravel datatable addindexcolumn()
                        classname: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang.barang_nama",
                        classname: "",
                        orderable: false, //orderable true jika ingin kolom bisa diurutkan
                        searchable: true //searchable true jika ingin kolom bisa dicari
                    },
                    {
                        data: "user.nama",
                        classname: "",
                        orderable: false, //orderable true jika ingin kolom bisa diurutkan
                        searchable: true //searchable true jika ingin kolom bisa dicari
                    },
                    {
                        data: "stok_jumlah",
                        classname: "",
                        orderable: true, //orderable true jika ingin kolom bisa diurutkan
                        searchable: false //searchable true jika ingin kolom bisa dicari
                    },
                    {
                        data: "stok_tanggal",
                        classname: "",
                        orderable: true, //orderable true jika ingin kolom bisa diurutkan
                        searchable: false //searchable true jika ingin kolom bisa dicari
                    },
                    {
                        data: "aksi",
                        classname: "",
                        orderable: false, //orderable true jika ingin kolom bisa diurutkan
                        searchable: false //searchable true jika ingin kolom bisa dicari
                    }
                ]
            });

            $('#user_id').on('change', function(){
                dataStok.ajax.reload();
            });
        });
    </script>
@endpush