@extends('adminlte::page')

@section('title', 'Data Supplier')

@section('content_header')

    Data Supplier

@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Tambah Supplier Baru</h1>
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
                        Data Supplier
                    </div>
                    <div class="card-body">
                        <form action="{{ route('supplier.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Supplier</label>
                                <input type="text" name="nama_supplier"
                                    class="form-control @error('nama_supplier') is-invalid @enderror">
                                @error('nama_supplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">No Telephone</label>
                                <input type="text" name="no_telephone"
                                    class="form-control @error('no_telephone') is-invalid @enderror">
                                @error('no_telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea type="file" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror""></textarea>
                                            @error('alamat')
        <span class="   invalid-feedback" role="alert">
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
