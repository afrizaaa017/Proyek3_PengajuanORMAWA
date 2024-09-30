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

        h1 {
            font-family: 'Arial', sans-serif;
            color: #000;
            font-weight: bold;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            color: #0056b3;
            font-size: 24px;
            font-weight: bold;
        }

        .dropdown {
            display: flex;
            align-items: center;
        }

        .dropdown label {
            font-weight: bold;
        }

        .dropdown select {
            margin-left: 10px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
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
        }

        .btn-status {
            padding: 5px 10px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-ditolak {
            background-color: red;
        }

        .btn-revisi {
            background-color: orange;
        }

        .btn-disetujui {
            background-color: green;
        }

        .btn-aksi {
            background-color: yellow;
            border: none;
            padding: 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .icon-eye {
            font-size: 18px;
        }
    </style>
</head>
<body>

    <h1>Tabel</h1>
    <div class="container">
        <!-- Header untuk judul tabel dan dropdown periode -->
        <div class="header">
            <h2>Tabel Pengajuan</h2>
            <div class="dropdown">
                <label for="periode">Periode:</label>
                <select id="periode">
                    <option value="2024">2024-2025</option>
                    <option value="2023">2023-2024</option>
                    <option value="2022">2022-2023</option>
                    <option value="2022">2021-2022</option>
                </select>
            </div>
        </div>

        <!-- Tabel Pengajuan -->
        <table>
            <thead>
                <tr>
                    <th>Nomor Pengajuan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Organisasi Mahasiswa</th>
                    <th>Status Verifikasi</th>
                    <th>Waktu Verifikasi</th>
                    <th>Keterangan Verifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Baris pertama dengan isi data -->
                <tr>
                    <td>231511072</td>
                    <td>18/09/2024</td>
                    <td>HIMAKOM</td>
                    <td><button class="btn-status btn-ditolak">Ditolak</button></td>
                    <td>15:14 18/09/2024</td>
                    <td><button class="btn-status btn-revisi">REVISI</button></td>
                    <td><button class="btn-aksi"><span class="icon-eye">&#128065;</span></button></td>
                </tr>

                <!-- Baris kedua hingga ketujuh dengan status "Disetujui" -->
                <tr>
                    <td colspan="3"></td>
                    <td><button class="btn-status btn-disetujui">Disetujui</button></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><button class="btn-status btn-disetujui">Disetujui</button></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><button class="btn-status btn-disetujui">Disetujui</button></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><button class="btn-status btn-disetujui">Disetujui</button></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><button class="btn-status btn-disetujui">Disetujui</button></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><button class="btn-status btn-disetujui">Disetujui</button></td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
