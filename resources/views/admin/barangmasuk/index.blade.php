@extends('adminlte::page')

@section('title', 'Data Barang Masuk')

@section('content_header')

    Data Barang Masuk

@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-12">
                    <h1 class="m-0">DATA BARANG MASUK</h1>
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
                        BERANDA BARANG MASUK
                        <a href="{{ route('barangmasuk.create') }}" class="float-right btn btn-sm btn-outline-primary"><i
                                class="fas fa-fw fa-cart-plus"></i>Tambah Barang</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table" id="pengelola">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($barangmasuk as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_barang }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>{{ $data->jumlah_masuk }} pcs</td>
                                            <td>{{ $data->tanggal_masuk }}</td>

                                                <td><form action="{{ route('barangmasuk.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <p>
                                                        {{-- <a href="{{ route('barangmasuk.edit', $data->id) }}"
                                                            class="btn btn-outline-warning"><i
                                                                class="fa fa-edit"></i></a>
                                                        <a href="{{ route('barangmasuk.show', $data->id) }}"
                                                            class="btn btn-outline-info"><i
                                                                class="fa fa-eye"></i></a><br> --}}
                                                        <button type="submit"
                                                            class="btn btn-outline-danger delete-confirm "><i
                                                                class="fas fa-window-close"></i></button>
                                                    </p>
                                                </form></td>
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
            $('#pengelola').DataTable();
        });
    </script>
@endsection
