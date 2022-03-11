@extends('adminlte::page')

@section('title', 'Data Supplier')

@section('content_header')

    Data Supplier

@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-12">
                    <h1 class="m-0">DATA SUPPLIER</h1>
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
                        DATA SUPPLIER
                        <a href="{{ route('supplier.create') }}" class="float-right btn btn-sm btn-outline-primary"><i
                                class="fas fa-fw fa-cart-plus"></i>Tambah Supplier</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table" id="supplier">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>No Telephone</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($supplier as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_supplier }}</td>
                                            <td>0{{ $data->no_telephone }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>
                                                <form action="{{ route('supplier.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <p>
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
            $('#supplier').DataTable();
        });
    </script>
@endsection
