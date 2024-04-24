<?php
class Mahasiswa {
    // Isi class Mahasiswa di sini
}
?>

<?php

class Mahasiswa {
    // Property dengan Access Modifier, Typed Properties, dan Property
    // Bisa diakses oleh class yang sama dan class lain.
    public string $nim;
    public string $nama;
    public int $umur;

    // Hanya bisa diakses dalam class yang sama.
    private string $email;

    // Hanya bisa diakses dalam class yang sama dan subclass/subclassnya.
    protected string $nama_ibu;

    /*
    Jenis-jenis tipe data yang bisa digunakan pada Typed Properties:
    1. bool
    2. int
    3. float
    4. string
    5. array
    6. iterable
    7. object
    8. ?(nullable)
    9. self & parent
    10. Classes & interfaces
    */
}

?>

<?php

class Mahasiswa {
    // Method
    public function setNim(string $nim) {
        return $nim;
    }

    public function setNama(string $nama) {
        return $nama;
    }

    public function setUmur(int $umur) {
        return $umur;
    }
}

?>

<?php
class Mahasiswa {
    public string $nim;
    public string $nama;
    public static string $agama = "Islam";

    public function setNim(string $nim) {
        return $nim;
    }

    public function setNama(string $b) {
        // $this keyword refers a non-static member of a class
        return $this->nama = $b;
    }

    public function getNama() {
        // $this keyword refers a non-static member of a class
        return $this->nama;
    }

    public static function getAgama() {
        // self keyword refers a static member of a class
        return self::$agama;
    }
}

// Instantiation
$mhsw = new Mahasiswa();
echo $mhsw->setNim('17021000');
$mhsw->setNama('Faiza');
echo $mhsw->getNama();
echo $mhsw->getAgama();
?>

<?php
class Mahasiswa {
    public static string $agama = "Islam";

    public static function getAgama() {
        // self keyword refers a static member of a class
        return self::$agama;
    }
}

// Mengakses properti static langsung melalui class
echo Mahasiswa::$agama; // Output: Islam

// Memanggil method static langsung melalui class
echo Mahasiswa::getAgama(); // Output: Islam
?>

<?php
class Mahasiswa {
    public static function setNama(string $nama) {
        return $nama;
    }
}

// Instantiation with Scope resolution operator
echo Mahasiswa::setNama('Faiza');
?>

<?php
class Mahasiswa {
    public int $umur = 22;

    public function getUmur() {
        try {
            if ($this->umur < 25) {
                throw new Exception('Anda masih muda');
            }
        } catch (Exception $e) {
            die ("Maaf Error, " . $e->getMessage());
        }
    }
}

$mhsw = new Mahasiswa();
$mhsw->getUmur();
?>

CREATE TABLE tb_users (
    user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(50),
    user_password VARCHAR(100),
    user_nama VARCHAR(100),
    user_alamat TEXT,
    user_hp VARCHAR(25),
    user_pos VARCHAR(5),
    user_role TINYINT(2),
    user_aktif TINYINT(2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME
);

CREATE TABLE tb_order (
    order_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    order_id_user INT(11),
    order_tgl TIMESTAMP,
    order_kode VARCHAR(50),
    order_ttl DOUBLE,
    order_kurir VARCHAR(100),
    order_ongkir INT(11),
    order_byr_deadline DATETIME,
    order_batal TINYINT(1),
    updated_at DATETIME
);

CREATE TABLE tb_keranjang (
    ker_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    ker_id_user INT(11),
    ker_id_produk INT(11),
    ker_harga DOUBLE,
    ker_jml INT(11)
);

CREATE TABLE tb_kategori (
    kat_id TINYINT(3),
    kat_nama VARCHAR(50),
    kat_keterangan TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    PRIMARY KEY (kat_id)
);

CREATE TABLE tb_produk (
    produk_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    produk_id_kat TINYINT(3),
    produk_id_user INT(11),
    produk_kode VARCHAR(50),
    produk_nama VARCHAR(255),
    produk_hrg DOUBLE,
    produk_keterangan TEXT,
    produk_stock INT(11),
    produk_photo VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME
);

CREATE TABLE tb_order_detail (
    detail_id_order INT(11),
    detail_id_produk INT(11),
    detail_harga DOUBLE,
    detail_jml INT(11)
);

<?php
class User {
    // Properties
    public $user_id;
    public $user_email;
    public $user_password;
    public $user_nama;
    public $user_alamat;
    public $user_hp;
    public $user_pos;
    public $user_role;
    public $user_aktif;
    public $created_at;
    public $updated_at;

    // Database connection
    private $conn;
    private $table_name = "tb_users";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create User
    function create() {
        $query = "INSERT INTO " . $this->table_name . " SET user_email=:user_email, user_password=:user_password, user_nama=:user_nama, user_alamat=:user_alamat, user_hp=:user_hp, user_pos=:user_pos, user_role=:user_role, user_aktif=:user_aktif";
        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(":user_email", $this->user_email);
        $stmt->bindParam(":user_password", $this->user_password);
        $stmt->bindParam(":user_nama", $this->user_nama);
        $stmt->bindParam(":user_alamat", $this->user_alamat);
        $stmt->bindParam(":user_hp", $this->user_hp);
        $stmt->bindParam(":user_pos", $this->user_pos);
        $stmt->bindParam(":user_role", $this->user_role);
        $stmt->bindParam(":user_aktif", $this->user_aktif);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Read Users
    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Update User
    function update() {
        $query = "UPDATE " . $this->table_name . " SET user_email=:user_email, user_password=:user_password, user_nama=:user_nama, user_alamat=:user_alamat, user_hp=:user_hp, user_pos=:user_pos, user_role=:user_role, user_aktif=:user_aktif WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":user_email", $this->user_email);
        $stmt->bindParam(":user_password", $this->user_password);
        $stmt->bindParam(":user_nama", $this->user_nama);
        $stmt->bindParam(":user_alamat", $this->user_alamat);
        $stmt->bindParam(":user_hp", $this->user_hp);
        $stmt->bindParam(":user_pos", $this->user_pos);
        $stmt->bindParam(":user_role", $this->user_role);
        $stmt->bindParam(":user_aktif", $this->user_aktif);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete User
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(":user_id", $this->user_id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
