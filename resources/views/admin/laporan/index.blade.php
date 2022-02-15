@extends('adminlte::page')

@section('title', 'Data Laporan')

@section('content_header')

Data Laporan

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
                    <a href="{{route('laporan.create')}}" class="float-right btn btn-sm btn-outline-primary"><i class="fas fa-fw fa-cart-plus"></i> Tambah Laporan</a>
                </div>
                <div class="modal-body">
                <form action="{{route('laporan.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" name="from" class="form-control datepicker" required="">
                    </div>
                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="to" class="form-control datepicker" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                        <button type="button" class="btn btn-light shadow-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <!-- Modal -->
<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header bg-gradient-success rounded-0">
                <h5 class="modal-title text-white">Laporan Barang Bulanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{route('laporan.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="text" name="from" class="form-control datepicker" required="">
                    </div>
                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="text" name="to" class="form-control datepicker" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                        <button type="button" class="btn btn-light shadow-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
