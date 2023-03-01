<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Obat</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #dddddd;
        }

        .header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        Report Data Obat
    </div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama obat</th>
                <th>Pemasok</th>
                <th>Kategori</th>
                <th>Unit</th>
                <th>Peyimpanan</th>
                <th>Stok</th>
                <th>kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            @forelse($obat as $data)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_obat }}</td>
                    <td>{{ $data->nama_pemasok }}</td>
                    <td>{{ $data->nama_kategori }}</td>
                    <td>{{ $data->Nama_unit }}</td>
                    <td>{{ $data->penyimpanan }}</td>
                    <td>{{ $data->stock }}</td>
                    <td>
                        @if ($data->status == 'Normal')
                            {{ $data->status }}
                        @else
                            {{ $data->status }}
                        @endif
                    </td>
                </tr>
            @empty
                <td colspan="6" class="text-center"> Tidak ada data .. </td>
            @endforelse
        </tbody>
    </table>
</body>

</html>
