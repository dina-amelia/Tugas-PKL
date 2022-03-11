@extends('adminlte::page')

@section('title', 'Data Barang Keluar')

@section('content_header')

    Data Barang Keluar

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Barang Keluar
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barangkeluar.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <select name="pesanan_id" class="form-control @error('pesanan_id') is-invalid @enderror">
                                    @foreach ($pesanan as $data)
                                        <option value="{{ $data->id }}">{{ $data->barang->barangmasuk->nama_barang}}</option>
                                    @endforeach
                                </select>
                                @error('pesanan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Jumlah Barang</label>
                                <select name="pesanan_id" class="form-control @error('pesanan_id') is-invalid @enderror">
                                    @foreach ($pesanan as $data)
                                        <option value="{{ $data->id }}">{{ $data->jumlah}}</option>
                                    @endforeach
                                </select>
                                @error('pesanan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                            <div class="form-group"> --}}
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
