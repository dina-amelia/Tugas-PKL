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
                <h1 class="m-0">Tambah Laporan Baru</h1>
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
                    Data Laporan
                </div>
                <div class="card-body">
                   <form action="{{route('laporan.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Barang Keluar</label>
                            <input type="text" name="nama_barang_keluar" class="form-control @error('nama_barang_keluar') is-invalid @enderror">
                             @error('nama_barang_keluar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Keluar</label>
                            <input type="date" name="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror">
                             @error('tanggal_keluar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Pemasukan</label>
                            <input type="text" name="pemasukan" class="form-control @error('pemasukan') is-invalid @enderror">
                             @error('pemasukan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Id Pembayaran</label>
                            <select name="pembayaran_id" class="form-control @error('pembayaran_id') is-invalid @enderror" >
                                @foreach($pembayaran as $data)
                                    <option value="{{$data->id}}">{{$data->id}}</option>
                                @endforeach
                            </select>
                             @error('pembayaran_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror">
                             @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
