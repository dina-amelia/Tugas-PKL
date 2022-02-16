<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <div class="card-body">
            <div class="table-responsive">
                <center>
                    <h4>LAPORAN PESANAN BULANAN</h4>
                </center>
                <table class="table" border="1" id="pesanan">
                    <thead>
                        <center>
                            <tr>
                                <th>No</th>
                                <th>Pemesanan</th>
                                <th>Alamat</th>
                                <th>No Telephone</th>
                                <th>Jumlah</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Tanggal Pesan</th>
                                <th>Total</th>
                                <th>Tanggal Bayar</th>
                            </tr>
                        </center>
                    </thead>
                    @php $no=1; @endphp
                    @foreach ($pesanan ?? '' as $data)
                        <tbody>
                            <center>
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->pemesan }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>0{{ $data->no_telephone }}</td>
                                    <td>{{ $data->jumlah }}</td>
                                    <td>{{ $data->barang->nama_barang }}</td>
                                    <td>Rp. {{ number_format($data->barang->harga, 0, ',', '.') }}</td>
                                    <td>{{ $data->tanggal_pesan }}</td>
                                    <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
                                    <td> {{ $data->created_at->format('d M Y') }}</td>
                                </tr>
                            </center>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <center>
            <script>
                window.print();
            </script>
        </center>
    </center>
</body>

</html>
