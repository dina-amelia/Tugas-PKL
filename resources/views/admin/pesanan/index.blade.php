@extends('adminlte::page')

@section('title', 'Data Pesanan')

@section('content_header')

    Data Pesanan

@endsection
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-12">
                    <h1 class="m-0">DATA PEMESANAN</h1>
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
                        DATA PESANAN
                        <a href="{{ route('pesanan.create') }}" class="float-right btn btn-sm btn-outline-primary"><i
                                class="fas fa-fw fa-cart-plus"></i> Tambah Pesanan Baru</a></a>
                    </div>
                    {{-- <form action="" {{ url('admin/laporan/pesanan/export') }} method="post">
                        @csrf
                        <button style="float: right; margin-right: 15px" class="btn btn-sm btn-outline-success"
                            type="submit">Export</button>
                    </form> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="pesanan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemesan</th>
                                        <th>Alamat</th>
                                        <th>No Telephone</th>
                                        <th>Jumlah</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Total</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Uang</th>
                                        <th>Kembalian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @php $no=1; @endphp
                                @foreach ($pesanan as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->pemesan }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>0{{ $data->no_telephone }}</td>
                                            <td>{{ $data->jumlah }} pcs</td>
                                            <td>{{ $data->barang->barangmasuk->nama_barang}}</td>
                                            <td>Rp. {{ number_format($data->barang->harga, 0, ',', '.') }}</td>
                                            <td>{{ $data->tanggal_pesan }}</td>
                                            <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
                                            <td>{{ $data->tanggal_bayar }}</td>
                                            <td>Rp. {{ number_format($data->uang, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($data->kembalian, 0, ',', '.') }}</td>
                                            <td>
                                                <form action="{{ route('pesanan.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <p><a href="{{ route('pesanan.edit', $data->id) }}"
                                                            class="btn btn-outline-warning"><i
                                                                class="fa fa-edit"></i></a>
                                                        <a href="{{ route('pesanan.show', $data->id) }}"
                                                            class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                                                        <button type="submit"
                                                            class="btn btn-outline-danger delete-confirm "><i
                                                                class="fas fa-window-close"></i></button>
                                                    </p>
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
            $('#pesanan').DataTable();
        });
    </script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
