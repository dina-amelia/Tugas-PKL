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
                    <h1 class="m-0">Edit Produk</h1>
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
                    <div class="card-header"> Data Produk</div>
                    <div class="card-body">
                        <form action="{{ route('pengelola.update', $barang->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Kode Barang</label>
                                <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}"
                                    class="form-control @error('kode_barang') is-invalid @enderror">
                                @error('kode_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}"
                                    class="form-control @error('nama_barang') is-invalid @enderror">
                                @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" value="{{ $barang->tanggal_masuk }}"
                                    class="form-control @error('tanggal_masuk') is-invalid @enderror">
                                @error('tanggal_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="text" name="stock" value="{{ $barang->stock }}"
                                    class="form-control @error('stock') is-invalid @enderror">
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="harga" value="{{ $barang->harga }}"
                                    class="form-control @error('harga') is-invalid @enderror">
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
                                        <input type="radio" name="kategori" value="Anak-Anak" id="kategori">Anak-anak
                                        <input type="radio" name="kategori" value="Remaja" id="kategori">Remaja
                                        <input type="radio" name="kategori" value="Dewasa" id="kategori">Dewasa
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi : </label>
                                <textarea type="text" name="deskripsi" rows="4"
                                    cols="140">{{ $barang->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Gambar :</label><br>
                                <img src="{{ $barang->image() }}" style="width: 350px; height:350px; padding:10px;">
                                <input type="file" name="gambar" value="{{ $barang->gambar }}"
                                    class="form-control @error('cover') is-invalid @enderror">
                                @error('cover')
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
