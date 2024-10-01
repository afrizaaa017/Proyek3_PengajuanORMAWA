<!-- resources/views/detailupload.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar File PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar File PDF yang Di-upload</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel untuk menampilkan daftar file -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Preview</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berkass as $berkas)
                    <p>{{ asset('storage/' . $berkas->path) }}</p> <!-- Debugging path -->
                    <embed type="application/pdf" 
                        src="{{ asset('storage/' . $berkas->path) }}" 
                        width="600"     
                        height="400">
                @endforeach

            </tbody>
        </table>
    </div>
</body>
</html>
