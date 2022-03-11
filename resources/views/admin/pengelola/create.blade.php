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
                    <h1 class="m-0">Tambah Pesanan Baru</h1>
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
                        Data Pesanan
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengelola.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
                                    @foreach ($barangmasuk as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_barang }}</option>
                                    @endforeach
                                </select>
                                @error('barang_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Stock</label>
                                <select name="stock" class="form-control @error('stock') is-invalid @enderror">
                                    @foreach ($barangmasuk as $data)
                                        <option value="{{ $data->id }}">{{ $data->jumlah_masuk }}</option>
                                    @endforeach
                                </select>
                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk"
                                    class="form-control @error('tanggal_masuk') is-invalid @enderror">
                                @error('tanggal_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori :</label> <br>
                                <div class="form-check form-check-inline">
                                    <label for="kategori">
                                        <input type="radio" name="kategori" value="Anak-anak " id="kategori">Anak-anak
                                        <input type="radio" name="kategori" value="Remaja " id="kategori">Remaja
                                        <input type="radio" name="kategori" value="Dewasa " id="kategori">Dewasa
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea type="file" name="deskripsi" class="form-control"></textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Gambar</label>
                                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                                @error('gambar')
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
