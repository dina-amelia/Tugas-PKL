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
                    <h1 class="m-0">Tambah Transaksi Baru</h1>
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
                        Data Transaksi Pembayaran
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaksi.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Id Pesanan</label>
                                <select name="pesanan_id" class="form-control @error('pesanan_id') is-invalid @enderror">
                                    @foreach ($pesanan as $data)
                                        <option value="{{ $data->id }}">{{ $data->id }}</option>
                                    @endforeach
                                </select>
                                @error('pesanan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Uang</label>
                                <input type="text" name="uang" class="form-control @error('uang') is-invalid @enderror">
                                @error('uang')
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
