@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@endsection
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">LAPORAN </h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    DATA LAPORAN
                    <a href="{{route('laporan.create')}}" class="float-right btn btn-sm btn-outline-primary">Tambah Laporan Baru</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang Keluar</th>
                                <th>Tanggal Keluar</th>
                                <th>Pemasukan</th>
                                <th>Id Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($laporan as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_barang_keluar}}</td>
                                    <td>{{$data->tanggal_keluar}}</td>
                                    <td>{{$data->pemasukan}}</td>
                                    <td>{{$data->pembayaran->id}}</td>
                                    <td>{{$data->status}}</td>

                                    <td>
                                        <a href="{{route('laporan.edit', $data->id)}}" class="mb-2 btn btn-outline-info">Edit</a>
                                        <form action="{{route('laporan.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('laporan.show', $data->id)}}" class="btn btn-info">Show</a><br>
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
