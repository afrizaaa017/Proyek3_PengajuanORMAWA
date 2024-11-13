
<h1>Tambah Jurusan</h1>
<form action="{{ route('jurusan.store') }}" method="POST">
    @csrf
    <label for="nama_jurusan">Nama Ketua:</label>
    <input type="text" name="nama_jurusan" required>

    <button type="submit">Simpan</button>
</form>



<h1>Tambah Prodi</h1>
<form action="{{ route('prodi.store') }}" method="POST">
    @csrf
    <label for="nama_prodi">Nama Ketua:</label>
    <input type="text" name="nama_prodi" required>
    
    <label for="jurusan_id">Pilih Jurusan:</label>
    <select name="jurusan_id" required>
        @foreach($jurusans as $jurusan)
            <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>

<h1>Tabel Prodi</h1>
<table>
    <thead>
        <tr>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prodis as $prodi)
            <tr>
                <td>{{ $prodi->nama_prodi }}</td>
                <td>{{ $prodi->jurusan->nama_jurusan }}</td>
                <td>
                    <form action="{{ route('prodi.destroy', $prodi->id_prodi) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Tabel Jurusan</h1>
<table>
    <thead>
        <tr>
            <th>Jurusan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jurusans as $jurusan)
            <tr>
                <td>{{ $jurusan->nama_jurusan }}</td>
                <td>
                    <form action="{{ route('jurusan.destroy', $jurusan->id_jurusan) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



