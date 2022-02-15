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
                </div>
                <div class="modal-body">
                    <tr>
                        <th colspan="7">Laporan Barang Masuk</th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang </th>
                        <th>Tanggal Masuk</th>
                        <th>Pemasukan </th>
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($laporan as $row)
                    <tr>
                        <td>{{$data->barang->nama_barang}}</td>
                        <td>{{$data->barang->tanggal_masuk}}</td>
                        <td>{{$data->pembayaran->id}}</td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->invoice_no }}</td>
                        <td>{{ Carbon\Carbon::parse($row->rent_date)->format('Y-m-d') }}</td>
                        <td>{{ title_case($row->customer->name) }}</td>
                        <td>{{ title_case($row->customer->nik) }}</td>
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->amount }}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="6"></td>
                        <td>{{$laporan->sum('amount')}}</td>
                    </tr>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

