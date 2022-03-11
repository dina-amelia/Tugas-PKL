@extends('adminlte::page')

@section('title', 'Data Barang Keluar')

@section('content_header')

    Data Barang Keluar

@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-12">
                    <h1 class="m-0">DATA BARANG KELUAR</h1>
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
                        BARANG KELUAR
                        <a href="{{ route('barangkeluar.create') }}" class="float-right btn btn-sm btn-outline-primary"><i
                            class="fas fa-fw fa-cart-plus"></i> Tambah Barang Keluar</a></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table" id="barangkeluar">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($barangkeluar as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_barang }}</td>
                                            <td>0{{ $data->barang->barangmasuk->pesanan->nama_barang }}</td>
                                            <td>{{ $data->pesanan->jumlah }}</td>
                                            <td>
                                                <form action="{{ route('barangkeluar.destroy', $data->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <p>
                                                        <a href="{{ route('barangkeluar.show', $data->id) }}"
                                                            class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                                                        <button type="submit"
                                                            class="btn btn-outline-danger delete-confirm "><i
                                                                class="fas fa-window-close"></i></button>
                                                    </p>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#barangkeluar').DataTable();
        });
    </script>
@endsection
