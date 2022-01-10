@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@endsection
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show laporan</h1>
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
                <div class="card-header">Show Data Laporan</div>
                <div class="card-body">
                    <form action="{{route('laporan.show', $laporan->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama Barang Keluar</label>
                            <input type="text" name="nama_barang_keluar" value="{{$laporan->nama_barang_keluar}}" class="form-control @error('nama_barang_keluar') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal keluar</label>
                            <input type="date" name="tanggal_keluar" value="{{$laporan->tanggal_keluar}}" class="form-control @error('tanggal_keluar') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Pemasukan</label>
                            <input type="text" name="pemasukan" value="{{$laporan->pemasukan}}" class="form-control @error('pemasukan') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Id Pembayaran</label>
                            <input type="text" name="pembayaran_id" value="{{$laporan->pembayaran_id}}" class="form-control @error('pembayaran_id') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" value="{{$laporan->status}}" class="form-control @error('status') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{url('admin/laporan')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
