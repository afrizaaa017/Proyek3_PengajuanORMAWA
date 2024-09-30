<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Pengajuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            border: 2px solid #000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .dropdown {
            display: flex;
            align-items: center;
        }

        .dropdown select {
            padding: 5px;
            margin-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        .btn-status {
            padding: 5px 10px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-ditolak {
            background-color: red;
        }

        .btn-revisi {
            background-color: orange;
        }

        .btn-aksi {
            background-color: yellow;
        }

        .icon-eye {
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header untuk judul tabel dan dropdown periode -->
        <div class="header">
            <h2>Tabel Pengajuan</h2>
            <div class="dropdown">
                <label for="periode">Periode:</label>
                <select id="periode">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
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
                    <td>30/09/2024</td>
                    <td>HIMAKOM</td>
                    <td><button class="btn-status btn-ditolak">Ditolak</button></td>
                    <td>13:45 30/09/2024</td>
                    <td><button class="btn-status btn-revisi">Revisi</button></td>
                    <td><button class="btn-status btn-aksi"><span class="icon-eye">&#128065;</span></button></td>
                </tr>

                <!-- Baris kosong kedua hingga ketujuh -->
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
