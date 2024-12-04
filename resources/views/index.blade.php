<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>

    <!-- Tampilkan pesan sukses -->
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Form Tambah Produk -->
    <form action="{{ route('product.add') }}" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama Produk" required>
        <input type="text" name="kategori" placeholder="Kategori" required>
        <input type="number" name="stok_tersedia" placeholder="Stok" required>
        <button type="submit">Tambah Produk</button>
    </form>

    <!-- Tampilkan data produk -->
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->kategori }}</td>
                    <td>{{ $p->stok_tersedia }}</td>
                    <td>
                        @foreach ($p->transaksi as $t)
                            <p>ID Transaksi: {{ $t->id }}, Jumlah: {{ $t->jumlah_transaksi }}, Total Harga: {{ $t->total_harga }}</p>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
