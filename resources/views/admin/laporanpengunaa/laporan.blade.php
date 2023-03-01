<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin: 0;
            padding: 20px 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        @media print {
            body {
                font-size: 12px;
            }

            h1 {
                font-size: 20px;
                padding: 10px 0;
            }

            table {
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>

    <h1>Laporan Penggunaan Obat</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Nama Pasien</th>
                <th>Nama Obat</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>TGL Pengambilan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $v)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $v->nama_dokter }} </td>
                    <td>{{ $v->nama_pasien }} </td>
                    <td>{{ $v->nama_obat }} </td>
                    <td>{{ $v->jumlah }} Pcs</td>
                    <td>{{ strip_tags($v->Keterangan) }}</td>
                    <td>{{ $v->created_at }}</td>
                </tr>
            @empty
                <td colspan="6" class="text-center"> Tidak ada data .. </td>
            @endforelse
        </tbody>
    </table>
</body>

</html>
