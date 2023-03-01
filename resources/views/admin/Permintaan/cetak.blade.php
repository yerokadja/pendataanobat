<!DOCTYPE html>
<html>

<head>
    <title>Cetak Resep Obat</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        h1 {
            font-size: 24px;
            margin-top: 0;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .instructions {
            margin-bottom: 20px;
        }

        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>

<body>
    @foreach ($data as $item)
        <h1>Resep Obat:{{ $item->nama_obat }}</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama Obat</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ strip_tags($item->Keterangan) }}</td>
                </tr>
            </tbody>
        </table>
        <div class="instructions">
            <h3>Cara Penggunaan:</h3>
            <p>1. Baca petunjuk pada label obat sebelum mengonsumsi.</p>
            <p>2. Minum obat setelah makan, atau sesuai dengan petunjuk dokter.</p>
            <p>3. Minum obat secara teratur pada waktu yang sama setiap hari.</p>
            <p>4. Jangan berhenti mengonsumsi obat sebelum waktunya, kecuali atas saran dokter.</p>
        </div>
        <div class="footer">
            <p>Tanggal dikeluarkan: {{ $item->created_at }}</p>
            <p>Ditandatangani oleh: {{ $item->nama_dokter }}</p>
            <p>Apoteker yang mencetak: {{ auth()->guard('apoteker')->user()->nama_apoteker }}</p>
        </div>
    @endforeach
</body>

</html>
