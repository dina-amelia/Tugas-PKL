<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Bulanan</title>
    <style>
        table {
            width: 100px;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }

        th {
            padding: 10px;
            background: beige;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }

        p {
            font-size: 16px;
        }

    </style>
</head>

<body>
    <center>
        <div class="card-body">
            <div class="table-responsive">
                <center>
                    <h2><u>LAPORAN PESANAN BULANAN</u></h2>
                </center><br>
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
                                <th>Tanggal Laporan</th>
                            </tr>
                        </center>
                    </thead>
                    @php $no=1; @endphp
                    @foreach ($pesanan ?? '' as $data)
                        <tbody>
                            <tr>
                                <center>
                                    <td>
                                        <center>{{ $no++ }}</center>
                                    </td>
                                    <td>{{ $data->pemesan }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>0{{ $data->no_telephone }}</td>
                                    <td>
                                        <center>{{ $data->jumlah }} pcs</center>
                                    </td>
                                    <td>{{ $data->barang->barangmasuk->nama_barang}}</td>
                                    <td>Rp. {{ number_format($data->barang->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <center>{{ $data->tanggal_pesan }}</center>
                                    </td>
                                    <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
                                    <td>
                                        <center>{{ $data->tanggal_bayar }}</center>
                                    </td>
                                    <td> {{ $data->created_at->format('d M Y') }}</td>
                                </center>
                            </tr>

                        </tbody>
                    @endforeach
                </table>

                <table class="table" border="1" id="pengelola">
                    <center>
                        <tr>
                            <p>
                                <center>TOTAL KESELURUHAN = Rp. {{ number_format($total, 0, ',', '.') }}</center>
                            </p>
                        </tr><br><br>
                        <h2><u>LAPORAN BARANG MASUK</u></h2>
                    </center><br>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($barang as $data)
                            <tr>
                                <td>
                                    <center>{{ $no++ }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->kode_barang }}</center>
                                </td>
                                <td>{{ $data->barangmasuk->nama_barang }}</td>
                            </tr>
                        @endforeach
                    </tbody>
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
