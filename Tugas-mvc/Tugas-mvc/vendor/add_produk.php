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
    $produk_kode = $_POST['produk_kode'];
    $produk_nama = $_POST['produk_nama'];
    $produk_harga = $_POST['produk_harga'];
    $produk_keterangan = $_POST['produk_keterangan'];
    $produk_stock = $_POST['produk_stock'];
    $produk_photo = $_POST['produk_photo'];
    $produk_id_kat = $_POST['produk_id_kat'];

    // Memasukkan data ke dalam array untuk disisipkan ke dalam database
    $data = array(
        'produk_kode' => $produk_kode,
        'produk_nama' => $produk_nama,
        'produk_harga' => $produk_harga,
        'produk_keterangan' => $produk_keterangan,
        'produk_stock' => $produk_stock,
        'produk_photo' => $produk_photo,
        'produk_id_kat' => $produk_id_kat
    );

    // Memanggil fungsi add() dari kelas Model untuk menyisipkan data ke dalam database
    $result = $model->addProduk($data);

    // Memeriksa apakah sisipan data berhasil atau tidak
    if ($result) {
        echo "Data produk berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan saat menyimpan data produk.";
    }
}
?>
