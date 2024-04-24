<?php
// Mulai sesi PHP
session_start();

// Include file config.php dan model.php
require_once 'config.php';
require_once 'model.php';

// Membuat instance dari kelas Model
$model = new Model();

// Jika formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_nama = $_POST['user_nama'];
    $user_alamat = $_POST['user_alamat'];
    $user_hp = $_POST['user_hp'];
    $user_pos = $_POST['user_pos'];
    $user_role = $_POST['user_role'];
    $user_aktif = $_POST['user_aktif'];

    // Memasukkan data ke dalam array untuk disisipkan ke dalam database
    $data = array(
        'user_email' => $user_email,
        'user_password' => $user_password,
        'user_nama' => $user_nama,
        'user_alamat' => $user_alamat,
        'user_hp' => $user_hp,
        'user_pos' => $user_pos,
        'user_role' => $user_role,
        'user_aktif' => $user_aktif
    );

    // Memanggil fungsi add() dari kelas Model untuk menyisipkan data ke dalam database
    $result = $model->add($data);

    // Memeriksa apakah sisipan data berhasil atau tidak
    if ($result) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pemrograman Web</title>
</head>
<body>
    <h2>Formulir Registrasi Pengguna</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="user_email">Email:</label>
        <input type="email" name="user_email" required><br><br>
        
        <label for="user_password">Password:</label>
        <input type="password" name="user_password" required><br><br>
        
        <label for="user_nama">Nama:</label>
        <input type="text" name="user_nama" required><br><br>
        
        <label for="user_alamat">Alamat:</label>
        <textarea name="user_alamat" required></textarea><br><br>
        
        <label for="user_hp">Nomor Telepon:</label>
        <input type="text" name="user_hp" required><br><br>
        
        <label for="user_pos">Kode Pos:</label>
        <input type="text" name="user_pos" required><br><br>
        
        <label for="user_role">Peran:</label>
        <select name="user_role" required>
            <option value="1">Admin</option>
            <option value="2">Pengguna Biasa</option>
        </select><br><br>
        
        <label for="user_aktif">Aktif:</label>
        <select name="user_aktif" required>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select><br><br>

        <input type="submit" value="Simpan">
    </form>

    <h2>Formulir Order</h2>
    <form action="add_order.php" method="post">
        <label for="order_kode">Kode Order:</label>
        <input type="text" name="order_kode" required><br><br>
        
        <label for="order_ttl">Total Harga:</label>
        <input type="number" name="order_ttl" required><br><br>
        
        <label for="order_ongkir">Ongkos Kirim:</label>
        <input type="number" name="order_ongkir" required><br><br>
        
        <label for="order_kurir">Kurir:</label>
        <input type="text" name="order_kurir" required><br><br>
        
        <label for="order_byr_deadline">Batas Pembayaran:</label>
        <input type="datetime-local" name="order_byr_deadline" required><br><br>
        
        <label for="order_batal">Dibatalkan:</label>
        <select name="order_batal" required>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select><br><br>
        
        <label for="order_id_user">ID User:</label>
        <input type="number" name="order_id_user" required><br><br>

        <input type="submit" value="Tambah Order">
    </form>

    <h2>Formulir Tambah Produk</h2>
    <form action="add_product.php" method="post">
        <label for="produk_kode">Kode Produk:</label>
        <input type="text" name="produk_kode" required><br><br>
        
        <label for="produk_nama">Nama Produk:</label>
        <input type="text" name="produk_nama" required><br><br>
        
        <label for="produk_harga">Harga:</label>
        <input type="number" name="produk_harga" required><br><br>
        
        <label for="produk_keterangan">Keterangan:</label>
        <textarea name="produk_keterangan" required></textarea><br><br>
        
        <label for="produk_stock">Stok:</label>
        <input type="number" name="produk_stock" required><br><br>
        
        <label for="produk_photo">Foto Produk:</label>
        <input type="text" name="produk_photo"><br><br>
        
        <label for="produk_id_kat">ID Kategori:</label>
        <input type="number" name="produk_id_kat" required><br><br>

        <input type="submit" value="Tambah Produk">
    </form>

    <h2>Formulir Pengguna</h2>
    <form action="add_user.php" method="post">
        <label for="user_email">Email:</label>
        <input type="email" name="user_email" required><br><br>
        
        <label for="user_password">Password:</label>
        <input type="password" name="user_password" required><br><br>
        
        <label for="user_nama">Nama:</label>
        <input type="text" name="user_nama" required><br><br>
        
        <label for="user_alamat">Alamat:</label>
        <textarea name="user_alamat" required></textarea><br><br>
        
        <label for="user_hp">Nomor Telepon:</label>
        <input type="text" name="user_hp" required><br><br>
        
        <label for="user_pos">Kode Pos:</label>
        <input type="text" name="user_pos" required><br><br>
        
        <label for="user_role">Peran:</label>
        <select name="user_role" required>
            <option value="1">Admin</option>
            <option value="2">Pengguna Biasa</option>
        </select><br><br>
        
        <label for="user_aktif">Aktif:</label>
        <select name="user_aktif" required>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select><br><br>

        <input type="submit" value="Simpan Pengguna">
    </form>

    <h2>Formulir Keranjang Belanja</h2>
    <form action="add_cart.php" method="post">
        <label for="ker_id_produk">ID Produk:</label>
        <input type="text" name="ker_id_produk" required><br><br>
        
        <label for="ker_harga">Harga:</label>
        <input type="number" name="ker_harga" required><br><br>
        
        <label for="ker_jml">Jumlah:</label>
        <input type="number" name="ker_jml" required><br><br>
        
        <label for="ker_id_user">ID Pengguna:</label>
        <input type="text" name="ker_id_user" required><br><br>

        <input type="submit" value="Tambah ke Keranjang">
    </form>

    <h2>Formulir Order Detail</h2>
    <form action="add_order_detail.php" method="post">
        <label for="order_id">ID Order:</label>
        <input type="number" name="order_id" required><br><br>
        
        <label for="produk_id">ID Produk:</label>
        <input type="number" name="produk_id" required><br><br>
        
        <label for="order_detail_harga">Harga:</label>
        <input type="number" name="order_detail_harga" required><br><br>
        
        <label for="order_detail_qty">Kuantitas:</label>
        <input type="number" name="order_detail_qty" required><br><br>
        
        <label for="order_detail_subtotal">Subtotal:</label>
        <input type="number" name="order_detail_subtotal" required><br><br>

        <input type="submit" value="Tambah Order Detail">
    </form>

    <h2>Formulir Kategori</h2>
    <form action="add_category.php" method="post">
        <label for="kategori_nama">Nama Kategori:</label>
        <input type="text" name="kategori_nama" required><br><br>
        
        <label for="kategori_keterangan">Keterangan:</label>
        <textarea name="kategori_keterangan" required></textarea><br><br>

        <input type="submit" value="Simpan Kategori">
    </form>

</body>
</html>
