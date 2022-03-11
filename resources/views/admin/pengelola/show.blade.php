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
                    <h1 class="m-0">Show Produk</h1>
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
                    <div class="card-header">Show Data Produk</div>
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Kode Barang</label>
                            <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}"
                                class="form-control @error('kode_barang') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{ $barang->barangmasuk->nama_barang }}"
                                class="form-control @error('nama_barang') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="text" name="stock" value="{{ $barang->stock }}"
                                class="form-control @error('stock') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" value="{{ $barang->tanggal_masuk }}"
                                class="form-control @error('tanggal_masuk') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" value="{{ $barang->harga }}"
                                class="form-control @error('harga') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori :</label> <br>
                            <div class="form-check form-check-inline">
                                <label for="kategori" readonly>
                                    <input type="radio" name="kategori" value="{{ $barang->kategori }}"
                                        id="kategori">Anak-anak
                                    <input type="radio" name="kategori" value="{{ $barang->kategori }}"
                                        id="kategori">Remaja
                                    <input type="radio" name="kategori" value="{{ $barang->kategori }}"
                                        id="kategori">Dewasa
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi : </label>
                            <textarea type="text" name="deskripsi" rows="4" cols="140"
                                readonly>{{ $barang->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Gambar :</label><br>
                            <img src="{{ $barang->image() }}" style="width: 350px; height:350px; padding:10px;" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin/pengelola') }}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
