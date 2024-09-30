<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Pengajuan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: #f8f9fa;
            color: #0056b3;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
        }

        td {
            color: #777;
            border-bottom: 1px solid #ddd;
        }

        .btn-status {
            padding: 5px 10px;
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-status.processing {
            background-color: #6c757d; /* Warna abu-abu */
        }

        /* Optional styling for SK (Surat Keterangan) column */
        .btn-sk {
            padding: 5px 10px;
            background-color: yellow;
            color: #333;
            border-radius: 5px;
            border: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Nomor Pengajuan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Organisasi Mahasiswa</th>
                    <th>Status Verifikasi</th>
                    <th>Waktu Verifikasi</th>
                    <th>Keterangan Verifikasi</th>
                    <th>Surat SK</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nomor Pengajuan</td>
                    <td>Tanggal Pengajuan</td>
                    <td>Organisasi Mahasiswa</td>
                    <td><button class="btn-status processing">Diproses</button></td>
                    <td>Waktu Verifikasi</td>
                    <td>Keterangan Verifikasi</td>
                    <td><button class="btn-sk">Surat SK</button></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
