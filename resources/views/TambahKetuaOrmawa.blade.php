<h1>Daftar Ketua Ormawa</h1>

<h1>Tambah Ketua Ormawa</h1>
<form action="{{ route('ketuaOrmawa.store') }}" method="POST">
    @csrf
    <label for="nama_ketua">Nama Ketua:</label>
    <input type="text" name="nama_ketua" required>
    
    <label for="ormawa_id">Pilih Ormawa:</label>
    <select name="ormawa_id" required>
        @foreach($ormawas as $ormawa)
            <option value="{{ $ormawa->id_ormawa }}">{{ $ormawa->nama_ormawa }}</option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>


<table>
    <thead>
        <tr>
            <th>Nama Ketua</th>
            <th>Ormawa</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ketuaOrmawas as $ketua)
            <tr>
                <td>{{ $ketua->nama_ketua }}</td>
                <td>{{ $ketua->ormawa->nama_ormawa }}</td>
                <td>
                    <form action="{{ route('ketuaOrmawa.destroy', $ketua->id_ketua_ormawa) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



