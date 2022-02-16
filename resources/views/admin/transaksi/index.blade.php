@extends('adminlte::page')

@section('title', 'Data Transaksi')

@section('content_header')

    Data Transaksi

@endsection
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-12">
                    <h1 class="m-0">TRANSAKSI PEMBAYARAN</h1>
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
                        DATA TRANSAKSI PEMBAYARAN
                        <a href="{{ route('transaksi.create') }}" class="float-right btn btn-sm btn-outline-primary"><i
                                class="fas fa-fw fa-cart-plus"></i> Tambah Transaksi Baru</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table" id="transaksi">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemesan</th>
                                        <th>Id Pesanan</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Total Bayar</th>
                                        <th>Uang</th>
                                        <th>Kembalian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @php $no=1; @endphp
                                @foreach ($pembayaran as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->pesanan->pemesan }}</td>
                                            <td>{{ $data->pesanan->id }}</td>
                                            <td>{{ $data->pesanan->tanggal_bayar }}</td>
                                            <td>Rp. {{ number_format($data->pesanan->total, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($data->uang, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($data->kembalian, 0, ',', '.') }}</td>

                                            <td>
                                                <form action="{{ route('transaksi.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('transaksi.edit', $data->id) }}"
                                                        class="mb-2 btn btn-outline-info">Edit</a>
                                                    <a href="{{ route('transaksi.show', $data->id) }}"
                                                        class="btn btn-info">Show</a><br>
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#transaksi').DataTable();
        });
    </script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
